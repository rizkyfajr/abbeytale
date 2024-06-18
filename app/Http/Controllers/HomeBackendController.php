<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\StatusPegawai;
use App\Models\Bagian;
use Illuminate\Http\Request;

class HomeBackendController extends Controller
{
    public function index()
    {
        $jumlahBagian = \App\Models\Bagian::count();
        $jumlahPegawai = \App\Models\Pegawai::count();
        return view('backend-pages', compact('jumlahBagian', 'jumlahPegawai'));
    }
}
