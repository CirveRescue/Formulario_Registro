<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLogin
{
    /**
     * Manejar una solicitud entrante.
     */
    public function handle(Request $request, Closure $next)
    {
        // Verificar si la sesión tiene el dato de 'nombre' (o cualquier otro indicador de login)
        if (!session('nombre')) {
            // Si no está logueado, redirige al login con un mensaje de error
            return redirect()->route('auth.login')->with('error', 'Debes iniciar sesión para acceder.');
        }

        return $next($request);
    }
}
