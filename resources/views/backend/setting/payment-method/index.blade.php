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
    <h1>Metode Pembayaran</h1>

    <a href="{{ route('payment-method.create') }}" class="btn btn-primary">Tambah Metode Pembayaran</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paymentMethods as $method)
                <tr>
                    <td>{{ $method->name }}</td>
                    <td>{{ $method->description }}</td>
                    <td>{{ $method->active ? 'Aktif' : 'Tidak Aktif' }}</td>
                    <td>
                        <a href="{{ route('payment-method.edit', $method) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('payment-method.destroy', $method) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
