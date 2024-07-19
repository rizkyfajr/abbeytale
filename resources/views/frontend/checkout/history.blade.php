@extends('frontend.layout.home-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title')
@section('content-frontend')

<div class="container mt-5">
    <h1 class="mb-4">Riwayat Pembelian</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID Pesanan</th>
                <th>Nama</th>
                <th>Nomor Order</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($orders && count($orders) > 0)
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>
                            @foreach ($order->orderItem as $orderItem)
                                {{ $orderItem->product->nama }} <br>
                            @endforeach
                        </td>
                        <td>{{ $order->order_number }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->total_amount }}</td>
                        <td>
                            {{ $order->status }}

                        </td>
                        <td>
                            @if($order->status == 'pending')
                                <a href="{{ route('payment.index', $order->id) }}" class="btn btn-warning btn-sm" id="bayar-button-{{ $order->id }}">Bayar</a>
                            @else
                                <small>Sudah Dibayar</small>
                            @endif
                            <a href="{{ route('history.showHistory', $order->id) }}" class="btn btn-info btn-sm">Detail</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">Tidak ada riwayat pembelian</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
