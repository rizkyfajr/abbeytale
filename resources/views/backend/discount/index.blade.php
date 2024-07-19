@extends('backend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Buat Diskon - Abbytale')
@section('content')

<div class="text-center">
    <h1>Daftar Diskon</h1>
</div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('discount.create') }}" class="btn btn-primary mb-3">Tambah Diskon</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kode</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Mulai</th>
                <th>Berakhir</th>
                <th>Min. Pembelian</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($discounts as $discount)
                <tr>
                    <td>{{ $discount->id }}</td>
                    <td>{{ $discount->name }}</td>
                    <td>{{ $discount->code }}</td>
                    <td>{{ $discount->discount_type }}</td>
                    <td>{{ $discount->discount_amount }}</td>
                    <td>{{ $discount->start_date }}</td>
                    <td>{{ $discount->end_date }}</td>
                    <td>{{ $discount->minimum_purchase ?? '-' }}</td>
                    <td>{{ $discount->is_active ? 'Aktif' : 'Tidak Aktif' }}</td>
                    <td>
                        <a href="{{ route('discount.edit', $discount) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('discount.destroy', $discount) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $discounts->links() }}
@endsection
