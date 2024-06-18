@extends('backend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title')


@section('content')
    <div class="container">
        <h1>Edit Pegawai</h1>

        <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ $pegawai->nama }}">
            </div>

            <div class="form-group">
                <label for="nip">NIP:</label>
                <input type="text" name="nip" id="nip" class="form-control" value="{{ $pegawai->nip }}">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $pegawai->email }}">
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                    <option value="Laki-laki" @if ($pegawai->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                    <option value="Perempuan" @if ($pegawai->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea name="alamat" id="alamat" class="form-control">{{ $pegawai->alamat }}</textarea>
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan:</label>
                <input type="text" name="jabatan" id="jabatan" class="form-control" value="{{ $pegawai->jabatan }}">
            </div>

            <!-- Tambahkan form input untuk relasi dengan status pegawai dan bagian jika diperlukan -->

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
