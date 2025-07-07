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
                'device_id'=>1,
                'soil_moisture' => 45,
                'soil_temperature' => 29,
                'soil_ph' => 6.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'device_id'=>1,
                'soil_moisture' => 50,
                'soil_temperature' => 28,
                'soil_ph' => 6.8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
