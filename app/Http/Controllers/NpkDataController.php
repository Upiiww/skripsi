<?php

namespace App\Http\Controllers;

use App\Models\NpkData;
use Illuminate\Http\Request;

class NpkDataController extends Controller
{
    public function index()
    {
        return NpkData::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'device_id' => 'required|integer',
            'nitrogen' => 'required|numeric',
            'phosphorus' => 'required|numeric',
            'potassium' => 'required|numeric',
            'n_pump_status' => 'nullable|string',
            'p_pump_status' => 'nullable|string',
            'k_pump_status' => 'nullable|string',
        ]);

        $data = NpkData::create($validated);

        $formattedData = $data->toArray();
        $formattedData['nitrogen'] = number_format($formattedData['nitrogen'], 2);
        $formattedData['phosphorus'] = number_format($formattedData['phosphorus'], 2);
        $formattedData['potassium'] = number_format($formattedData['potassium'], 2);

        return response()->json([
            'message' => 'NPK data saved successfully',
            'data' => $formattedData,
        ], 200); // Gunakan kode 200 untuk menghindari error 226
    }

    public function show($id)
    {
        return NpkData::where('device_id', $id)->get();
    }
}
