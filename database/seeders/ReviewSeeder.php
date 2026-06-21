<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('reviews')->insert([
            [
                'booking_id' => 1,
                'user_id' => 2,
                'rating' => 5,
                'komentar' => 'Trip sangat menyenangkan, pemandangan bagus dan pelayanan ramah.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'booking_id' => 3,
                'user_id' => 2,
                'rating' => 4,
                'komentar' => 'Sunset di Bukit Merese sangat indah, recommended.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}