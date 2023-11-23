<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;
class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);

        $query = Productos::where('estado',1)->orderBy('nombre', 'asc');

        return $per_page? $query->paginate($per_page) : $query->get();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'nombre' => 'required|string|max:50',
                'descripcion' => 'required|string|max:200', 
                'imagen' => 'required|string',
                'precio' => 'required',
                'cantidad' => 'required|integer',
                'estado' => 'required|integer',
                'inventario_id' => 'required|integer', 
            ], 
            [   'nombre.required' => "El campo es requerio",
                'nombre.max' => "La cantidad maxima del campo es 50", 
                'descripcion.required' => "El campo es requerido",
                'descripcion.max' => "La cantidad maxima del campo es 200", 
                'imagen.required' =>  "El campo es requerido",
                'precio.required' =>  "El campo es requerido",
                'cantidad.required' =>  "El campo es requerido",
                'estado.required' =>  "El campo es requerido",
                'inventario_id.required' =>  "El campo es requerido",
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $permiso = Productos::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'precio' => $request->precio,
            'cantidad' => $request->cantidad,
            'estado' => $request->estado,
            'inventario_id' => $request->inventario_id,
        ]);

        if($permiso){
            return response()
            ->json([
                'producto' => $permiso,
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
        $productos = Productos::where('estado',1)->find($id);

        if(!$productos){
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }

        return $productos;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nombre' => 'required|string|max:50',
            'descripcion' => 'required|string|max:200', 
            'imagen' => 'required|string',
            'precio' => 'required',
            'cantidad' => 'required|integer',
            'estado' => 'required|integer',
            'inventario_id' => 'required|integer', 
            'id' => 'required|integer', 
        ], 
        [   'nombre.required' => "El campo es requerio",
            'nombre.max' => "La cantidad maxima del campo es 50", 
            'descripcion.required' => "El campo es requerido",
            'descripcion.max' => "La cantidad maxima del campo es 200", 
            'imagen.required' =>  "El campo es requerido",
            'precio.required' =>  "El campo es requerido",
            'cantidad.required' =>  "El campo es requerido",
            'estado.required' =>  "El campo es requerido",
            'inventario_id.required' =>  "El campo es requerido",
            'nombre.id' => "El campo es requerio", 
        ]    
    );
        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $filasActualizadas = Productos::where('id', $request->id)
        ->update(
            [
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'precio' => $request->precio,
            'cantidad' => $request->cantidad,
            'estado' => $request->estado,
            'inventario_id' => $request->inventario_id, 
            ]
        );


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
        $filasActualizadas = Productos::where('id', $request->id)
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
