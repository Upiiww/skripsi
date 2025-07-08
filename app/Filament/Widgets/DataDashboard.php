<?php

namespace App\Filament\Widgets;

use App\Models\NpkData;
use App\Models\SoilData;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class DataDashboard extends BaseWidget
{
    // Auto-refresh widget setiap 3 detik
    protected static ?int $refreshInterval = 3;

    protected function getStats(): array
    {
        $latestSoil = SoilData::latest()->first();
        $latestNpk  = NpkData::latest()->first();

        // Default nilai soil
        $soilMoisture = $latestSoil ? number_format($latestSoil->soil_moisture, 2) . ' %' : 'N/A';
        $soilTemp     = $latestSoil ? number_format($latestSoil->soil_temperature, 2) . ' °C' : 'N/A';
        $soilPh       = $latestSoil ? number_format($latestSoil->soil_ph, 2) : 'N/A';

        // Default nilai NPK
        $nitrogen     = $latestNpk ? number_format($latestNpk->nitrogen, 2) . ' ppm' : 'N/A';
        $phosphorus   = $latestNpk ? number_format($latestNpk->phosphorus, 2) . ' ppm' : 'N/A';
        $potassium    = $latestNpk ? number_format($latestNpk->potassium, 2) . ' ppm' : 'N/A';

        // Status Pompa
        $nPumpStatus  = $latestNpk ? strtoupper($latestNpk->n_pump_status ?? 'OFF') : 'N/A';
        $pPumpStatus  = $latestNpk ? strtoupper($latestNpk->p_pump_status ?? 'OFF') : 'N/A';
        $kPumpStatus  = $latestNpk ? strtoupper($latestNpk->k_pump_status ?? 'OFF') : 'N/A';

        return [
            // Data tanah
            Stat::make('Kelembapan Tanah', $soilMoisture),
            Stat::make('Suhu Tanah', $soilTemp),
            Stat::make('pH Tanah', $soilPh),

            // Data NPK
            Stat::make('Nitrogen', $nitrogen),
            Stat::make('Phosphorus', $phosphorus),
            Stat::make('Potassium', $potassium),

            // Status Pompa
            Stat::make('Status Pompa N', $nPumpStatus),
            Stat::make('Status Pompa P', $pPumpStatus),
            Stat::make('Status Pompa K', $kPumpStatus),
        ];
    }
}
