@extends('backend.layout.pages-layout')
@section('pageTitle', 'Tambah Banner Baru')

@section('content')
<div class="container">
    <h2>Tambah Banner Baru</h2>

    <form action="{{ route('banner.storeBanner') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Judul:</label>
            <input type="text" name="title" id="title" class="form-control">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="caption">Caption/tagline:</label>
            <input type="text" name="caption" id="caption" class="form-control">
            @error('caption')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Gambar:</label>
            <input type="file" name="image" id="image" class="form-control-file">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="link">Link (Opsional):</label>
            <input type="text" name="link" id="link" class="form-control">
            @error('link')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <div class="form-check">
                <input type="hidden" name="active" value="0"> 
                <input type="checkbox" name="active" id="active" class="form-check-input" value="1" checked>
                <label class="form-check-label" for="active">Aktifkan Banner</label>
            </div>
        </div>
        

        <button type="submit" class="btn btn-primary">Tambah Banner</button>
    </form>
</div>
@endsection
