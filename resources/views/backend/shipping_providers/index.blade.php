@extends('backend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Expedisi')

@section('content')

    <h1>Daftar Expedisi Pengiriman</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('shipping_providers.create') }}" class="btn btn-primary mb-3">Tambah Expedisi</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga per Kilo</th>
                <th>Diskon Maksimal</th>
                <th>Maksimal Pembelian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shippingProviders as $provider)
                <tr>
                    <td>{{ $provider->id }}</td>
                    <td>{{ $provider->name }}</td>
                    <td>Rp {{ number_format($provider->price_per_kg, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($provider->max_discount, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($provider->max_purchase, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('shipping_providers.edit', $provider) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('shipping_providers.destroy', $provider) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $shippingProviders->links() }}
@endsection
