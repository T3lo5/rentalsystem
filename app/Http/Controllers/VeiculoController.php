<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    public function index()
    {
        $veiculos = Veiculo::with('categoria')->get();
        return response()->json($veiculos);
    }

    public function store(Request $request)
    {
        $veiculo = Veiculo::create($request->all());
        return response()->json($veiculo, 201);
    }

    public function destroy(Veiculo $veiculo)
    {
        $veiculo->delete();
        return response()->json(null, 204);
    }
}