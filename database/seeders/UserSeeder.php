<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Hannan',
                'email' => 'hannan@gmail.com',
                'password' => Hash::make('hannan123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Riski',
                'email' => 'riski@gmail.com',
                'password' => Hash::make('riski123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Abin',
                'email' => 'abin@gmail.com',
                'password' => Hash::make('abin123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}