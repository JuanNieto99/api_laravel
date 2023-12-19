<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\User;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail; 
use App\Mail\EnviarCorreoContrasena;
use App\Models\Historial;
use Predis\Client;

class AuthController extends Controller
{
    
    public function login(Request $request) {

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

        $json = [
            'asunto' => 'Autenticacion',
            'adjunto' => [],
        ];

        Historial::insert([
            'tipo' => 0,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,   
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),     
        ]);

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
        $usuario = auth()->user(); 
        auth()->user()->tokens()->delete();

        $json = [
            'asunto' => 'logOut',
            'adjunto' => [],
        ];

        Historial::insert([
            'tipo' => 0,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,   
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),                  
        ]);

        return [
            'message' => "sesión cerrada"
        ];
    }

    public function recuperarContrasena(Request $request) {
        
        $fechaActual = Carbon::now()->format('YmdHis');
        $numeroAleatorioEnRango = mt_rand(0, 10000);  

        $nueva_contrasena =  $numeroAleatorioEnRango.$fechaActual.'lam'; 
        
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

    public function sokets () {

     //   event(new EventoNotificacion($actionId, $actionData));  
        $menseje = [
            'tipo' => 'validacion usuario cambio de contrasena',
            'info' => 'Se ha cambiado la contraseña en 5 segundos se te cerrara la sesión',
            'codigo' => 100,
            'data' => ["id" => 0],
        ];  

      //  broadcast(new EventoNotificacion("1"));

      // Crea una instancia de Redis
        $redis = new Client([
            'scheme' => 'tcp',
            'host'   => 'redis',
            'port'   => 6379,
        ]);

        // Nombre del canal al que quieres publicar el mensaje
        $channel = 'channel-notificacion';

        // Mensaje que deseas enviar 

        // Publica el mensaje en el canal
        $redis->publish($channel, json_encode($menseje));

    }
}
