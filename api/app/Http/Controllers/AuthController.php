<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;


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

        $usuario = User::where('email', '=', $request->email)->firstOrFail();

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
        $email =  $request->email;
        
        $filasActualizadas = User::where('email', $request->email )
        ->update([ 
            'password' => bcrypt($nueva_contrasena),
        ]);

        if ($filasActualizadas > 0) {
            // La actualización fue exitosa
            return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]);
        } else {
            // No se encontró un usuario con el ID proporcionado
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }

        //enviar correo aqui
    }
}
