@extends('backend.layout.pages-layout') @section('pageTitle', isset($pageTitle) ? $pageTitle : 'Daftar Tipe Produk')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Show Product Type</h1>
                <hr>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $productType->name }}</h5>
                        <p class="card-text">{{ $productType->description }}</p>
                        <a href="{{ route('product_types.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
