@extends('backend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title')


@section('content')
    <div class="container">
        <h1>Tambah Pegawai</h1>

        <form action="{{ route('pegawai.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control">
            </div>

            <div class="form-group">
                <label for="nip">NIP:</label>
                <input type="text" name="nip" id="nip" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea name="alamat" id="alamat" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan:</label>
                <input type="text" name="jabatan" id="jabatan" class="form-control">
            </div>

            <div class="form-group">
                <label for="id_status_pegawai">Status Pegawai:</label>
                <select name="id_status_pegawai" id="id_status_pegawai" class="form-control">
                    @foreach ($statusPegawai as $status)
                        <option value="{{ $status->id }}">{{ $status->nama_status }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="id_bagian">Bagian Pegawai:</label>
                <select name="id_bagian" id="id_bagian" class="form-control">
                    @foreach ($bagianPegawai as $bagian)
                        <option value="{{ $bagian->id }}">{{ $bagian->nama_bagian }}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
