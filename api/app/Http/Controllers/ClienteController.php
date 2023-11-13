<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;
use GuzzleHttp\Client;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);

        $query = Cliente::where('estado',1)->orderBy('nombre', 'asc');

        return $per_page? $query->paginate($per_page) : $query->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nombre' => 'required|string|max:100|unique:permisos',
            'apellidos' => 'required|string|max:50', 
            'estado' => 'required|integer', 
            'tipo' => 'required|integer',
            'ciudad_id' => 'required|integer', 
            'tipo_documento' => 'required',
            'numero_documento' => 'required|string|max:15',
            'genero' => 'required|integer',
            'estado_civil' => 'required|integer',
            'barrio_residencia' => 'required|string|max:50',
            'fecha_nacimiento' => 'required|string', 
            'telefono' => 'required|string|max:30', 
            'celular' => 'required|string|max:30', 
            'nivel_studio' => 'required|integer', 
            'correo' => 'required|string|max:50', 
            'observacion' => 'required|string|max:200', 
            'usuario_create_id' => 'required|integer',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $Cliente = Cliente::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'estado' => $request->estado, 
            'tipo' => $request->tipo,
            'ciudad_id' => $request->ciudad_id,
            'tipo_documento' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento, 
            'genero' => $request->genero, 
            'estado_civil' => $request->estado_civil, 
            'barrio_residencia' => $request->barrio_residencia, 
            'fecha_nacimiento' => $request->fecha_nacimiento, 
            'telefono' => $request->telefono, 
            'celular' => $request->celular, 
            'nivel_studio' => $request->nivel_studio, 
            'correo' => $request->correo, 
            'observacion' => $request->observacion, 
            'usuario_create_id' => $request->observacion, 
        ]);

        if($Cliente){
            return response()
            ->json([
                'cliente' => $Cliente,
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
        $permiso = Cliente::where('estado',1)->find($id);

        if(!$permiso){
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }

        return $permiso;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nombre' => 'required|string|max:100|unique:permisos',
            'apellidos' => 'required|string|max:50', 
            'estado' => 'required|integer', 
            'tipo' => 'required|integer',
            'ciudad_id' => 'required|integer', 
            'tipo_documento' => 'required',
            'numero_documento' => 'required|string|max:15',
            'genero' => 'required|integer',
            'estado_civil' => 'required|integer',
            'barrio_residencia' => 'required|string|max:50',
            'fecha_nacimiento' => 'required|string', 
            'telefono' => 'required|string|max:30', 
            'celular' => 'required|string|max:30', 
            'nivel_studio' => 'required|integer', 
            'correo' => 'required|string|max:50', 
            'observacion' => 'required|string|max:200', 
            'usuario_update_id' => 'required|integer',
            'id'  => 'required|integer',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $filasActualizadas = Cliente::where('id', $request->id)
        ->update([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'estado' => $request->estado, 
            'tipo' => $request->tipo,
            'ciudad_id' => $request->ciudad_id,
            'tipo_documento' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento, 
            'genero' => $request->genero, 
            'estado_civil' => $request->estado_civil, 
            'barrio_residencia' => $request->barrio_residencia, 
            'fecha_nacimiento' => $request->fecha_nacimiento, 
            'telefono' => $request->telefono, 
            'celular' => $request->celular, 
            'nivel_studio' => $request->nivel_studio, 
            'correo' => $request->correo, 
            'observacion' => $request->observacion, 
            'usuario_update_id' => $request->usuario_update_id, 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
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
        $filasActualizadas = Cliente::where('id', $request->id)
        ->update([ 
            'estado' => 0,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        if ($filasActualizadas > 0) {
            // La actualización fue exitosa
            return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]);
        } else {
            // No se encontró un usuario con el ID proporcionado
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }
    }
}
