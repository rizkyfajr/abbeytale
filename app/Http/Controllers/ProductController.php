<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductStock;
use App\Models\ProductType;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('stock')->get();
        return view('backend.products.index', compact('products'));
    }

    public function create()
    {

        $product = Product::with('stock')->get();
        $productTypes = ProductType::all();
        $discounts = Discount::active()->get();
        return view('backend.products.create', compact('product', 'productTypes', 'discounts'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|unique:products|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'product_type_id' => 'required|exists:product_types,id', // Validasi product_type_id
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan gambar jika ada
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('images', 'public');
            $validatedData['gambar'] = $imagePath;
        }

        $product = Product::create($validatedData);
        ProductStock::create([
            'product_id' => $product->id,
            'stok' => $validatedData['stok'],
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function show(Product $product)
    {
        // Menggunakan Eager Loading untuk mengambil relasi
        $product->load('productType'); // Load relasi 'productType' dan 'productStock'

        return view('backend.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $product = Product::with('stock')->get();
        $productTypes = ProductType::all();
        return view('backend.produk.edit', compact('product', 'productTypes'));
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255|unique:products,nama,' . $product->id,
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Hapus gambar lama jika ada gambar baru
        if ($request->hasFile('gambar')) {
            if ($product->gambar) {
                Storage::disk('public')->delete($product->gambar);
            }
            $imagePath = $request->file('gambar')->store('images', 'public');
            $validatedData['gambar'] = $imagePath;
        }

        $product->update($validatedData);
        $product->stock->update(['stok' => $validatedData['stok']]);

        return redirect()->route('backend.products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        if ($product->gambar) {
            Storage::disk('public')->delete($product->gambar);
        }

        $product->stock->delete();
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}

?>
