<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request)
    { 
        if (!$request->expectsJson()) {
            // Cambia la redirección a la ruta login si no es una solicitud JSON
            return response()->json(['error' => 'No autenticado.'], 401);

        } 
    }
}
