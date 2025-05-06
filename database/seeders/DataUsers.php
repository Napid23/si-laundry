<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DataUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('users')->insert([
            [
                'nama' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'level' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Pelanggan',
                'email' => 'pelanggan@gmail.com',
                'password' => Hash::make('pelanggan'),
                'level' => 'Pelanggan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Nafid Fadli',
                'email' => 'nafid@gmail.com',
                'password' => Hash::make('123'),
                'level' => 'Pelanggan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
