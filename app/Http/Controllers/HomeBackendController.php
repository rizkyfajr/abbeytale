<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StatusPegawai;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class HomeBackendController extends Controller
{
    public function index()
    {
         // Total penjualan
         $totalSales = Order::where('status', 'finished')->sum('total_amount');

         // Jumlah pesanan
         $totalOrders = Order::count();

         // Produk terlaris
         $topProducts = Product::select('products.id', 'products.nama', DB::raw('SUM(order_items.quantity) as total_sold'))
             ->join('order_items', 'products.id', '=', 'order_items.product_id')
             ->groupBy('products.id', 'products.nama')
             ->orderByDesc('total_sold')
             ->limit(5)
             ->get();

         // Tren penjualan (misalnya, penjualan per bulan dalam 6 bulan terakhir)
         $salesTrend = Order::select(
             DB::raw('MONTH(created_at) as month'),
             DB::raw('YEAR(created_at) as year'),
             DB::raw('SUM(total_amount) as total_sales')
         )
             ->where('status', 'finished')
             ->where('created_at', '>=', Carbon::now()->subMonths(6))
             ->groupBy('month', 'year')
             ->orderBy('year', 'asc')
             ->orderBy('month', 'asc')
             ->get();

         return view('backend-pages', compact('totalSales', 'totalOrders', 'topProducts', 'salesTrend'));

    }
}
