<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Rol;
use App\Models\Usuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);

        $query = Usuario::where('estado',1)->orderBy('usuario', 'asc');

		return $per_page? $query->paginate($per_page) : $query->get();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'usuario' => 'required|string|max:50',
                'email' => 'required|string|email|max:50|unique:usuarios',
                'password' => 'required|string|min:8',
                'rol_id' => 'required|integer', 
                'superadmin' => 'required|integer', 
            ], 
            [
                'usuario.required' => "El campo es requerio",
                'usuario.max' => "La cantidad maxima del campo  es  50",
                'email.required' => "El campo es requerido",
                'email.max' => "La cantidad maxima del campo  es  50",
                'email.unique' =>  "El email ya existe",
                'email.email' => "El email enviado no cumple con el formado de email",
                'password.required' =>  "El campo  es requerio",
                'password.min' =>  "La cantidad minima del campo es 8",
                'rol_id.required' => "El campo  es requerido",
                'superadmin.required'=> "El campo  es requerido",
                
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $usuario = User::create([
            'usuario' => $request->usuario,
            'email' => $request->email,
            'password' => $request->password,
            'rol_id' => $request->rol_id,
            'superadmin' =>  $request->superadmin,
            'estado' => '1',
        ]);

        $token = $usuario->createToken("tokens")->plainTextToken;

        $json = [
            'asunto' => 'Usuario Creado',
            'adjunto' => [
                'respuesta' => !empty($usuario),
            ],
        ];
    
        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 11,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,    
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),                 
        ]);

        if($usuario){
            return response()
            ->json([
                'usuario' => [
                    'id' => $usuario->id,
                    'usuario' => $usuario->usuario,
                    'email' => $usuario->email,
                    'rol_id' => $usuario->rol_id,
                    'estado' => $usuario->estado,
                ],
                'token' => $token,
                'token_type' => 'Bearer',
                'code' => "success"
            ], 201);
        } else {
            return response()->json(['error' => 'Erro al crear', 'code' => "error"], 404); 
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuario = Usuario::where('estado',1)->find($id);

        if($usuario ){
            return [
                'usuario' => $usuario->usuario,
                'email' => $usuario->email,
                'rol_id' => $usuario->rol_id,
                'estado' => $usuario->estado,
            ];
        } else {
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request )
    {
        $validator = Validator::make($request->all(),[
                'id' => 'required|integer', 
                'usuario' => 'required|string|max:50',
                'email' => 'required|string|email|max:50|unique:usuarios,email'.$request->input('id'),
                'rol_id' => 'required|integer', 
            ], 
            [
                'usuario.required' => "El campo es requerio",
                'usuario.max' => "La cantidad maxima del campo  es  50",
                'email.required' => "El campo es requerido",
                'email.max' => "La cantidad maxima del campo  es  50",
                'email.unique' =>  "El email ya existe",
                'email.email' => "El email enviado no cumple con el formado de email", 
                'rol_id.required' => "El campo  es requerido",
                'id.required' => "El campo  es requerido", 
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        
        $filasActualizadas = User::where('id', $request->id)
        ->update([
            'usuario' => $request->usuario,
            'email' => $request->email, 
            'rol_id' => $request->rol_id,
            'estado' => $request->estado,
            'superadmin' =>  $request->superadmin,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $json = [
            'asunto' => 'Usuario Actualizado',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
            ],
        ];
    
        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 11,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),                    
        ]);

        if ($filasActualizadas > 0) {
            // La actualización fue exitosa
            return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]);
        } else {
            // No se encontró un usuario con el ID proporcionado
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $filasActualizadas = User::where('id', $request->id)
        ->update([ 
            'estado' => 0,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $json = [
            'asunto' => 'Usuario Eliminar',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
            ],
        ];
    
        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 11,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,   
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),                  
        ]);


        if ($filasActualizadas > 0) {
            // La actualización fue exitosa
            return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]);
        } else {
            // No se encontró un usuario con el ID proporcionado
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }
    }

    public function edit($id) {
        $usuario = Usuario::where('estado',1)->find($id);

        $roles = Rol::where('estado',1)
        ->get(); 

        if($usuario ){ 
            return [
                'roles' => $roles, 
                'usuario' => $usuario->usuario,
                'email' => $usuario->email,
                'rol_id' => $usuario->rol_id,
                'estado' => $usuario->estado,
            ];
            
        } else {
            Log::debug("casd");
            return [
                'roles' => $roles,  
            ];
           // return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        } 
    }


}
