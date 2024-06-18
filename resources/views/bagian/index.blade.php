@extends('backend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title')


@section('content')
    <div class="container">
        <h1>Daftar Bagian</h1>

        <a href="{{ route('bagian.create') }}" class="btn btn-primary mb-3">Tambah Bagian</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bagian as $data)
                    <tr>
                        <td>{{ $data->nama_bagian }}</td>
                        <td>{{ $data->deskripsi }}</td>
                        <td>
                            <a href="{{ route('bagian.show', $data->id) }}" class="btn btn-info">Lihat</a>
                            <a href="{{ route('bagian.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('bagian.destroy', $data->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus bagian ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
