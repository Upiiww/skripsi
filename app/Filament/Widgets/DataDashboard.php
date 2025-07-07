<?php

namespace App\Filament\Widgets;

use App\Models\NpkData;
use App\Models\SoilData;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class DataDashboard extends BaseWidget
{
    // Auto-refresh widget setiap 10 detik
    protected static ?int $refreshInterval = 10;

    protected function getStats(): array
    {
        $latestSoil = SoilData::latest()->first();
        $latestNpk = NpkData::latest()->first();

        // Default nilai
        $soilMoisture = $latestSoil ? number_format($latestSoil->soil_moisture, 2) . ' %' : 'N/A';
        $soilTemp     = $latestSoil ? number_format($latestSoil->soil_temperature, 2) . ' °C' : 'N/A';
        $soilPh       = $latestSoil ? number_format($latestSoil->soil_ph, 2) : 'N/A';

        $nitrogen     = $latestNpk ? number_format($latestNpk->nitrogen, 2) . ' ppm' : 'N/A';
        $phosphorus   = $latestNpk ? number_format($latestNpk->phosphorus, 2) . ' ppm' : 'N/A';
        $potassium    = $latestNpk ? number_format($latestNpk->potassium, 2) . ' ppm' : 'N/A';


        return [
            Stat::make('Kelembapan Tanah', $soilMoisture),
            Stat::make('Suhu Tanah', $soilTemp),
            Stat::make('pH Tanah', $soilPh),

            Stat::make('Nitrogen', $nitrogen),
            Stat::make('Phosphorus', $phosphorus),
            Stat::make('Potassium', $potassium),
        ];
    }
}
