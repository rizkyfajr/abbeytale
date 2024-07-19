<!DOCTYPE html>
<html>
<head>
    <title>Cetak Pesanan</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 80%; margin: 0 auto; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { margin-top: 0; }
    </style>
</head>
<body>
    <div class="container">
        @foreach ($orders as $order)
            <h2>Pesanan #{{ $order->id }}</h2>
            <table>
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
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->harga * $item->jumlah }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Total</th>
                        <td>{{ $order->total_amount }}</td>
                    </tr>
                </tfoot>
            </table>

            <p>
                <strong>Nama Pemesan:</strong> {{ $order->user->name }}<br>
                <strong>Tanggal Pemesanan:</strong> {{ $order->created_at }}<br>
                <strong>Status:</strong>
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

            <hr>
        @endforeach
    </div>
</body>
</html>
