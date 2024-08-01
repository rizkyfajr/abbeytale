@extends('backend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Produk')

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="container">
    <h1>Detail Produk</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $product->nama }}</h5>
            <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}" class="img-fluid img-thumbnail mb-3" style="max-width: 30%; height: auto;">


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

{{-- @if ($recommendedProducts->count() > 0) --}}
@if ($recommendedProducts->isEmpty())
    <p>Belum ada rekomendasi produk.</p>
@else
<h2>Produk yang Relevan</h2>
    <div class="row">
        @foreach ($recommendedProducts as $recommendedProduct)

            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $recommendedProduct->gambar) }}" class="card-img-top" alt="{{ $recommendedProduct->nama }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $recommendedProduct->nama }}</h5>
                        <p class="card-text">Rp{{ number_format($recommendedProduct->harga, 0, ',', '.') }}</p>
                        <a href="{{ route('products.show', $recommendedProduct->id) }}" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif


{{-- @endif --}}

@endsection
