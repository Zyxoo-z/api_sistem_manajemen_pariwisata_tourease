<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('payments')->insert([
            [
                'booking_id' => 1,
                'metode_pembayaran' => 'Transfer Bank',
                'jumlah_bayar' => 300000,
                'tanggal_bayar' => now(),
                'status_pembayaran' => 'paid',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'booking_id' => 2,
                'metode_pembayaran' => 'QRIS',
                'jumlah_bayar' => 500000,
                'tanggal_bayar' => now(),
                'status_pembayaran' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'booking_id' => 3,
                'metode_pembayaran' => 'Transfer Bank',
                'jumlah_bayar' => 800000,
                'tanggal_bayar' => now(),
                'status_pembayaran' => 'paid',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}