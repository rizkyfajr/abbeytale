@extends('frontend.layout.home-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Checkout')
@section('content-frontend')

<div class="container">
    <h1>Checkout</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="shipping_address" class="form-label">Alamat Pengiriman</label>
            <textarea name="shipping_address" id="shipping_address" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="billing_address" class="form-label">Alamat Penagihan (opsional)</label>
            <textarea name="billing_address" id="billing_address" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="payment_method" class="form-label">Metode Pembayaran</label>
            <select name="payment_method" id="payment_method" class="form-select" required>
                <option value="transfer">Transfer</option>
                <option value="cod">COD</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="shipping_method" class="form-label">Pilih Expedisi</label>
            <select name="shipping_method" id="shipping_method" class="form-select" required>
                @foreach($shippingProviders as $provider)
                    <option value="{{ $provider->id }}"
                        {{ old('shipping_method') == $provider->id ? 'selected' : '' }}
                        data-price-per-kg="{{ $provider->price_per_kg }}"
                        data-max-discount="{{ $provider->max_discount }}"
                        data-max-purchase="{{ $provider->max_purchase }}">
                        {{ $provider->name }} - Rp {{ number_format($provider->price_per_kg, 0, ',', '.') }}/kg
                        @if ($provider->max_discount > 0 && $totalHarga <= $provider->max_purchase)
                            (Diskon Rp {{ number_format($provider->max_discount, 0, ',', '.') }})
                        @endif
                    </option>
                @endforeach
            </select>
            @error('shipping_method')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
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
                    @foreach ($cartItems as $item)
                        <tr>
                            <td>{{ $item->product->nama }}</td>
                            @if ($item->product->discounts->isNotEmpty())
                                <td>
                                    Rp <del>{{ number_format($item->product->harga, 0, ',', '.') }}</del>
                                    Rp {{ number_format($item->product->discountedPrice, 0, ',', '.') }}
                                </td>
                            @else
                                <td>Rp{{ number_format($item->product->harga, 0, ',', '.') }}</td>
                            @endif
                            <td>{{ $item->quantity }}</td>
                            <td>Rp{{ number_format($item->product->discountedPrice * $item->quantity, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mb-3 text-end">
            <p>Subtotal: Rp {{ number_format($totalHarga, 0, ',', '.') }}</p>
            <p id="discount">Diskon: Rp 0</p>
            <p id="shipping-cost">Ongkos Kirim: Rp 0</p>
            <p>Total: Rp <span id="total-harga">{{ number_format($totalHarga, 0, ',', '.') }}</span></p>
        </div>
        <div class="form-group">
            <label for="discount_code">Kode Diskon</label>
            <div class="input-group">
                <input type="text" name="discount_code" id="discount_code" class="form-control" value="{{ old('discount_code') }}">
                <button type="button" class="btn btn-secondary" id="apply-discount">Terapkan</button>
            </div>
            @error('discount_code')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Lanjutkan ke Pembayaran</button>
    </form>
</div>

<script>
    const shippingMethodSelect = document.getElementById('shipping_method');
    const shippingCostElement = document.getElementById('shipping-cost');
    const totalHargaElement = document.getElementById('total-harga');
    const subtotalElement = document.getElementById('subtotal');
    const discountElement = document.getElementById('discount');
    const discountCodeInput = document.getElementById('discount_code');
    const applyDiscountButton = document.getElementById('apply-discount');

    // Data awal
    let totalHarga = {{ $totalHarga }};
    let totalDiscount = 0; // Diskon awal 0

    // Fungsi untuk menghitung dan menampilkan total harga
    function updateTotalHarga() {
        const selectedOption = shippingMethodSelect.options[shippingMethodSelect.selectedIndex];
        const shippingCostPerKg = parseFloat(selectedOption.dataset.pricePerKg.replace(/\./g, '').replace(/,/g, '.'));
        const totalWeight = {{ $cartItems->sum(function ($item) { return 1 * $item->quantity; }) }}; // Hitung berat total
        let shippingCost = shippingCostPerKg * totalWeight;

        const maxPurchase = parseFloat(selectedOption.dataset.maxPurchase);
        const maxDiscount = parseFloat(selectedOption.dataset.maxDiscount);
        if (maxDiscount > 0 && totalHarga <= maxPurchase) {
            shippingCost = Math.max(0, shippingCost - maxDiscount);
        }

        shippingCostElement.textContent = `Ongkos Kirim: Rp ${shippingCost.toLocaleString('id-ID')}`;
        const finalAmount = totalHarga + shippingCost - totalDiscount;
        totalHargaElement.textContent = finalAmount.toLocaleString('id-ID');
    }

    // Event listener untuk perubahan pilihan expedisi
    shippingMethodSelect.addEventListener('change', updateTotalHarga);

    // Event listener untuk tombol "Terapkan" diskon
    applyDiscountButton.addEventListener('click', function() {
        const code = discountCodeInput.value;
        if (code) {
            fetch(`/discounts/check/${code}`) // Ganti dengan route yang sesuai untuk cek diskon
                .then(response => response.json())
                .then(data => {
                    if (data.valid) {
                        totalDiscount = data.amount;
                        discountElement.textContent = `Diskon (${code}): -Rp ${totalDiscount.toLocaleString('id-ID')}`;
                    } else {
                        totalDiscount = 0;
                        discountElement.textContent = `Diskon: Rp 0`;
                        alert(data.message); // Tampilkan pesan error jika diskon tidak valid
                    }
                    updateTotalHarga(); // Perbarui total harga setelah menerapkan/menghapus diskon
                });
        }
    });

    // Panggil fungsi updateTotalHarga() saat halaman dimuat untuk inisialisasi
    updateTotalHarga();


    applyDiscountButton.addEventListener('click', function() {
    const code = discountCodeInput.value;
    if (code) {
        fetch(`/discounts/check/${code}`)
            .then(response => response.json())
            .then(data => {
                if (data.valid) {
                    totalDiscount = data.amount;
                    discountElement.textContent = `Diskon (${code}): -Rp ${totalDiscount.toLocaleString('id-ID')}`;
                } else {
                    totalDiscount = 0;
                    discountElement.textContent = `Diskon: Rp 0`;
                    alert(data.message);
                }
                updateTotalHarga();
            });
    }
});

</script>


@endsection
