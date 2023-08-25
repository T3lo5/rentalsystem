<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return response()->json(['vehicles' => $vehicles]);
    }

    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return response()->json(['vehicle' => $vehicle]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        Vehicle::create($data);

        return response()->json(['message' => 'Vehicle created successfully']);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($data);

        return response()->json(['message' => 'Vehicle updated successfully']);
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return response()->json(['message' => 'Vehicle deleted successfully']);
    }
}
