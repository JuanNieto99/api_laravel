<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Permiso;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;
use App\Models\RolPermisoDetalle;
use Illuminate\Support\Facades\Log;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 2);

        $query = Rol::where('estado',1)->orderBy('nombre', 'asc');

		return $per_page? $query->paginate($per_page) : $query->get();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'nombre' => 'required|string|max:50|unique:rols',
                'descripcion' => 'required|string|max:100', 
                'estado' => 'required|integer',
            ], 
            [
                'nombre.required' => "El campo es requerio",
                'nombre.max' => "La cantidad maxima del campo es 50",
                'nombre.unique' =>  "El nombre ya existe",
                'descripcion.required' => "El campo es requerido",
                'descripcion.max' => "La cantidad maxima del campo es 100",
                'estado.required' => "El campo es requerido",
                
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $rol = Rol::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado, 
        ]);


        $json = [
            'asunto' => 'Rol Creado',
            'adjunto' => [
                'respuesta' => !empty($rol;,
            ],
        ];
    
        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 10,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,                
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),     
        ]);

        if($rol){

            if($request->permiso){
                
                $permiso_for = explode(',',$request->permiso);
                
                $permisos = collect($permiso_for)->map(function ($value) use ($rol) {
                    return new RolPermisoDetalle([
                        'rol_id' => $rol->id,
                        'permiso_id' => $value,
                    ]);
                });
                
                RolPermisoDetalle::insert($permisos->toArray());

            }

            return response()
            ->json([
                'rol' => $rol,
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
        $rol = Rol::where('estado',1)->find($id);

        if(!$rol){
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }
        
        return $rol;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'id' => 'required|integer', 
                'nombre' => 'required|string|max:50|unique:rols,nombre'.$request->input('id'),
                'descripcion' => 'required|string|max:100', 
                'estado' => 'required|integer',
            ], 
            [
                'id.required' => "El campo es requerio",
                'nombre.required' => "El campo es requerio",
                'nombre.max' => "La cantidad maxima del campo es 50",
                'nombre.unique' =>  "El nombre ya existe",
                'descripcion.required' => "El campo es requerido",
                'descripcion.max' => "La cantidad maxima del campo es 100",
                'estado.required' => "El campo es requerido",
                
            ]    
        );


        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $filasActualizadas = Rol::where('id', $request->id)
        ->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado, 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $json = [
            'asunto' => 'Rol Actualizado',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
            ],
        ];
    
        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 10,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,        
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),             
        ]);

        if ($filasActualizadas > 0) {

            if($request->permiso){
                
                $permiso_for = explode(',',$request->permiso);

                $permisos = collect($permiso_for)->map(function ($value) use ($request) {
                    return new RolPermisoDetalle([
                        'rol_id' => $request->id,
                        'permiso_id' => $value,
                    ]);
                });
                
                RolPermisoDetalle::where('rol_id', $request->id)->delete();
                RolPermisoDetalle::insert($permisos->toArray()); 

            }
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
        $filasActualizadas = Rol::where('id', $request->id)
        ->update([ 
            'estado' => 0,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        
        $json = [
            'asunto' => 'Rol ELiminado',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
            ],
        ];
    
        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 10,
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

        $rol = Rol::where('estado',1)->find($id);

        if(!$rol){
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        } 
    
        $permisos = Permiso::select('id','codigo', 'nombre','id_padre')->where('estado','2')->get();
        
        return [
            'permisos' => $permisos,
            'rol' => $rol,
        ];
    }
}
