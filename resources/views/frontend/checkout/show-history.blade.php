@extends('backend.layout.pages-layout')
@section('pageTitle', 'Detail Pesanan')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Detail Pesanan #{{ $order->id }}</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>Informasi Pemesan</h4>
                    <p><strong>Nama:</strong> {{ $order->user->name }}</p>
                    <p><strong>Email:</strong> {{ $order->user->email }}</p>

                </div>
                <div class="col-md-6">
                    <h4>Detail Pesanan</h4>
                    <p><strong>Tanggal Pemesanan:</strong> {{ $order->created_at }}</p>
                    <p><strong>Status:</strong>
                        @if ($order->status == 'pending')
                            <span class="badge badge-warning">Pending</span>
                        @elseif ($order->status == 'processing')
                            <span class="badge badge-info">Diproses</span>
                        @elseif ($order->status == 'finished')
                            <span class="badge badge-success">Selesai</span>
                        @elseif ($order->status == 'shipped')
                            <span class="badge badge-info">Dikirim</span>
                        @elseif ($order->status == 'delivered')
                            <span class="badge badge-info">Terkirim</span>
                        @else
                            <span class="badge badge-danger">Dibatalkan</span>
                        @endif
                    </p>
                </div>
            </div>

            <hr>

            <h4>Daftar Produk</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItem as $item)
                        <tr>
                            <td>{{ $item->product->nama }}</td>
                            <td>Rp. {{ number_format($item->product->harga, 0, ',', '.') }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>Rp. {{ number_format($item->product->harga * $item->jumlah, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Total</th>
                        <td>Rp. {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{ route('order-be.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

</div>
@endsection
