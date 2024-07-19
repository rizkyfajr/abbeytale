<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerBackendController extends Controller
{
    public function index()
    {
        $customers = Customer::all(); // Ambil semua data customer
        return view('backend.customer.index', compact('customers'));
    }

    public function create()
    {
        return view('backend.customer.create'); // Tampilkan formulir tambah customer
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'telepon' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        Customer::create($validatedData);

        return redirect()->route('backend.customer.index')->with('success', 'Customer berhasil ditambahkan!');
    }

    public function edit(Customer $customer)
    {
        return view('backend.customer.edit', compact('customer')); // Tampilkan formulir edit customer
    }

    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id, // Validasi unique dengan mengecualikan ID customer saat ini
            'telephone' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
        ]);

        $customer->update($validatedData);

        return redirect()->route('backend.customer.index')->with('success', 'Customer berhasil diperbarui!');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('backend.customer.index')->with('success', 'Customer berhasil dihapus!');
    }
}
