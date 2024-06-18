@extends('backend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title')
@section('content')

    <div class="container">
        <h1>Dashboard</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Bagian</h5>
                        <p class="card-text">{{ $jumlahBagian }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Pegawai</h5>
                        <p class="card-text">{{ $jumlahPegawai }} Orang</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
