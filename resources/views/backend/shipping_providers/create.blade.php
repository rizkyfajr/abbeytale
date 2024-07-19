@extends('backend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Ekpedisi - ')

@section('content')
    <h1>Tambah Expedisi Pengiriman</h1>

    <form action="{{ route('shipping_providers.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nama Expedisi</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price_per_kg">Harga per Kilo (Rp)</label>
            <input type="number" name="price_per_kg" id="price_per_kg" class="form-control" value="{{ old('price_per_kg') }}" min="0" step="0.01">
            @error('price_per_kg')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="max_discount">Diskon Maksimal (Rp)</label>
            <input type="number" name="max_discount" id="max_discount" class="form-control" value="{{ old('max_discount', 30000) }}" min="0" step="0.01">
            @error('max_discount')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="max_purchase">Maksimal Pembelian (Diskon) (Rp)</label>
            <input type="number" name="max_purchase" id="max_purchase" class="form-control" value="{{ old('max_purchase') }}" min="0" step="0.01">
            @error('max_purchase')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
