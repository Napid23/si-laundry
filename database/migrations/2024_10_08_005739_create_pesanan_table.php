<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('no_invoice')->comment('Format: INV-2024/07/12/1, INV-tahun/bulan/tanggal/urutan_pesanan/random angka');
            $table->foreignId('creator_id')->constrained('users')->nullable()->comment('id admin yang login, diambil dari tabel users dengan level admin');
            $table->foreignId('pelanggan_id')->constrained('users')->nullable()->comment('id pelanggan yang login, diambil dari tabel users dengan level pelanggan');
            $table->foreignId('paket_id')->constrained('paket')->nullable();
            $table->double('berat')->comment('berat dalam kg');
            $table->double('total_harga');
            $table->dateTime('tanggal_pesanan')->nullable();
            $table->dateTime('tanggal_proses')->nullable();
            $table->dateTime('tanggal_selesai')->nullable();
            $table->dateTime('tanggal_diterima')->nullable();
            $table->enum('status', ['Pending', 'Diproses', 'Selesai', 'Diterima']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
}
