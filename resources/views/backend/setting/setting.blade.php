@extends('backend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Pengaturan Website')

@section('content')

<div class="container mt-5">
    <h1>Pengaturan Website</h1>

    <form action="{{ route('website-setting.update', 1) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="site_name" class="form-label">Nama Situs</label>
            <input type="text" name="site_name" id="site_name" class="form-control" value="{{ old('site_name', $settings->site_name) }}">
        </div>

        <div class="mb-3">
            <label for="site_url" class="form-label">URL Situs</label>
            <input type="text" name="site_url" id="site_url" class="form-control" value="{{ old('site_url', $settings->site_url) }}">
        </div>

        <div class="mb-3">
            <label for="site_email" class="form-label">Email Situs</label>
            <input type="email" name="site_email" id="site_email" class="form-control" value="{{ old('site_email', $settings->site_email) }}">
        </div>

        <div class="mb-3">
            <label for="site_phone" class="form-label">Telepon Situs</label>
            <input type="text" name="site_phone" id="site_phone" class="form-control" value="{{ old('site_phone', $settings->site_phone) }}">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea name="address" id="address" class="form-control">{{ old('address', $settings->address) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" name="logo" id="logo" class="form-control">
            @if ($settings->logo)
                <img src="{{ asset('storage/' . $settings->logo) }}" alt="Logo Saat Ini" class="img-thumbnail mt-2" style="max-width: 150px;">
            @endif
        </div>

        <div class="mb-3">
            <label for="favicon" class="form-label">Favicon</label>
            <input type="file" name="favicon" id="favicon" class="form-control">
            @if ($settings->favicon)
                <img src="{{ asset('storage/' . $settings->favicon) }}" alt="Favicon Saat Ini" class="img-thumbnail mt-2" style="max-width: 32px;">
            @endif
        </div>

        </div>

        <div class="mb-3">
        <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
        </div>
    </form>
</div>
@endsection
