<!DOCTYPE html>
<html>
<head>
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 80%; margin: 0 auto; }
        .header { text-align: center; margin-bottom: 20px; }
        .logo { max-width: 150px; margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .total { text-align: right; }
        .footer { text-align: center; margin-top: 20px; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="/frontend/images/logo.png" alt="abbytale" class="logo">
            <h2>Invoice #{{ $order->id }}</h2>
        </div>

        <p>
            <strong>Tanggal:</strong> {{ $order->created_at->format('d F Y') }}<br>
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

        <h3>Informasi Pembeli:</h3>
        <p>
            <strong>Nama:</strong> {{ $order->user->name }}<br>
            <strong>Email:</strong> {{ $order->user->email }}<br>
        </p>

        <hr>

        <h3>Detail Pesanan:</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($order->orderItem as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->product->nama }}</td>
                        <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rp. {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="total"><strong>Total:</strong></td>
                    <td class="total">Rp. {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>

        <hr>

        <div class="footer">
            Terima kasih atas pembelian Anda!<br>
            <small>Lembaran Ini sebagai Tanda Bukti yang sah</small>
        </div>
    </div>
</body>
</html>
