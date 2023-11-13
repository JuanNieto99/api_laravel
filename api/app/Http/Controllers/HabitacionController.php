<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    { 
        $per_page = $request->query('per_page', 1);

        $query = Habitacion::where('estado',1)->orderBy('nombre', 'asc');

        return $per_page? $query->paginate($per_page) : $query->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'nombre' => 'required|string|max:50|unique:permisos',
                'descripcion' => 'required|string', 
                'diseno_json' => 'string',
                'estado' => 'required|integer', 
                'tipo' => 'required|integer',
                'capacidad_personas' => 'required|integer', 
                'precio' => 'required',
                'usuario_modifica' => 'required'
            ], 
            [
                'nombre.required' => "El campo es requerio",
                'nombre.max' => "La cantidad maxima del campo es 50",
                'nombre.unique' =>  "El nombre ya existe",
                'descripcion.required' => "El campo es requerido",
                'diseno_json.required' => "El campo es requerido", 
                'estado.required' => "El campo es requerido", 
                'tipo.required' => "El campo es requerido", 
                'capacidad_personas.required'  => "El campo es requerido", 
                'precio.required'  => "El campo es requerido", 
                'usuario_modifica.required' => "El campo es requerido", 
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $habitacion = Habitacion::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'diseno_json'  =>  $request->diseno_json,
            'estado'  =>  $request->estado,
            'tipo'  =>  $request->tipo,
            'capacidad_personas'  =>  $request->capacidad_personas,
            'precio'  =>  $request->precio,
            'usuario_modifica'  =>  $request->usuario_modifica, 
        ]);

        if($habitacion){
            return response()
            ->json([
                'habitacion' => $habitacion,
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
        $permiso = Habitacion::where('estado',1)->find($id);

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
                'nombre' => 'required|string|max:50|unique:permisos',
                'descripcion' => 'required|string', 
                'diseno_json' => 'string',
                'estado' => 'required|integer', 
                'tipo' => 'required|integer',
                'capacidad_personas' => 'required|integer', 
                'precio' => 'required',
                'usuario_modifica' => 'required'
            ], 
            [
                'nombre.required' => "El campo es requerio",
                'nombre.max' => "La cantidad maxima del campo es 50",
                'nombre.unique' =>  "El nombre ya existe",
                'descripcion.required' => "El campo es requerido",
                'diseno_json.required' => "El campo es requerido", 
                'estado.required' => "El campo es requerido", 
                'tipo.required' => "El campo es requerido", 
                'capacidad_personas.required'  => "El campo es requerido", 
                'precio.required'  => "El campo es requerido", 
                'usuario_modifica.required' => "El campo es requerido", 
            ]    
        );


        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $filasActualizadas = Habitacion::where('id', $request->id)
        ->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'diseno_json'  =>  $request->diseno_json,
            'estado'  =>  $request->estado,
            'tipo'  =>  $request->tipo,
            'capacidad_personas'  =>  $request->capacidad_personas,
            'precio'  =>  $request->precio,
            'usuario_modifica'  =>  $request->usuario_modifica, 
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
        $filasActualizadas = Habitacion::where('id', $request->id)
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
