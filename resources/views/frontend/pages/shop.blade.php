@extends('frontend.layout.home-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home - Abbytale')
@section('content-frontend')


@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i> {{-- Ikon dari Font Awesome --}}
        <div>
            {{ session('success') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i> {{-- Ikon dari Font Awesome --}}
        <div>
            {{ session('error') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-3">
            {{-- Filter Form --}}
            <form action="{{ route('products.index') }}" method="GET">
                <div class="mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <select name="category" id="category" class="form-select">
                        <option value="">Semua Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Filter Harga (Contoh) --}}
                <div class="mb-3">
                    <label for="min_price" class="form-label">Harga Minimum</label>
                    <input type="number" name="min_price" id="min_price" class="form-control" value="{{ request('min_price') }}">
                </div>

                <div class="mb-3">
                    <label for="max_price" class="form-label">Harga Maksimum</label>
                    <input type="number" name="max_price" id="max_price" class="form-control" value="{{ request('max_price') }}">
                </div>

                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>

        <div class="col-md-9">
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $product->gambar) }}" class="img-fluid rounded-4" style="aspect-ratio: 1 / 1; object-fit: cover;" alt="image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->nama }}</h5>
                            <p class="card-text">{{ $product->price }}</p>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            {{ $products->links() }}
        </div>
    </div>
</div>

@endsection
