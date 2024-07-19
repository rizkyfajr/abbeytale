<?php
namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductTypeController extends Controller
{
    public function index()
    {
        $productTypes = ProductType::all();
        return view('backend.product_type.index', compact('productTypes'));
    }

    public function create()
    {
        return view('backend.product_type.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|unique:product_types|max:255',
            'icon' => 'required',
            'keterangan' => 'max:255'
        ]);

        ProductType::create($validatedData);

        return redirect()->route('product-types.index')->with('success', 'Tipe produk berhasil ditambahkan!');
    }

    public function edit(ProductType $productType)
    {
        return view('backend.product_type.edit', compact('productType'));
    }

    public function update(Request $request, ProductType $productType)
    {
        $validatedData = $request->validate([
            'nama' => 'required|unique:product_types,nama,' . $productType->id . '|max:255',
        ]);

        $productType->update($validatedData);

        return redirect()->route('product-types.index')->with('success', 'Tipe produk berhasil diperbarui!');
    }

    public function destroy(ProductType $productType)
    {
        $productType->delete();
        return redirect()->route('product-types.index')->with('success', 'Tipe produk berhasil dihapus!');
    }
}
