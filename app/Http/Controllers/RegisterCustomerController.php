<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\DB;


class RegisterCustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::with('user')->get();
        return view('regist', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function actionRegistCustomer(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'telepon' => 'nullable|string|max:20',
            'jenis_kelamin' => 'nullable|string',
            'tgl_lahir' => 'nullable|date',
            'alamat' => 'nullable|string',
            'is_admin' => 'nullable',
            'password' => 'required|string|min:3|confirmed',
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'is_admin' => $validatedData['is_admin'],
        ]);

        // Simpan data customer dengan mengaitkan user
        $user->customer()->create($validatedData);

        return redirect()->route('backend-auth')->with('success', 'Customer berhasil ditambahkan.');
    }



    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        // Validasi data customer
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'nullable|string|max:20',
            'jenis_kelamin' => 'nullable|string|in:Laki-laki,Perempuan',
            'tgl_lahir' => 'nullable|date',
            'alamat' => 'nullable|text',
        ]);

        // Update data customer
        $customer->update($validatedData);

        // Validasi dan update data user (jika ada perubahan)
        $validatedUserData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,' . $customer->user_id . '|max:255',
        ]);

        $customer->user->update($validatedUserData);

        return redirect()->route('backend-auth')->with('success', 'Customer berhasil diperbarui.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('backend-auth')->with('success', 'Customer berhasil dihapus.');
    }
}
