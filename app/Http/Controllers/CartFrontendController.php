<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CartFrontendController extends Controller
{

    public function addCart(Request $request, $productId)
    {

        $user = auth()->user();
        $product = Product::findOrFail($productId); // Cari produk, jika tidak ada throw 404

        // $request->validate([
        //     'quantity' => 'required|integer|min:1', // Validasi quantity
        // ]);
        // Cek stok produk
        if ($product->stock < '1') {
            return redirect()->back()->with('error', 'Stok tidak mencukupi!');
        }

        // Tambahkan ke keranjang atau update quantity
        Cart::Create(
            ['user_id' => $user->id, 'product_id' => $product->id, 'quantity' => $request->quantity ?? 1]
        );
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function showCart()
    {
        $cartItems = auth()->user()->cart;
        return view('cart', compact('cartItems'));
    }

    public function removeFromCart($cartItemId)
    {
        $cartItem = Cart::findOrFail($cartItemId);

        // Pastikan item milik user yang sedang login
        if ($cartItem->user_id != auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $cartItem->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    public function updateCart(Request $request, $cartItemId)
    {
        $cartItem = Cart::findOrFail($cartItemId);

        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Cek stok produk
        if ($cartItem->product->stock < $request->quantity) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi!');
        }

        $cartItem->update(['quantity' => $request->quantity]);

        return redirect()->back()->with('success', 'Keranjang berhasil diperbarui!');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
