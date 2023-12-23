<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Permiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);

        $query = Permiso::where('estado',1)->orderBy('nombre', 'asc');

        return $per_page? $query->paginate($per_page) : $query->get();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'nombre' => 'required|string|max:50|unique:permisos',
                'codigo' => 'required|string|max:100', 
                'id_padre' => 'integer',
            ], 
            [
                'nombre.required' => "El campo es requerio",
                'nombre.max' => "La cantidad maxima del campo es 50",
                'nombre.unique' =>  "El nombre ya existe",
                'codigo.required' => "El campo es requerido",
                'codigo.max' => "La cantidad maxima del campo es 100", 
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $permiso = Permiso::create([
            'nombre' => $request->nombre,
            'codigo' => $request->codigo,
            'id_padre'  => empty($request->id_padre)?0:$request->id_padre,
        ]);

        $json = [
            'asunto' => 'Permiso Creado',
            'adjunto' => [
                'respuesta' =>!empty($permiso),
                'id' => $permiso->id,
            ],
        ];

        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 7,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,      
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),               
        ]);

        if($permiso){
            return response()
            ->json([
                'permiso' => $permiso,
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
        $permiso = Permiso::where('estado',1)->find($id);

        if(!$permiso){
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }

        return $permiso;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nombre' => 'required|string|max:50|unique:permisos,nombre'.$request->input('id'),
            'id_padre' => 'integer',
        ], 
        [
            'nombre.required' => "El campo es requerio",
            'nombre.max' => "La cantidad maxima del campo es 50",
            'nombre.unique' =>  "El nombre ya existe",
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        if($request->id_padre){
            $update =  [
                'nombre' => $request->nombre,
                'id_padre'  => empty($request->id_padre)?0:$request->id_padre,
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        } else {
            $update =  [
                'nombre' => $request->nombre,
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        }
        
        $filasActualizadas = Permiso::where('id', $request->id)
        ->update($update);

        $json = [
            'asunto' => 'Permiso Actualizar',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
                'id' => $request->id,
            ],
        ];

        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 7,
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
        $filasActualizadas = Permiso::where('id', $request->id)
        ->update([ 
            'estado' => 0,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $json = [
            'asunto' => 'Permiso Eliminar',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
                'id' => $request->id,
            ],
        ];

        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 7,
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
}
