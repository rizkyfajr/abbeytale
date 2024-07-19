<!DOCTYPE html>
<html>
<head>
    <title>Detail Pesanan #{{ $order->id }}</title>
    <style>
        /* Basic styling for the print layout */
        body { font-family: sans-serif; }
        .container { width: 80%; margin: 0 auto; }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; }
        /* ... add more styles as needed ... */
    </style>
</head>
<body>
    <div class="container">
        <h2>Detail Pesanan #{{ $order->id }}</h2>
        <p>Tanggal Pemesanan: {{ $order->created_at }}</p>
        <p>Status: {{ $order->status }}</p>

        <h3>Data Pembeli:</h3>
        <p>Nama: {{ $order->user->name }}</p>
        <p>Email: {{ $order->user->email }}</p>

        <h3>Item Pesanan:</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItem as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>Rp {{ number_format($item->product->price, 0, ',', '.') }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Total: Rp {{ number_format($order->total_amount, 0, ',', '.') }}</h3>
    </div>
</body>
</html>
