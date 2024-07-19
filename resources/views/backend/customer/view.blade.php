@extends('backend.layout.pages-layout')
@section('pageTitle', 'Detail Customer')

@section('content')
<div class="container">
    <h2>Detail Banner</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $banner->title }}</h5>
            @if ($banner->caption)
                <p class="card-subtitle mb-2 text-muted">{{ $banner->caption }}</p>
            @endif
            <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" class="img-fluid mb-3">

            @if ($banner->link)
                <p class="card-text">Link: <a href="{{ $banner->link }}" target="_blank">{{ $banner->link }}</a></p>
            @endif
            <p class="card-text">Status: {{ $banner->active ? 'Aktif' : 'Tidak Aktif' }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('backend.setting.banner.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('backend.setting.banner.edit', $banner->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('backend.setting.banner.destroy', $banner->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus banner ini?')">Hapus</button>
            </form>
        </div>
    </div>
</div>
@endsection
