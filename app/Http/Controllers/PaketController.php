<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Paket';
        $paket = Paket::latest()->get();

        return view('admin.paket.index', compact('title', 'paket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Paket';
        return view('admin.paket.create', compact('title'));
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
            'nama_paket' => 'required',
            'harga_paket' => 'required',
        ]);

        $paket = new Paket;
        $paket->nama_paket = $request->nama_paket;
        $paket->harga_paket = preg_replace('/[^0-9]/', '', $request->harga_paket);
        $paket->save();

        if ($paket) {
            return redirect()->route('paket.index')->with('status', 'success')->with('title', 'Berhasil')->with('message', 'Paket Berhasil Ditambahkan');
        } else {
            return redirect()->route('paket.index')->with('status', 'danger')->with('title', 'Gagal')->with('message', 'Paket Gagal Ditambahkan');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Paket';
        $paket = Paket::find($id);
        $paket->harga_paket = 'Rp '.number_format($paket->harga_paket, 0, ',', '.');

        return view('admin.paket.edit', compact('title', 'paket'));
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
        $request->validate([
            'nama_paket' => 'required',
            'harga_paket' => 'required',
        ]);

        $paket = Paket::find($id);
        $paket->nama_paket = $request->nama_paket;
        $paket->harga_paket = preg_replace('/[^0-9]/', '', $request->harga_paket);
        $paket->save();

        if ($paket) {
            return redirect()->route('paket.index')->with('status', 'success')->with('title', 'Berhasil')->with('message', 'Paket Berhasil Diubah');
        } else {
            return redirect()->route('paket.index')->with('status', 'danger')->with('title', 'Gagal')->with('message', 'Paket Gagal Diubah');
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
        $paket = Paket::find($id);

        if ($paket) {
            $paket->delete();
            return redirect()->route('paket.index')->with('status', 'success')->with('title', 'Berhasil')->with('message', 'Paket Berhasil Dihapus');
        } else {
            return redirect()->route('paket.index')->with('status', 'danger')->with('title', 'Gagal')->with('message', 'Paket Gagal Dihapus');
        }
    }
}
