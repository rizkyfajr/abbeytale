<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ShippingProvider;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ShippingProviderController extends Controller
{
    public function index()
    {
        $shippingProviders = ShippingProvider::paginate(10);
        return view('backend.shipping_providers.index', compact('shippingProviders'));
    }

    public function create()
    {
        return view('backend.shipping_providers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:shipping_providers|max:255',
            'price_per_kg' => 'required|numeric|min:0',
            'max_discount' => 'required|numeric|min:0',
            'max_purchase' => 'nullable|numeric|min:0',
        ]);

        ShippingProvider::create($validatedData);

        return redirect()->route('shipping_providers.index')->with('success', 'Expedisi berhasil ditambahkan.');
    }

    public function show(ShippingProvider $shippingProvider)
    {
        return view('backend.shipping_providers.show', compact('shippingProvider'));
    }

    public function edit(ShippingProvider $shippingProvider)
    {
        return view('backend.shipping_providers.edit', compact('shippingProvider'));
    }

    public function update(Request $request, ShippingProvider $shippingProvider)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('shipping_providers')->ignore($shippingProvider->id)],
            'price_per_kg' => 'required|numeric|min:0',
            'max_discount' => 'required|numeric|min:0',
            'max_purchase' => 'nullable|numeric|min:0',
        ]);

        $shippingProvider->update($validatedData);

        return redirect()->route('shipping_providers.index')->with('success', 'Expedisi berhasil diperbarui.');
    }

    public function destroy(ShippingProvider $shippingProvider)
    {
        $shippingProvider->delete();

        return redirect()->route('shipping_providers.index')->with('success', 'Expedisi berhasil dihapus.');
    }
}
