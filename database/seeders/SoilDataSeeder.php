<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoilDataSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('soil_data')->insert([
            [
                'moisture' => 45,
                'temperature' => 29,
                'ph' => 6.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'moisture' => 50,
                'temperature' => 28,
                'ph' => 6.8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
