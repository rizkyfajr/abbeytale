<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Validation\ValidationException;

class DiscountBackendController extends Controller
{
    public function index()
    {
        $discounts = Discount::paginate(10); // Paginate untuk menampilkan 10 diskon per halaman
        return view('backend.discount.index', compact('discounts'));
    }

    public function create()
    {
        $products = Product::all();
        return view('backend.discount.create', compact('products'));
    }

    public function storeDiscount(Request $request)
    {
        // dd($request);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:discounts|max:255',
            'discount_type' => 'required|in:percentage,fixed_amount',
            'discount_amount' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'minimum_purchase' => 'nullable|numeric|min:0',
            'is_active' => 'boolean',
        ]);

        // dd($validatedData);

        $discount = Discount::create($validatedData);

        if ($request->has('products')) {
            $discount->products()->attach($request->input('products', []));
        }

        return redirect()->route('backend.discount.index')->with('success', 'Diskon berhasil ditambahkan.');
    }


    public function show(Discount $discount)
    {
        return view('backend.discount.show', compact('discount'));
    }

    public function edit(Discount $discount)
    {
        return view('backend.discount.edit', compact('discount'));
    }

    public function update(Request $request, Discount $discount)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'code' => 'required|string|unique:discounts,code,' . $discount->id . '|max:255',
                'discount_type' => 'required|in:percentage,fixed_amount',
                'discount_amount' => 'required|numeric|min:0',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'minimum_purchase' => 'nullable|numeric|min:0',
                'is_active' => 'boolean',
            ]);

            $discount->update($validatedData);

            return redirect()->route('backend.discount.index')->with('success', 'Diskon berhasil diperbarui.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();
        return redirect()->route('backend.discount.index')->with('success', 'Diskon berhasil dihapus.');
    }
}
