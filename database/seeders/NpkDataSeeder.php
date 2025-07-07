<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NpkDataSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('npk_data')->insert([
            [
                'device_id'=>1,
                'nitrogen' => 150,
                'phosphorus' => 100,
                'potassium' => 80,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'device_id'=>1,
                'nitrogen' => 170,
                'phosphorus' => 90,
                'potassium' => 85,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
