<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';

        $jumlah_data_admin = User::where('level', 'Admin')->count();
        $jumlah_data_pelanggan = User::where('level', 'Pelanggan')->count();
        $jumlah_data_pesanan = Pesanan::count();

        $jumlah_pesanan_pending = Pesanan::where('status', 'Pending')->count();
        $jumlah_pesanan_diproses = Pesanan::where('status', 'Diproses')->count();
        $jumlah_pesanan_selesai = Pesanan::where('status', 'Selesai')->count();
        $jumlah_pesanan_diterima = Pesanan::where('status', 'Diterima')->count();

        return view('admin.dashboard.index', 
        compact(
            'title',
            'jumlah_data_admin',
            'jumlah_data_pelanggan',
            'jumlah_data_pesanan',
            'jumlah_pesanan_pending',
            'jumlah_pesanan_diproses',
            'jumlah_pesanan_selesai',
            'jumlah_pesanan_diterima'
        ));
    }
}
