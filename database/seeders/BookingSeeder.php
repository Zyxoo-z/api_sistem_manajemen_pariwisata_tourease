<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('bookings')->insert([
            [
                'user_id' => 2,
                'paket_id' => 1,
                'tanggal_booking' => '2026-06-20',
                'jumlah_peserta' => 2,
                'total_harga' => 300000,
                'status' => 'confirmed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'paket_id' => 2,
                'tanggal_booking' => '2026-06-21',
                'jumlah_peserta' => 1,
                'total_harga' => 500000,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'paket_id' => 3,
                'tanggal_booking' => '2026-06-22',
                'jumlah_peserta' => 4,
                'total_harga' => 800000,
                'status' => 'confirmed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}