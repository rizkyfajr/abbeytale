@extends('backend.layout.pages-layout') @section('pageTitle', isset($pageTitle) ? $pageTitle : 'Daftar Tipe Produk')

@section('content')
<div class="container mt-5">

    <h1>Daftar Tipe Produk</h1>

    <a href="{{ route('product-types.create') }}" class="btn btn-primary mb-3">Tambah Tipe Produk Baru</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productTypes as $productType)
            <tr>
                <td>{{ $productType->id }}</td>
                <td>{{ $productType->nama }}</td>
                <td>
                    <a href="{{ route('product-types.edit', $productType->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('product-types.destroy', $productType->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus tipe produk ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
