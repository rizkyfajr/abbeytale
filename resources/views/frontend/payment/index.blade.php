@extends('frontend.layout.home-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Lampiran Pembayaran')
@section('content-frontend')

<div class="container">
    <h1>Pembayaran</h1>

    <div class="alert alert-warning">
        <small>Lampirkan Pembayaran sebelum <span class="badge badge-warning text-dark">{{ $order->created_at }}</span> jam</small>


    </div>
    <form action="{{ route('payment.store', $order->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="payment_method" class="form-label">Metode Pembayaran</label>
            <select name="payment_method" id="payment_method" class="form-select" required>
                <option value="bank_transfer">Transfer Bank</option>
            </select>
        </div>

        <input type="hidden" name="order_id" value="{{ $order->id }}">
        <input type="hidden" name="total" value="{{ $order->total_price }}">

        <div class="mb-3">
            <label for="proof_of_payment" class="form-label">Bukti Pembayaran</label>
            <input type="file" name="proof_of_payment" id="proof_of_payment" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Konfirmasi Pembayaran</button>
    </form>
</div>
@endsection
