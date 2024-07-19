@extends('backend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Daftar Pesanan')

@section('content')


@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i> {{-- Ikon dari Font Awesome --}}
        <div>
            {{ session('success') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container mt-4">
    <h2>Daftar Banner</h2>

    <a href="{{ route('banner.create') }}" class="btn btn-primary mb-3">Tambah Banner Baru</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Link</th>
                <th>Aktif</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banners as $banner)
                <tr>
                    <td>{{ $banner->id }}</td>
                    <td>{{ $banner->title }}</td>
                    <td><img src="{{ asset('storage/' . $banner->image) }}" width="100"></td>
                    <td>{{ $banner->link }}</td>
                    <td>{{ $banner->active ? 'Ya' : 'Tidak' }}</td>
                    <td>
                        <a href="{{ route('banner.editBanner', $banner->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('banner.destroyBanner', $banner->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus banner ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
