<!DOCTYPE html>
<html>
<head>
    <title>Packing Slip #{{ $order->id }}</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 80%; margin: 0 auto; }
        .header { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Packing Slip #{{ $order->id }}</h2>
            <p><strong>Tanggal:</strong> {{ $order->created_at->format('d F Y') }}</p>
        </div>

        <h3>Informasi Pengiriman:</h3>
        <p>
            <strong>Nama Penerima:</strong> {{ $order->user->name }}<br>
            <strong>Alamat Pengiriman:</strong> {{ $order->shipping_address }}<br>
        </p>

        <hr>

        <h3>Daftar Produk:</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($order->orderItem as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->product->nama }}</td>
                        <td>{{ $item->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <hr>

        <div class="footer">
            <p>Terima kasih telah berbelanja di toko kami.</p>
           <p> Mohon periksa kembali pesanan Anda sebelum menerima.</p>
        </div>
    </div>
</body>
</html>
