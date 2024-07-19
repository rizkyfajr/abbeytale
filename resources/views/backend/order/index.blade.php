@extends('backend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Daftar Pesanan')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Daftar Pesanan</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Filter Pesanan</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('order-be.index') }}" method="GET">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">Semua</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>Diproses</option>
                                <option value="finished" {{ request('status') == 'finished' ? 'selected' : '' }}>Selesai</option>
                                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name">Nama Pemesan:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ request('name') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="product">Nama Produk:</label>
                            <input type="text" name="product" id="product" class="form-control" value="{{ request('product') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-primary mb-3" id="printSelected">Cetak Banyak</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>ID Pesanan</th>
                            <th>Nama Barang</th>
                            <th>Tanggal</th>
                            <th>Nama Pemesan</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td><input type="checkbox" name="selected_orders[]" value="{{ $order->id }}"></td>
                                <td>{{ $order->id }}</td>
                                <td>
                                    @foreach ($order->orderItem as $orderItem)
                                        {{ $orderItem->product->nama }} <br>
                                    @endforeach
                                </td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                <td>
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
                                </td>
                                <td>
                                    <a href="{{ route('order-be.show', $order->id) }}" class="btn btn-info btn-sm">Detail</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function() {
    $('#printSelected').click(function() {
        var selectedOrders = [];
        $('input[name="selected_orders[]"]:checked').each(function() {
            selectedOrders.push($(this).val());
        });

        if (selectedOrders.length > 0) {
            var url = "{{ route('order-be.printMultiple') }}"; // Ganti dengan nama route yang sesuai
            url += "?orders=" + selectedOrders.join(',');
            window.open(url, '_blank');
        } else {
            alert('Pilih setidaknya satu pesanan untuk dicetak.');
        }
    });
});

    </script>
@endsection
