@extends('frontend.layout.home-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title')
@section('content-frontend')

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            Konfirmasi Pembayaran
        </div>
        <div class="card-body">
            

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i> {{-- Ikon dari Font Awesome --}}
                    <div>
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <p class="card-text">Berikut adalah detail pembayaran Anda:</p>
            <ul>
                <li>ID Pembayaran: {{ $payment->id }}</li>
                <li>Tanggal: {{ $payment->payment_date }}</li>
                <li>Total: {{ $payment->amount }}</li>
                <li>Status:
                    @if ($payment->status == 'pending')
                        <span class="badge badge-warning">Pending</span>
                    @elseif ($payment->status == 'success')
                        <span class="badge badge-success">Berhasil</span>
                    @else
                        <span class="badge badge-danger">Gagal</span>
                    @endif
                </li>
            </ul>

            <p class="card-text">Detail Pesanan:</p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($order && $order->orderItem->count() > 0)
                        @foreach ($order->orderItem as $detail)
                            <tr>
                                <td>{{ $detail->product->nama }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>{{ $detail->price }}</td>
                            </tr>
                        @endforeach
                        @else
                        <p>Tidak ada detail pesanan.</p>
                    @endif
                </tbody>
            </table>

            <a href="{{ route('history.index') }}" class="btn btn-primary">Lihat Riwayat Pembelian</a>
        </div>
    </div>
</div>
@endsection
