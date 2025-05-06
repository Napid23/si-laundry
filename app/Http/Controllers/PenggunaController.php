<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Pengguna';
        $user = User::latest()->get();

        return view('admin.pengguna.index', compact('title', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Pengguna';
        $level = ['Admin', 'Pelanggan'];
        return view('admin.pengguna.create', compact('title', 'level'));
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
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' .Auth::user()->id,
            'password' => 'required',
            'level' => 'required',
        ]);

        $user = new User;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();

        if ($user) {
            return redirect()->route('pengguna.index')->with('status', 'success')->with('title', 'Berhasil')->with('message', 'Pengguna Berhasil Ditambahkan');
        } else {
            return redirect()->route('pengguna.index')->with('status', 'danger')->with('title', 'Gagal')->with('message', 'Pengguna Gagal Ditambahkan');
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
        $title = 'Edit Pengguna';
        $user = User::find($id);
        $level = ['Admin', 'Pelanggan'];

        return view('admin.pengguna.edit', compact('title', 'user', 'level'));
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
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable',
            'level' => 'required',
        ]);

        $user = User::find($id);
        $user->nama = $request->nama;
        $user->email = $request->email;
        if ($user->password) {
            $user->password = Hash::make($request->password);
        }
        $user->level = $request->level;
        $user->save();

        if ($user) {
            return redirect()->route('pengguna.index')->with('status', 'success')->with('title', 'Berhasil')->with('message', 'Pengguna Berhasil Diubah');
        } else {
            return redirect()->route('pengguna.index')->with('status', 'danger')->with('title', 'Gagal')->with('message', 'Pengguna Gagal Diubah');
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
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('pengguna.index')->with('status', 'success')->with('title', 'Berhasil')->with('message', 'Pengguna Berhasil Dihapus');
        } else {
            return redirect()->route('pengguna.index')->with('status', 'danger')->with('title', 'Gagal')->with('message', 'Pengguna Gagal Dihapus');
        }
    }
}
