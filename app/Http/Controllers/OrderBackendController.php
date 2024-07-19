<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class OrderBackendController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::query();

        // Filter berdasarkan status
        if ($request->has('status') && $request->status != '') {
            $orders->where('status', $request->status);
        }

        // Filter berdasarkan nama pemesan
        if ($request->has('name')) {
            $orders->whereHas('user', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->name . '%');
            });
        }

        // Filter berdasarkan nama produk
        if ($request->has('product')) {
            $orders->whereHas('orderItem.product', function ($query) use ($request) {
                $query->where('nama', 'like', '%' . $request->product . '%');
            });
        }

        $orders = $orders->with('user', 'orderItem.product')->latest()->get();

        return view('backend.order.index', compact('orders'));
    }


    public function show($orderId)
    {
        $order = Order::find($orderId);

        if (!$order) {
            abort(404); // Handle case where order is not found
        }

        $order->load('user', 'orderItem.product');

        return view('backend.order.show', compact('order'));
    }


    public function printOrder($orderId)
    {
        $order = Order::with('user', 'orderItem.product')->findOrFail($orderId);

        $pdf = PDF::loadView('backend.order.print', compact('order'));

        // Customize PDF options (optional)
        $pdf->setPaper('A4', 'portrait');
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 5000);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);

        return $pdf->stream('order_' . $orderId . '.pdf');
    }

    public function printMultiple(Request $request)
    {
        $orderIds = explode(',', $request->input('orders'));
        $orders = Order::whereIn('id', $orderIds)->with('user', 'orderItem.product')->get();

        $pdf = PDF::loadView('backend.order.print', compact('order'));
        // Generate PDF atau tampilan cetak lainnya menggunakan $orders
        // ...
        $pdf->setPaper('A4', 'portrait');
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 5000);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);


        return view('backend.order.print_multiple', compact('orders')); // Atau return response PDF
    }

    public function printInvoice($orderId)
    {
        $order = Order::with('user', 'orderItem.product')->findOrFail($orderId);

    $pdf = PDF::loadView('backend.order.print_invoice', compact('order'));
    $pdf->setPaper('A4', 'portrait');


    // Pastikan nama file PDF sesuai
    return  $pdf->stream('invoice_' . $order->id . '.pdf');
    }

    public function printPackingSlip($orderId)
    {
        $order = Order::with('user', 'orderItem.product')->findOrFail($orderId);
        $pdf = PDF::loadView('backend.order.print_packing_slip', compact('order'));
        return $pdf->stream('packing_slip_' . $order->id . '.pdf');
    }

    public function printLabel($orderId)
    {
        $order = Order::with('user', 'orderItem.product')->findOrFail($orderId);
        $pdf = PDF::loadView('backend.order.print_label', compact('order'));
        return $pdf->stream('label_' . $order->id . '.pdf');
    }


    public function updateOrderStatus(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->status = $request->input('newStatus');
        $order->save();

        return redirect()->back()->with('success', 'Status pesanan berhasil diubah.');
    }

}
