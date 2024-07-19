@extends('backend.layout.pages-layout')
@section('pageTitle', 'Detail Pesanan #' . $order->id)

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Detail Pesanan #{{ $order->id }}</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Pesanan</h6>
        </div>
        <div class="card-body">
            <p><strong>Tanggal:</strong> {{ $order->created_at }}</p>
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
            <p><strong>Total Harga:</strong> {{ $order->total_amount }}</p>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Produk ({{ $order->order_number }})</h6>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItem as $item)
                        <tr>
                            <td>{{ $item->product->nama }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->quantity * $item->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
{{-- {{ dd($order->user); }} --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Pemesan</h6>
        </div>
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $order->user->name }}</p>
            <p><strong>Email:</strong> {{ $order->user->email }}</p>
            <hr>
            <p><strong>Pembayaran:</strong> {{ $order->payment_method }}</p>
            <p><strong>Alamat:</strong> {{ $order->shipping_address }}</p>

            </div>
    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Aksi</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('order-be.print', $order->id) }}" class="btn btn-secondary" target="_blank">
                <i class="fas fa-print"></i> Cetak
            </a>

            <a href="{{ route('order-be.printInvoice', $order->id) }}" class="btn btn-secondary" target="_blank">
                <i class="fas fa-print"></i> Cetak Invoice
            </a>

            <a href="{{ route('order-be.printPackingSlip', $order->id) }}" class="btn btn-secondary" target="_blank">
                <i class="fas fa-print"></i> Cetak Packing Slip
            </a>

            <a href="{{ route('order-be.printLabel', $order->id) }}" class="btn btn-secondary" target="_blank">
                <i class="fas fa-print"></i> Cetak Label
            </a>

            <button class="btn btn-primary" data-toggle="modal" data-target="#changeStatusModal">
                <i class="fas fa-edit"></i> Ubah Status
            </button>
        </div>
    </div>

    <div class="modal fade" id="changeStatusModal" tabindex="-1" role="dialog" aria-labelledby="changeStatusModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeStatusModalLabel">Ubah Status Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('order-be.updateStatus', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="newStatus">Status Baru:</label>
                            <select class="form-control" id="newStatus" name="newStatus">
                                <option value="processing">Diproses</option>
                                <option value="shipped">Shipped</option>
                                <option value="delivered">Dikirim</option>
                                <option value="cancelled">Batalkan</option>
                                <option value="finished">Selesai</option>
                                </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>
@endsection
