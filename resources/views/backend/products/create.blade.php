@extends('backend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title')


@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h1>Tambah Produk Baru</h1>

    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga:</label>
            <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga') }}">
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok:</label>
            <input type="number" name="stok" id="stok" class="form-control" value="{{ old('stok') }}">
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar:</label>
            <input type="file" name="gambar" id="gambar" class="form-control">
        </div>
        <div class="mb-3">
            <label for="is_active" class="form-label">Status:</label>
            <select name="is_active" id="is_active" class="form-control">
                <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="product_type_id" class="form-label">Tipe Produk:</label>
            <select name="product_type_id" id="product_type_id" class="form-control">
                @foreach ($productTypes as $type)
                    <option value="{{ $type->id }}">
                        {{ $type->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan:</label>
            <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="discounts">Diskon:</label>
            <select name="discounts[]" id="discounts" class="form-control select2" multiple>
                @foreach ($discounts as $discount)
                    <option value="{{ $discount->id }}">{{ $discount->name }} ({{ $discount->discount_amount }}%)</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

</body>
</html>


@endsection
