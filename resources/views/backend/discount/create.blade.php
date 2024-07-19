@extends('backend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Buat Diskon - Abbytale')
@section('content')
<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Tambah Diskon</h1>
</div>

    <form action="{{ route('discount.storeDiscount') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Diskon</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="code" class="form-label">Kode Diskon</label>
            <input type="text" name="code" id="code" class="form-control" value="{{ old('code') }}">
        </div>

        <div class="mb-3">
            <label for="discount_type" class="form-label">Jenis Diskon</label>
            <select name="discount_type" id="discount_type" class="form-control">
                <option value="percentage">Persentase</option>
                <option value="fixed_amount">Jumlah Tetap</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="discount_amount" class="form-label">Jumlah Diskon</label>
            <input type="number" name="discount_amount" id="discount_amount" class="form-control" value="{{ old('discount_amount') }}" min="0">
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Tanggal Mulai</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}">
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">Tanggal Berakhir</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}">
        </div>

        <div class="mb-3">
            <label for="minimum_purchase" class="form-label">Minimum Pembelian (Opsional)</label>
            <input type="number" name="minimum_purchase" id="minimum_purchase" class="form-control" value="{{ old('minimum_purchase') }}" min="0">
        </div>
        <div class="form-group">
            <label for="products">Produk yang Mendapatkan Diskon:</label>
            <select name="products[]" id="products" class="form-control select2" multiple>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}"
                        @if (isset($discount) && $discount->products->contains($product->id)) selected @endif>
                        {{ $product->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="is_active" class="form-label">Aktif</label>
            <div class="form-check">
            <input type="radio" name="is_active" id="is_active_true" class="form-check-input" value="1" {{ old('is_active') == '1' ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active_true">Ya</label>
            </div>
            <div class="form-check">
            <input type="radio" name="is_active" id="is_active_false" class="form-check-input" value="0" {{ old('is_active') == '0' ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active_false">Tidak</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
