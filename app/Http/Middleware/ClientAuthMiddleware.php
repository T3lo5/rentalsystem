<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClientAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->role === 'client') {
            return $next($request);
        }

        return response()->json(['message' => 'Acesso não autorizado.'], 403);
    }
}
