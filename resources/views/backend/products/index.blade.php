@extends('backend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title')

@section('content')

<div class="container">
<h1>Daftar Produk</h1>

<a href="{{ route('product.create') }}" class="btn btn-primary mb">Tambah Produk Baru</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Stok</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->nama }}</td>
            <td>{{ $product->harga }}</td>
            <td>
                @if ($product->gambar)
                    <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}" width="100">
                @else
                    Tidak ada gambar
                @endif
            </td>
            <td>{{ $product->stock->stok }}</td>
            <td>
                @if ($product->is_active)
                    <span class="badge badge-success">Aktif</span>
                @else
                    <span class="badge badge-danger">Nonaktif</span>
                @endif
            </td>
            <td>{{ $product->keterangan }}</td>
            <td>
                <a href="{{ route('product.show', $product->id) }}" class="btn btn-info">Lihat</a>
                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection
