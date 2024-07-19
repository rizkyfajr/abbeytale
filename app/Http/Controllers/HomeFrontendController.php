<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\ShopConfiguration; // Sesuaikan dengan model yang Anda gunakan untuk konfigurasi
use Illuminate\Support\Facades\Auth;

class HomeFrontendController extends Controller
{
    public function index()
    {
        // $shopConfiguration = ShopConfiguration::first(); // Mengambil data konfigurasi pertama dari tabel
        $cartItems = []; // Inisialisasi $cartItems sebagai array kosong

        if (auth()->check()) { // Cek apakah user sudah login
            $cartItems = auth()->user()->cart; // Ambil data cartItems jika user sudah login
        }
        $banners = Banner::all();
        $productType = ProductType::get(); // Mengambil semua produk yang terkait dengan konfigurasi toko
        $products = Product::get(); // Get all products
        $types = $products->pluck('type')->unique(); // Mengambil jenis produk yang unik
        $discounts = Product::with(['discounts' => function ($query) {
            $query->where('is_active', true)
                  ->where('start_date', '<=', now())
                  ->where('end_date', '>=', now());
        }])->get();
        foreach ($products as $product) {
            $product->discountedPrice = $this->calculateDiscountedPrice($product);
        }
        // Kelompokkan produk berdasarkan tipe produk
        $groupedProducts = $products->groupBy('product_type_id');
        return view('welcome', compact('products', 'productType', 'cartItems', 'banners', 'groupedProducts', 'discounts'));
    }

    protected function calculateDiscountedPrice(Product $product)
    {
        $activeDiscount = $product->discounts->first(); // Ambil diskon pertama yang aktif

        if ($activeDiscount) {
            if ($activeDiscount->discount_type === 'percentage') {
                return $product->harga - ($product->harga * $activeDiscount->discount_amount / 100);
            } else {
                return $product->harga - $activeDiscount->discount_amount;
            }
        }

        return $product->harga; // Jika tidak ada diskon, kembalikan harga asli
    }

    public function shop(Request $request)
    {
        $products = Product::query();


    if ($request->has('category')) {
        $products->where('category_id', $request->category);
    }

    // ... filter lainnya ...

    $products = $products->paginate(12);
    $categories = ProductType::all(); // Ambil semua kategori
        return view('frontend.pages.shop', compact('products', 'categories'));
    }
}
