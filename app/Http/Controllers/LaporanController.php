<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Laporan';

        $query = Pesanan::with('pelanggan');

        // Filter berdasarkan rentang tanggal
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('tanggal_pesanan', [$request->start_date, $request->end_date]);
        }
    
        // Filter berdasarkan dropdown
        if ($request->filter == 'today') {
            $query->whereDate('tanggal_pesanan', Carbon::today());
        } elseif ($request->filter == 'week') {
            $query->whereBetween('tanggal_pesanan', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($request->filter == 'month') {
            $query->whereMonth('tanggal_pesanan', Carbon::now()->month);
        } elseif ($request->filter == 'year') {
            $query->whereYear('tanggal_pesanan', Carbon::now()->year);
        }
    
        $laporan = $query->get();
    
        return view('admin.laporan.index', compact('title', 'laporan'));
    }

    public function exportpdf(Request $request)
    {
        $query = Pesanan::with('pelanggan');

        // Filter berdasarkan rentang tanggal
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('tanggal_pesanan', [$request->start_date, $request->end_date]);
        }

        // Filter berdasarkan dropdown
        if ($request->filter == 'today') {
            $query->whereDate('tanggal_pesanan', Carbon::today());
        } elseif ($request->filter == 'week') {
            $query->whereBetween('tanggal_pesanan', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($request->filter == 'month') {
            $query->whereMonth('tanggal_pesanan', Carbon::now()->month);
        } elseif ($request->filter == 'year') {
            $query->whereYear('tanggal_pesanan', Carbon::now()->year);
        }

        $laporan = $query->get();

        $pdf = Pdf::loadView('admin.laporan.pdf', compact('laporan'));

        return $pdf->download('Laporan Laundry.pdf');
    }

}
