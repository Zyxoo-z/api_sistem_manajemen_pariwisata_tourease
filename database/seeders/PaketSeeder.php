<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaketSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pakets')->insert([
            [
                'destinasi_id' => 1,
                'nama_paket' => 'Paket Senggigi 1 Hari',
                'durasi' => '1 Hari',
                'harga' => 150000,
                'deskripsi' => 'Paket wisata Pantai Senggigi selama 1 hari termasuk transport lokal.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'destinasi_id' => 2,
                'nama_paket' => 'Paket Gili Trawangan 2 Hari 1 Malam',
                'durasi' => '2 Hari 1 Malam',
                'harga' => 500000,
                'deskripsi' => 'Paket wisata Gili Trawangan termasuk boat PP dan penginapan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'destinasi_id' => 3,
                'nama_paket' => 'Paket Bukit Merese Sunset Trip',
                'durasi' => '1 Hari',
                'harga' => 200000,
                'deskripsi' => 'Paket trip ke Bukit Merese untuk menikmati sunset.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}