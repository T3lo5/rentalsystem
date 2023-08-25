<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'client') {
            return response()->json(['client' => $user]);
        } else {
            return response()->json(['message' => 'Acesso não autorizado.'], 403);
        }
    }

        public function update(Request $request)
    {
        $user = Auth::user();

        if ($user->role === 'client') {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'phone' => 'required|string|max:20',
                'address' => 'required|string|max:255',
            ]);

            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->phone = $data['phone'];
            $user->address = $data['address'];
            $user->save();

            return response()->json(['message' => 'Perfil do cliente atualizado com sucesso.']);
        } else {
            return response()->json(['message' => 'Acesso não autorizado.'], 403);
        }
    }


    public function show(User $client)
    {
        $user = Auth::user();

        // Verifica se o usuário autenticado tem o papel de cliente e se é o mesmo usuário que está sendo visualizado
        if ($user->role === 'client' && $user->id === $client->id) {
            return view('clients.show', compact('client'));
        } else {
            return response()->json(['message' => 'Acesso não autorizado.'], 403);
        }
    }
}
