<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 2);

        $query = Rol::orderBy('nombre', 'asc');

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

        if($rol){
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
        return Rol::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'id' => 'required|integer', 
                'nombre' => 'required|string|max:50|unique:rols',
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
        $filasActualizadas = Rol::where('id', $request->id)
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
