<?php
namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethod::all();
        return view('backend.setting.payment-method.index', compact('paymentMethods'));
    }

    public function create()
    {
        return view('backend.setting.payment-method.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:payment_methods|max:255',
            'description' => 'nullable',
            'active' => 'required|boolean',
        ]);

        PaymentMethod::create($validatedData);

        return redirect()->route('payment-method.index')->with('success', 'Metode pembayaran berhasil ditambahkan!');
    }

    public function edit(PaymentMethod $paymentMethod)
    {
        return view('backend.setting.payment-method.edit', compact('paymentMethod'));
    }

    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:payment_methods,name,' . $paymentMethod->id . '|max:255',
            'description' => 'nullable',
            'active' => 'required|boolean',
        ]);

        $paymentMethod->update($validatedData);

        return redirect()->route('backend.setting.payment-method.index')->with('success', 'Metode pembayaran berhasil diperbarui!');
    }

    public function destroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();
        return redirect()->route('backend.setting.payment-method.index')->with('success', 'Metode pembayaran berhasil dihapus!');
    }
}
