<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pesanan;

class AdminController extends Controller
{
    public function index()
    {
        $totalProduk = Produk::count();
        $totalPesanan = Pesanan::count();
        $totalPendapatan = Pesanan::where('status', 'selesai')->sum('harga');

        $pesananTerbaru = Pesanan::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalProduk',
            'totalPesanan',
            'totalPendapatan',
            'pesananTerbaru'
        ));
    }
}
