<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinasiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('destinasis')->insert([
            [
                'nama_destinasi' => 'Pantai Senggigi',
                'lokasi' => 'Lombok Barat',
                'deskripsi' => 'Pantai wisata terkenal di Lombok dengan pemandangan sunset yang indah.',
                'harga_tiket' => 25000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_destinasi' => 'Gili Trawangan',
                'lokasi' => 'Lombok Utara',
                'deskripsi' => 'Pulau wisata dengan pantai indah, snorkeling, dan diving.',
                'harga_tiket' => 50000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_destinasi' => 'Bukit Merese',
                'lokasi' => 'Lombok Tengah',
                'deskripsi' => 'Bukit dengan panorama laut dan spot sunset terbaik di Lombok.',
                'harga_tiket' => 15000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}