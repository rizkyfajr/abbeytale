<!DOCTYPE html>
<html>
<head>
    <title>Label Pengiriman #{{ $order->id }}</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 4in; height: 4in; margin: 0 auto; border: 1px solid #000; padding: 10px; }
        .sender { margin-bottom: 20px; }
        .recipient { margin-bottom: 20px; }
        .barcode { text-align: center; margin-top: 20px; }
        .barcode svg {
    width: 100%; /* Atur lebar barcode agar memenuhi container */
    height: 1in;  /* Atur tinggi barcode sesuai kebutuhan */
}
    </style>
</head>
<body>
    <div class="container">
        <div class="sender">
            <h2>Label</h2>
            <h3>Pengirim:</h3>
            <p>
                Abbytale Store<br>
                Jalan Abbytale<br>
                08353224335
            </p>
        </div>

        <div class="recipient">
            <h3>Penerima:</h3>
            <p>
                {{ $order->user->name }}<br>
                {{ $order->shipping_address }}<br>
                {{ $order->user->telepon }}
            </p>
        </div>

        <div class="barcode">=
            {!! DNS1D::getBarcodeHTML($order->user->name, 'C128') !!}
        </div>
    </div>
</body>
</html>
