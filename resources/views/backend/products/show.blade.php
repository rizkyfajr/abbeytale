@extends('backend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title')

@section('content')

<div class="container">
    <h1>Detail Produk</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $product->nama }}</h5>
            <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}" class="img-fluid mb-3">

            <p class="card-text">
                <strong>Harga:</strong> Rp{{ number_format($product->harga, 0, ',', '.') }}
            </p>
            <p class="card-text">
                <strong>Tipe Produk:</strong> {{ $product->productType->nama }}
            </p>
            <p class="card-text">
                {{-- <strong>Stok:</strong> {{ $product->productStock->stok }} --}}
            </p>

            <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

@endsection
