<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Discount;
use App\Models\Cart;
use App\Models\ShippingProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('info', 'Silakan login untuk melanjutkan checkout.');
        }

        // $cartItems = auth()->user()->cart()->with('product')->get();
        $cartItems = auth()->user()->cart()->with('product')->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('welcome')->with('error', 'Keranjang belanja Anda kosong.');
        }
        $shippingProviders = ShippingProvider::all();
        $totalHarga = Cart::where('user_id', auth()->id())
            ->with('product') // Eager load relasi product
            ->get()
            ->sum(function ($item) {
                return $item->product->harga * $item->quantity;
            });

        // Inisialisasi total harga dengan menghitung harga produk setelah diskon
        $totalHarga = 0;
        foreach ($cartItems as $item) {
            $product = $item->product;
            $price = $this->calculateDiscountedPrice($product); // Menggunakan fungsi dari HomeFrontendController
            $totalHarga += $price * $item->quantity;
        }

        return view('frontend.checkout.index', compact('cartItems', 'totalHarga', 'shippingProviders', 'totalHarga'));
    }


    protected function calculateDiscountedPrice(Product $product, $discountCode = null)
    {
        $originalPrice = $product->harga;

        // Diskon dari produk
        $productDiscounts = $product->discounts()
            ->where('is_active', true)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->get();

        foreach ($productDiscounts as $discount) {
            $originalPrice = $discount->calculateDiscountAmount($originalPrice);
        }

        // Diskon dari kode diskon (jika ada)
        if ($discountCode) {
            $discount = Discount::where('code', $discountCode)->active()->first();
            if ($discount) {
                $originalPrice = $discount->calculateDiscountAmount($originalPrice);
            }
        }

        return $originalPrice;
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'shipping_address' => 'required',
            'billing_address' => 'nullable',
            'shipping_method' => 'required',
            'payment_method' => 'required',
            'discount_code' => 'nullable|string|exists:discounts,code',
        ]);

        $orderNumber = substr(date('Y'), -2) . strtoupper(Str::random(5));

        $cartItems = auth()->user()->cart;
        $totalAmount = 0;
        $totalDiscount = 0;
        $finalAmount = 0;
        // Periksa dan terapkan kode diskon jika valid
        if ($request->discount_code) {
            $discount = Discount::where('code', $request->discount_code)
                ->active()
                ->first();

            if (!$discount) {
                return back()->with('error', 'Kode diskon tidak valid.');
            }
            $discountAmount = $discount->calculateDiscountAmount($totalAmount);
            Session::put('discount', [
                'id' => $discount->id,
                'code' => $discount->code,
                'amount' => $discountAmount,
            ]);

            $totalDiscount += $discountAmount; // Tambahkan total diskon
        } else {
            Session::forget('discount');
        }

        // Hitung harga total dengan diskon per produk
        foreach ($cartItems as $item) {
            $product = $item->product;
            $price = $product->discountedPrice ?: $product->harga; // Jika tidak ada diskon produk, gunakan harga asli

            $totalAmount += $product->harga * $item->quantity; // Total harga sebelum diskon
            $finalAmount += $price * $item->quantity; // Total harga setelah diskon
        }

        // Ambil data expedisi yang dipilih
        $shippingProvider = ShippingProvider::find($request->input('shipping_method'));

        if ($shippingProvider) {
            $totalWeight = $cartItems->sum('quantity');
            $shippingCost = $shippingProvider->price_per_kg * $totalWeight;

            if ($totalAmount >= $shippingProvider->max_purchase) {
                $shippingCost = max(0, $shippingCost - $shippingProvider->max_discount);
            }
        }

        $finalAmount += $shippingCost; // Tambahkan ongkos kirim

        // Buat pesanan baru dengan total harga setelah diskon dan ongkir
        $order = Order::create([
            'user_id' => auth()->id(),
            'total_amount' => $finalAmount, // Gunakan totalAmount setelah diskon
            'discount_amount' => $totalDiscount, // Tambahkan kolom untuk menyimpan total diskon
            'shipping_address' => $validatedData['shipping_address'],
            'order_number' => $orderNumber,
            'payment_method' => $validatedData['payment_method'],
            'shipping_cost' => $shippingCost
        ]);

        // Simpan detail pesanan
        foreach (auth()->user()->cart as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->discountedPrice ?: $item->product->harga, // Gunakan harga diskon jika ada, atau harga asli jika tidak
            ]);
        }

        // Kosongkan keranjang belanja
        foreach (auth()->user()->cart as $item) {
            $item->delete();
        }

        // Arahkan ke halaman pembayaran (ganti dengan route yang sesuai)
        // return redirect()->route('frontend.payment.index', $order->id);

        return view('frontend.payment.index', compact('order'));
    }

    public function history()
    {
        // $orders = auth()->user()->orders;
        if (auth()->check()) { // Periksa apakah pengguna sudah login
            $orders = auth()->user()->orders()->with('orderItem.product')->latest()->get();
        } else {

            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu untuk melihat riwayat pesanan.');
            // Atau Anda bisa menampilkan pesan error di halaman yang sama
        }
        return view('frontend.checkout.history', compact('orders'));
    }

    public function showHistory($id)
    {
        $order = Order::with('user', 'orderItem.product')->findOrFail($id);

        return view('frontend.checkout.show-history', compact('order'));
    }

    // app/Http/Controllers/DiscountController.php

    public function checkDiscount($code)
    {
        try {
            $discount = Discount::where('code', $code)->active()->first();

            if (!$discount) {
                return response()->json([
                    'valid' => false,
                    'message' => 'Kode diskon tidak valid.'
                ]);
            }

            $cartTotal = Cart::where('user_id', auth()->id())
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->sum(DB::raw('CAST(products.harga AS DECIMAL(10, 2)) * CAST(carts.quantity AS UNSIGNED)'));

            if ($discount->minimum_purchase && $cartTotal < $discount->minimum_purchase) {
                return response()->json([
                    'valid' => false,
                    'message' => 'Minimum pembelian untuk diskon ini adalah Rp ' . number_format($discount->minimum_purchase, 0, ',', '.')
                ]);
            }

            // dd($discount->calculateDiscountAmount($cartTotal)); // Tambahkan dd() di sini
            return response()->json([
                'valid' => true,
                'amount' => $discount->calculateDiscountAmount($cartTotal)
            ]);
        } catch (\Exception $e) {
            Log::error("Error checking discount: {$e->getMessage()}", [
                'code' => $code,
                'user_id' => auth()->id(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'valid' => false,
                'message' => "Error checking discount: {$e->getMessage()}"
            ]);
        }
    }
}
