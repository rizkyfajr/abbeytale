@extends('backend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title')


@section('content')
    <div class="container">
        <h1>Edit Bagian</h1>

        <form action="{{ route('bagian.update', $bagian->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama_bagian" id="nama_bagian" class="form-control" value="{{ $bagian->nama_bagian }}">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control">{{ $bagian->deskripsi }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
