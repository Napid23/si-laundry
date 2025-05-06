<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/testUser', function() {
    return view('user.main.index');
});

Route::middleware('guest')->group(function(){
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
});

Route::middleware('auth')->group(function(){
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');  

    Route::resource('pengguna', PenggunaController::class);
    Route::resource('paket', PaketController::class);
    Route::resource('pesanan', PesananController::class);
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');  
    Route::get('/laporan/export-pdf', [LaporanController::class, 'exportpdf'])->name('laporan.export-pdf');

    Route::get('/pesanan/{id}/print-nota-kecil', [PesananController::class, 'print_kecil'])->name('pesanan.nota_kecil');
});