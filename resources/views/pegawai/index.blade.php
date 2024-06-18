@extends('backend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title')

@section('content')
    <div class="container">
        <h1>Daftar Pegawai</h1>

        <a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-3">Tambah Pegawai</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pegawai as $data)
                    <tr>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->nip }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->jenis_kelamin }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->jabatan }}</td>
                        <td>
                            <a href="{{ route('pegawai.show', $data->id) }}" class="btn btn-info">Lihat</a>
                            <a href="{{ route('pegawai.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('pegawai.destroy', $data->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus pegawai ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
