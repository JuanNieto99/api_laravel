<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);

        $query = Hotel::where('estado',1)->orderBy('nombre', 'asc');

        return $per_page? $query->paginate($per_page) : $query->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'nombre' => 'required|string|max:50|unique:hotels',
                'direccion' => 'required|string', 
                'ciudad_id' => 'required|integer',
                'contacto' => 'required|string', 
                'contacto_telefono' => 'required|string',
                'contacto_cargo' => 'required|string', 
                'telefono' => 'required|string',
                'nit' => 'required|string',
                'razon_social' => 'required|string',
                'cantidad_habitaciones' => 'required|integer',
                'email' => 'required|string|email|max:50|unique:hotels',
                'tipo_contribuyente' => 'required|integer',
                'usuario_id'  => 'required|integer',
            ], 
            [
                'nombre.required' => "El campo es requerio",
                'nombre.max' => "La cantidad maxima del campo es 50",
                'nombre.unique' =>  "El nombre ya existe",
                'direccion.required' => "El campo es requerio",
                'ciudad_id.required' => "El campo es requerio",
                'contacto.required' => "El campo es requerio",
                'contacto_telefono.required' => "El campo es requerio",
                'contacto_cargo.required' => "El campo es requerio",
                'nit.required' => "El campo es requerio",
                'telefono.required' => "El campo es requerio",
                'razon_social.required' => "El campo es requerio",
                'cantidad_habitaciones.required' => "El campo es requerio",
                'email.required' => "El campo es requerio",
                'email.max' =>  "La cantidad maxima del campo es 50",
                'tipo_contribuyente.required'=>  "El campo es requerio",
                'usuario_id.required' =>  "El campo es requerio",
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $hotel = Hotel::create([
            'nombre' => $request->nombre, 
            'direccion' => $request-> direccion,
            'ciudad_id' => $request-> ciudad_id,
            'contacto' => $request-> contacto,
            'contacto_telefono' => $request-> contacto_telefono,
            'contacto_cargo' => $request->contacto_cargo,
            'telefono' => $request->telefono,
            'nit' =>  $request->nit,
            'razon_social' => $request->razon_social,
            'cantidad_habitaciones' =>  $request->cantidad_habitaciones,
            'email' => $request->email,
            'tipo_contribuyente' => $request->tipo_contribuyente,
            'usuario_id' => $request->usuario_id,
            'estado' => '1',
        ]); 

        if($hotel){
            return response()
            ->json([
                'hotel' => $hotel,
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
        $permiso = Hotel::where('estado',1)->find($id);

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
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:50|unique:hotels,nombre,' . $request->input('id'),
            'direccion' => 'required|string',
            'ciudad_id' => 'required|integer',
            'contacto' => 'required|string',
            'contacto_telefono' => 'required|string',
            'contacto_cargo' => 'required|string',
            'telefono' => 'required|string',
            'nit' => 'required|string',
            'razon_social' => 'required|string',
            'cantidad_habitaciones' => 'required|integer',
            'email' => 'required|string|email|max:50|unique:hotels,email,' . $request->input('id'),
            'tipo_contribuyente' => 'required|integer',
            'usuario_id' => 'required|integer',
            'id' => 'required|integer',
        ], [
            'nombre.required' => "El campo es requerido",
            'nombre.max' => "La cantidad máxima del campo es 50",
            'nombre.unique' => "El nombre ya existe",
            'direccion.required' => "El campo es requerido",
            'ciudad_id.required' => "El campo es requerido",
            'contacto.required' => "El campo es requerido",
            'contacto_telefono.required' => "El campo es requerido",
            'contacto_cargo.required' => "El campo es requerido",
            'nit.required' => "El campo es requerido",
            'telefono.required' => "El campo es requerido",
            'razon_social.required' => "El campo es requerido",
            'cantidad_habitaciones.required' => "El campo es requerido",
            'email.required' => "El campo es requerido",
            'email.max' => "La cantidad máxima del campo es 50",
            'tipo_contribuyente.required' => "El campo es requerido",
            'usuario_id.required' => "El campo es requerido",
            'id.required' => "El campo es requerido",
        ]);
        

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $filasActualizadas = Hotel::where('id', $request->id)
        ->update([
            'nombre' => $request->nombre, 
            'direccion' => $request-> direccion,
            'ciudad_id' => $request-> ciudad_id,
            'contacto' => $request-> contacto,
            'contacto_telefono' => $request-> contacto_telefono,
            'contacto_cargo' => $request->contacto_cargo,
            'telefono' => $request->telefono,
            'nit' =>  $request->nit,
            'razon_social' => $request->razon_social,
            'cantidad_habitaciones' =>  $request->cantidad_habitaciones,
            'email' => $request->email,
            'tipo_contribuyente' => $request->tipo_contribuyente,
            'usuario_id' => $request->usuario_id, 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]); 
        
        if ($filasActualizadas > 0) {
            return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]);
        } else {
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $filasActualizadas = Hotel::where('id', $request->id)
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
