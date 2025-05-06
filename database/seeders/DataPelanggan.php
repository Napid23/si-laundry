<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataPelanggan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelanggan')->insert([
            [
                'user_id' => '2',
                'alamat' => 'sambiroto',
                'no_hp' => '087890218976',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => '3',
                'alamat' => 'Mojokerto',
                'no_hp' => '085234123669',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
