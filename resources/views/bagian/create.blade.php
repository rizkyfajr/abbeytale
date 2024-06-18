@extends('backend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title')


@section('content')
    <div class="container">
        <h1>Tambah Bagian</h1>

        <form action="{{ route('bagian.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama_bagian">Nama Bagian:</label>
                <input type="text" name="nama_bagian" id="nama_bagian" class="form-control">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
