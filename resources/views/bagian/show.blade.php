
@extends('backend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title')

@section('content')
    <div class="container">
        <h1>Detail Bagian</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $bagian->nama }}</h5>
                <p class="card-text">{{ $bagian->deskripsi }}</p>
            </div>
        </div>

        <a href="{{ route('bagian.index') }}" class="btn btn-primary mt-3">Kembali</a>
    </div>
@endsection
