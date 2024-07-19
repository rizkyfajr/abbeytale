@extends('backend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Buat Akun - Abbytale')
@section('content')
<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Buat Akun Abbytale</h1>
</div>
<form action="{{ route('actionRegistCustomer') }}" method="post">
    @csrf
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama">
        </div>
        <div class="col-sm-6">
            <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <input type="text" class="form-control form-control-user" id="telepon" name="telepon" placeholder="Telepon">
    </div>
    <div class="form-group">
        <input type="text" class="form-control form-control-user" id="jenis_kelamin" name="jenis_kelamin" placeholder="Jenis Kelamin">
    </div>
    <div class="form-group">
        <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir">
    </div>
    <div class="form-group">
        <textarea class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat"></textarea>
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-user" id="password_confirmation" name="password_confirmation" placeholder="Ulangi Password">
    </div>
    <div class="form-group">
        <label for="is_admin" class="form-label">Tipe Pengguna</label>
        <select name="is_admin" id="is_admin" class="form-control">
            <option value="0">Pelanggan</option>
            <option value="1">Admin</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        Registrasi Akun
    </button>
</form>
<hr>

@endsection
