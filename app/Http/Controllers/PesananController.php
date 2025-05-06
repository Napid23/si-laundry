<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paket;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Pesanan';
        if (auth()->user()->level == 'Admin') {
            $pesanan = Pesanan::latest()->get();
        } else {
            $pesanan = Pesanan::where('pelanggan_id', auth()->user()->id)->latest()->get();
        }

        return view('admin.pesanan.index', compact('title', 'pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Pesanan';
        $pelanggan = User::where('level', 'Pelanggan')->latest()->get();
        $paket = Paket::latest()->get();

        return view('admin.pesanan.create', compact('title', 'pelanggan', 'paket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'paket_id' => 'required',
            'berat' => 'required',
            'total_harga' => 'required',
        ]);

        $pesanan_terakhir = Pesanan::max('id') ?? 0;
        $no_invoice = 'INV-' . date('Y/m/d') . '/' . ($pesanan_terakhir + 1);

        $pesanan = new Pesanan;
        $pesanan->no_invoice = $no_invoice;
        $pesanan->creator_id = auth()->user()->id;
        $pesanan->pelanggan_id = $request->pelanggan_id;
        $pesanan->paket_id = $request->paket_id;
        $pesanan->berat = $request->berat;
        $pesanan->total_harga = preg_replace('/[^0-9]/', '', $request->total_harga);
        $pesanan->tanggal_pesanan = date('Y-m-d H:i:s');
        $pesanan->status = 'Pending';
        $pesanan->save();

        if ($pesanan) {
            return redirect()->route('pesanan.index')->with('status', 'success')->with('title', 'Berhasil')->with('message', 'Pesanan Berhasil Ditambah');
        } else {
            return redirect()->route('pesanan.index')->with('status', 'danger')->with('title', 'Gagal')->with('message', 'Pesanan Gagal Ditambah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Detail Pesanan';
        $pesanan = Pesanan::find($id);

        return view('admin.pesanan.show', compact('title', 'pesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Pesanan';
        $pelanggan = User::where('level', 'Pelanggan')->latest()->get();
        $paket = Paket::latest()->get();
        $status = ['Pending', 'Proses', 'Selesai', 'Diterima'];
        $pesanan = Pesanan::find($id);
        $pesanan->total_harga = 'Rp '.number_format($pesanan->total_harga, 0, ',', '.');

        return view('admin.pesanan.edit', compact('title', 'pelanggan', 'paket', 'status', 'pesanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->level == 'Admin') {
            $request->validate([
                'pelanggan_id' => 'required',
                'paket_id' => 'required',
                'berat' => 'required',
                'total_harga' => 'required',
            ]);

            $pesanan = Pesanan::find($id);
            $pesanan->pelanggan_id = $request->pelanggan_id;
            $pesanan->paket_id = $request->paket_id;
            $pesanan->berat = $request->berat;
            $pesanan->total_harga = preg_replace('/[^0-9]/', '', $request->total_harga);
            $pesanan->status = $request->status;;

            if ($request->status == 'Diproses') {
                $pesanan->tanggal_proses = date('Y-m-d H:i:s');
            } elseif ($request->status == 'Selesai') {
                $pesanan->tanggal_selesai = date('Y-m-d H:i:s');
            } elseif ($request->status == 'Diterima') {
                $pesanan->tanggal_diterima = date('Y-m-d H:i:s');
            }

            $pesanan->save();
        } else {
            $pesanan = Pesanan::find($id);
            $pesanan->status = 'Diterima';
            $pesanan->tanggal_diterima = date('Y-m-d H:i:s');
            $pesanan->save();
        }

        if ($pesanan) {
            return redirect()->route('pesanan.index')->with('status', 'success')->with('title', 'Berhasil')->with('message', 'Pesanan Berhasil Diubah');
        } else {
            return redirect()->route('pesanan.index')->with('status', 'danger')->with('title', 'Gagal')->with('message', 'Pesanan Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesanan = Pesanan::find($id);
        
        if ($pesanan) {
            $pesanan->delete();
            return redirect()->route('pesanan.index')->with('status', 'success')->with('title', 'Berhasil')->with('message', 'Pesanan Berhasil Dihapus');
        } else {
            return redirect()->route('pesanan.index')->with('status', 'danger')->with('title', 'Gagal')->with('message', 'Pesanan Gagal Dihapus');
        }
    }

    public function print_kecil($id)
    {
        $pesanan = Pesanan::find($id);
        $tanggal_nota = date(now());

        return view('admin.pesanan.nota-kecil', compact('pesanan', 'tanggal_nota'));
    }
}
