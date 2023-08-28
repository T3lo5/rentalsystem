<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with('user', 'veiculo')->get();
        return response()->json($reservas);
    }

    public function store(Request $request)
    {
        $reserva = Reserva::create($request->all());
        return response()->json($reserva, 201);
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return response()->json(null, 204);
    }
}