<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataPaket extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paket')->insert([
            [
                'nama_paket' => 'Cuci Kering',
                'harga_paket' => 4000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_paket' => 'Cuci Basah',
                'harga_paket' => 3000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_paket' => 'Seterika',
                'harga_paket' => 2000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
