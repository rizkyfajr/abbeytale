@extends('backend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Tambah Tipe Produk')

@section('content')
<div class="container mt-5">
<form action="{{ route('product_type.update', $productType->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ $productType->name }}" required>

    <!-- Add more form fields for other attributes of the product type -->

    <button type="submit">Update</button>
</form>
</div>
