<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataPesanan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pesanan')->insert([
            [
                'no_invoice' => 'INV-2024/10/8/1',
                'creator_id' => 1,
                'paket_id' => 1,
                'pelanggan_id' => 2,
                'berat' => 5,
                'total_harga' => 20000,
                'tanggal_pesanan' => now(),
                'tanggal_proses' => now(),
                'status' => 'Diproses',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('pesanan')->insert([
            [
                'no_invoice' => 'INV-2024/10/8/2',
                'creator_id' => 1,
                'paket_id' => 2,
                'pelanggan_id' => 2,
                'berat' => 3,
                'total_harga' => 9000,
                'tanggal_pesanan' => now(),
                'status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('pesanan')->insert([
            [
                'no_invoice' => 'INV-2024/10/8/3',
                'creator_id' => 1,
                'paket_id' => 3,
                'pelanggan_id' => 2,
                'berat' => 2,
                'total_harga' => 4000,
                'tanggal_pesanan' => now(),
                'tanggal_proses' => now(),
                'tanggal_selesai' => now(),
                'status' => 'Selesai',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('pesanan')->insert([
            [
                'no_invoice' => 'INV-2024/10/8/4',
                'creator_id' => 1,
                'paket_id' => 1,
                'pelanggan_id' => 2,
                'berat' => 4,
                'total_harga' => 16000,
                'tanggal_pesanan' => now(),
                'tanggal_proses' => now(),
                'tanggal_selesai' => now(),
                'tanggal_diterima' => now(),
                'status' => 'Diterima',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
