@extends('backend.layout.pages-layout')
@section('pageTitle', 'Tambah Banner Baru')

@section('content')
<div class="container">
    <h1>Tambah Metode Pembayaran</h1>

    <form action="{{ route('payment-method.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="active" class="form-label">Status</label>
            <select name="active" id="active" class="form-control">
                <option value="1" {{ old('active') == 1 ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ old('active') == 0 ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
            @error('active')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
