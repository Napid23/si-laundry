<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $title = 'Profile';
        $user = Auth::user();
        
        return view('admin.profile.index', compact('title', 'user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' .Auth::user()->id,
            'password' => 'nullable',
        ]);

        $user = User::find(Auth::user()->id);
        $user->nama = $request->nama;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        if ($user) {
            return redirect()->route('profile')->with('status', 'success')->with('title', 'Berhasil')->with('message', 'Profil Berhasil Diperbarui');
        } else {
            return redirect()->route('profile')->with('status', 'danger')->with('title', 'Gagal')->with('message', 'Profil Gagal Diperbarui');
        }
    }
}
