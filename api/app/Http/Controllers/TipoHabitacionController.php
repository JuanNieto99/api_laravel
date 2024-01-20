<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\TiposHabitaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;

class TipoHabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 2);
        $search = $request->query('search',false);

        $query = TiposHabitaciones::with(['hotel'=>function($query){
            $query->select('id','nombre');
        }])
        ->where('estado',1)->orderBy('nombre', 'asc');

        $query->where(function ($query) use ($search) {
            $query->where('tipo_habitacion.nombre', 'like', "%{$search}%");         
        });
		return $per_page? $query->paginate($per_page) : $query->get();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'nombre' => 'required|string|max:50',
                'hotel_id' => 'required|integer',
                'estado' => 'required|integer',
            ], 
            [
                'nombre.required' => "El campo es requerio",
                'nombre.max' => "La cantidad maxima del campo es 50",
                'hotel_id.required' => "El campo es requerido",
                'estado.required' => "El campo es requerido",
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $tipoHabitacion = TiposHabitaciones::insert(
            [
                'nombre' => $request->nombre,
                'hotel_id' => $request->hotel_id,
                'estado' => $request->estado,
            ]
        );

        if($tipoHabitacion){
            return response()
            ->json([
                'tipoHabitacion' => $tipoHabitacion,
                'code' => "success"
            ], 201);
        } else {
            return response()->json(['error' => 'Erro al crear', 'code' => "error"], 404); 
        } 
    }

    public function show($id)
    {
        $tiposHabitaciones = TiposHabitaciones::where('estado',1)->find($id);

        if(!$tiposHabitaciones){
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }
        
        return $tiposHabitaciones;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tiposHabitaciones = TiposHabitaciones::where('estado',1)->find($id);
        $hotel = Hotel::select('nombre','id')->where('estado','1')->get();

        if(!$tiposHabitaciones){
            return [ 
                'hotel' => $hotel,
            ];
        }
        
        return [
            'hotel' => $hotel,
            'tiposHabitaciones' => $tiposHabitaciones,
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'nombre' => 'required|string|max:50',
                'hotel_id' => 'required|integer',
                'estado' => 'required|integer',
                'id' => 'required|integer',
            ], 
            [
                'nombre.required' => "El campo es requerio",
                'nombre.max' => "La cantidad maxima del campo es 50",
                'hotel_id.required' => "El campo es requerido",
                'estado.required' => "El campo es requerido",
                'id.required' => "El campo es requerido",
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        
        $filasActualizadas = TiposHabitaciones::where('id', $request->id)
        ->update([
            'nombre' => $request->nombre,
            'hotel_id' => $request->hotel_id,
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
        $filasActualizadas = TiposHabitaciones::where('id', $request->id)
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
