<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Mail\EnviarCorreoContrasena;
class AuthController extends Controller
{
    
    public function login(Request $request) {
        
        Log::debug( $request->only('email','password'));
        if(!Auth::attempt($request->only('email','password'))){
            return response()->json(
                [
                    'message' => "No autorizado",
                ], 401
            );
        }

        $usuario = User::with(['roles.rolPermisoDetalle.permiso'])->where('email', '=', $request->email)->first();
        //        $usuario = User::join('rols','rols.id','=','usuarios')->where('email', '=', $request->email)->first();

        $token = $usuario->createToken("tokens")->plainTextToken;

        return response()
        ->json([
            'token' => $token ,
            'usuario' => [
                'id' => $usuario->id,
                'usuario' => $usuario->usuario,
                'email' => $usuario->email,
                'rol_id' => $usuario->rol_id,
                'estado' => $usuario->estado,
                'rol' => $usuario->roles,
            ],
        ]);
    }

    public function logout() {
        auth()->user()->tokens()->delete();

        return [
            'message' => "sesión cerrada"
        ];
    }

    public function recuperarContrasena(Request $request) {
        
        $fechaActual = Carbon::now()->format('YmdHis');
        $numeroAleatorioEnRango = mt_rand(0, 10000);  

        $nueva_contrasena =  $numeroAleatorioEnRango.$fechaActual.'lam';
        Log::debug(  $nueva_contrasena);
        $filasActualizadas = User::where('email', $request->email )
        ->update([ 
            'password' => bcrypt($nueva_contrasena),
        ]);

        if ($filasActualizadas > 0) {

            Mail::to($request->email)->send(new EnviarCorreoContrasena($nueva_contrasena));
            // La actualización fue exitosa
            return response()->json(['mensaje' => 'Actualización exitosa, pronto te llegara un correo', 'code' => "success"]);
        } else {
            // No se encontró un usuario con el ID proporcionado
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }

      
    }
}
