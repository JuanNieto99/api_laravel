<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
class CheckPermission
{
    public function handle($request, Closure $next, $permission)
    {
        // Verificar si el usuario tiene el permiso
        if (!$this->checkPermission($permission)) {
            
            return response()->json([
                'message' => 'No tienes permisos para acceder a esta página.'
            ], 403); // Código de estado 403 para indicar falta de permisos
            
            //abort(403, 'No tienes permisos para acceder a esta página.');
        }

        return $next($request);
    }

    protected function checkPermission($permission)
    { 
        // Obtener el usuario actual
        $user = auth()->user();
    
        // Verificar si el usuario tiene roles
        if ($user && $user->roles) {
            $hasPermission = $user->roles->whereHas('rolPermisoDetalle.permiso', function ($query) use ($permission) {
                $query->where('codigo', $permission);
            })->count() > 0;
            
            return $hasPermission;
        }
    
        return response()->json(['error' => 'Usuario no autorizado'], 403);

    }

}
/*use Illuminate\Support\Facades\Log;
Log::debug($user); */
