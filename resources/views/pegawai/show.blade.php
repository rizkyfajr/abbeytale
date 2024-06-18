
@extends('backend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title')


@section('content')
    <div class="container">
        <h1>Detail Pegawai</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $pegawai->nama }}</h5>
                <p class="card-text">NIP: {{ $pegawai->nip }}</p>
                <p class="card-text">Email: {{ $pegawai->email }}</p>
                <p class="card-text">Jenis Kelamin: {{ $pegawai->jenis_kelamin }}</p>
                <p class="card-text">Alamat: {{ $pegawai->alamat }}</p>
                <p class="card-text">Jabatan: {{ $pegawai->jabatan }}</p>
                <!-- Tambahkan informasi tambahan sesuai kebutuhan -->

                <!-- Tampilkan informasi relasi jika diperlukan -->
                @if ($pegawai->statusPegawai)
                    <p class="card-text">Status Pegawai: {{ $pegawai->statusPegawai->nama_status }}</p>
                @endif

                @if ($pegawai->bagianPegawai)
                    <p class="card-text">Bagian: {{ $pegawai->bagianPegawai->nama_bagian }}</p>
                @endif
            </div>
        </div>

        <a href="{{ route('pegawai.index') }}" class="btn btn-primary mt-3">Kembali</a>
    </div>
@endsection
