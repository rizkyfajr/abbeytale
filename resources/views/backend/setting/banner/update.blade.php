@extends('backend.layout.pages-layout')
@section('pageTitle', 'Edit Banner')

@section('content')
<div class="container">
    <h2>Edit Banner</h2>

    <form action="{{ route('banner.updateBanner', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') 

        <div class="form-group">
            <label for="title">Judul:</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $banner->title) }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="caption">Caption/tagline:</label>
            <input type="text" name="caption" id="caption" class="form-control @error('caption') is-invalid @enderror" value="{{ old('caption', $banner->caption) }}">
            @error('caption')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Gambar:</label>
            <input type="file" name="image" id="image" class="form-control-file">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @if ($banner->image)
                <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" width="150">
            @endif
        </div>

        <div class="form-group">
            <label for="link">Link (Opsional):</label>
            <input type="text" name="link" id="link" class="form-control @error('link') is-invalid @enderror" value="{{ old('link', $banner->link) }}">
            @error('link')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <div class="form-check">
                <input type="hidden" name="active" value="0">
                <input type="checkbox" name="active" id="active" class="form-check-input" value="1" @if(old('active', $banner->active)) checked @endif>
                <label class="form-check-label" for="active">Aktifkan Banner</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
