<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolCheck
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $rol)
    {
        // Si no está autenticado
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Si el rol no coincide
        if (Auth::user()->rol !== $rol) {
            abort(403, 'No tienes permisos para acceder a esta página');
        }

        return $next($request);
    }
}
