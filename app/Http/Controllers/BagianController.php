<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use Illuminate\Http\Request;

class BagianController extends Controller
{
    public function index()
    {
        $bagian = Bagian::all();
        return view('bagian.index', compact('bagian'));
    }

    public function create()
    {
        return view('bagian.create');
    }

    public function store(Request $request)
    {
        $bagian = Bagian::create($request->all());
        return redirect()->route('bagian.index')->with('success', 'Bagian berhasil ditambahkan.');
    }

    public function show(Bagian $bagian)
    {
        return view('bagian.show', compact('bagian'));
    }

    public function edit(Bagian $bagian)
    {
        return view('bagian.edit', compact('bagian'));
    }

    public function update(Request $request, Bagian $bagian)
    {
        $bagian->update($request->all());
        return redirect()->route('bagian.index')->with('success', 'Bagian berhasil diperbarui.');
    }

    public function destroy(Bagian $bagian)
    {
        $bagian->delete();
        return redirect()->route('bagian.index')->with('success', 'Bagian berhasil dihapus.');
    }
}
