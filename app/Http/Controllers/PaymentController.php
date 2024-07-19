<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Order;
use App\Models\Product;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index($orderId){
        $order = Order::findOrFail($orderId);

        return view('frontend.payment.index', compact('order'));
    }

    public function confirmation($paymentId){
        $payment = Payment::findOrFail($paymentId);
        $order = $payment->order; // Mengambil pesanan yang terkait dengan pembayaran

        return view('frontend.checkout.confirmation', compact('payment', 'order'));
    }


    public function store(Request $request){
        $orderId = $request->input('order_id');
        $order = Order::find($orderId);
// dd($order);
        $validatedData = $request->validate([
            'payment_method' => 'required',
            'proof_of_payment' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi bukti pembayaran
        ]);

        // Simpan bukti pembayaran (upload ke storage, dll.)
        $proofPath = $request->file('proof_of_payment')->store('proofs', 'public');

        // Buat data pembayaran
        $payment = Payment::create([
            'order_id' => $order->id,
            'payment_method' => $validatedData['payment_method'],
            'amount' => $order->total_amount,
            'status' => 'paid', // Status awal pending menunggu konfirmasi
            'proof_of_payment' => $proofPath, // Simpan path bukti pembayaran
        ]);

        // Update status pesanan menjadi 'menunggu pembayaran'
        $order->update(['status' => 'processing']);
        return redirect()->route('payment.confirmation', $payment->id)->with('success', 'Terima kasih! Telah Melampirkan Pembayaran. Pesanan Anda telah dibuat.');

    }
}
