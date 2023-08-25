<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            $admins = User::where('role', 'admin')->get();
            return response()->json(['admins' => $admins]);
        } else {
            return response()->json(['message' => 'Acesso não autorizado.'], 403);
        }
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6',
                'phone' => 'required|string|max:20',
                'address' => 'required|string|max:255',
               
            ]);

            $data['password'] = bcrypt($data['password']); // Criptografa a senha

            $admin = User::create(array_merge($data, ['role' => 'admin']));

            return response()->json(['message' => 'Administrador criado com sucesso.']);
        } else {
            return response()->json(['message' => 'Acesso não autorizado.'], 403);
        }
    }

    public function destroy(User $admin)
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            if ($admin->isAdmin()) {
                return response()->json(['message' => 'Você não pode excluir outro administrador.'], 403);
            }

            $admin->delete();

            return response()->json(['message' => 'Administrador excluído com sucesso.']);
        } else {
            return response()->json(['message' => 'Acesso não autorizado.'], 403);
        }
    }
}
