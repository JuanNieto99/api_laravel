<?php

namespace App\Http\Controllers;

use App\Models\DetalleHabitacion;
use App\Models\Habitacion;
use App\Models\Historial;
use App\Models\TiposHabitaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    { 
        $per_page = $request->query('per_page', 1);

        $query = Habitacion::with(['detalle',
        'hotel'=> function ($query) {
            $query->select('id','nombre');
        },
        'tipoHabitacion'=> function ($query) {
            $query->select('id','nombre');
        },
        'usuario'=> function ($query) {
            $query->select('id','usuario');
        },
        ])->where('estado','!=',0)->orderBy('nombre', 'asc');

        return $per_page? $query->paginate($per_page) : $query->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'nombre' => 'required|string|max:50|unique:habitacions',
                'descripcion' => 'required|string', 
                'diseno_json' => 'required|string',
                'estado' => 'required|integer', 
                'tipo' => 'required|integer',
                'capacidad_personas' => 'required|integer', 
                'precio' => 'required',
                'usuario_modifica' => 'required',
                'piso' => 'required|integer', 
                'hotel_id'=> 'required'
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
                'piso.required' => "El campo es requerido", 
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
            'hotel_id'  =>  $request->hotel_id, 
            'piso'  => $request->piso, 
        ]);


        $json = [
            'asunto' => 'Habitacion Cear',
            'adjunto' => [
                'respuesta' => !empty($habitacion),
                'id' => $habitacion->id,
            ],
        ];

        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 1,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),                    
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
        $habitacion = Habitacion::where('estado','!=',0)->find($id);

        if(!$habitacion){
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }

        return $habitacion;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'nombre' => 'required|string|max:50|unique:habitacions,nombre,'.$request->input('id'),
                'descripcion' => 'required|string', 
                'diseno_json' => 'string',
                'estado' => 'required|integer', 
                'tipo' => 'required|integer',
                'capacidad_personas' => 'required|integer', 
                'precio' => 'required',
                'usuario_modifica' => 'required',
                'hotel_id'=> 'required',
                'piso' => 'required|integer', 
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
            'hotel_id'  =>  $request->hotel_id, 
            'piso' => $request->piso, 
        ]);


        $json = [
            'asunto' => 'Habitacion Actualizar',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
                'id' => $request->id,
            ],
        ];

        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 1,
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
        $filasActualizadas = Habitacion::where('id', $request->id)
        ->update([ 
            'estado' => 0,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $json = [
            'asunto' => 'Habitacion Eliminar',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
                'id' => $request->id,
            ],
        ];

        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 1,
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

    public function ocupar(Request $request) {
        
        $validator = Validator::make($request->all(),[ 
                'usuario_id' => 'required|integer', 
                'cliente_id' => 'required|integer', 
                'habitacion_id' => 'required|integer',  
                'hotel_id' => 'required|integer',  
            ], 
            [
                'nombre.required' => "El campo es requerio",
                'cliente_id.required' => "El campo es requerio",
                'habitacion_id.required' => "El campo es requerio", 
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $ocupar = DetalleHabitacion::create([
            'usuario_id' => $request->usuario_id,
            'cliente_id' => $request->cliente_id,
            'habitacion_id' => $request->habitacion_id, 
            'checkin' =>  Carbon::now()->format('Y-m-d H:i:s'), 
            'hotel_id' => $request->hotel_id,
        ]); 

        if($ocupar){
            $filasActualizadas = Habitacion::where('id', $request->habitacion_id)
            ->update([
                'estado' => '2',
            ]);
            Log::debug($filasActualizadas);
            if($filasActualizadas) {
                return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]); 
            } else {
                return response()->json(['error' => 'No se completo correctamente la accion', 'code' => "error"], 404);
            }

        } else {
            return response()->json(['error' => 'No se completo correctamente la accion', 'code' => "error"], 404);

        }

    }

    public function desocupar(Request $request) {
        
        $validator = Validator::make($request->all(),[ 
                'id' => 'required|integer', 
                'id_detalle' =>  'required|integer', 
            ], 
            [
                'id.required' => "El campo es requerio", 
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $filasActualizadas = Habitacion::where('id', $request->id)
        ->update([
            'estado' => '1',
        ]); 

        
        $filasActualizadas = DetalleHabitacion::where('id', $request->id_detalle)
        ->update([
            'checkout' =>  Carbon::now()->format('Y-m-d H:i:s'), 
        ]); 

        if($filasActualizadas) {
            return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]); 
        } else {
            return response()->json(['error' => 'No se completo correctamente la accion', 'code' => "error"], 404);
        } 

    }

    public function edit($id) {
        $habitacion = Habitacion::where('estado','!=',0)->find($id);
        $pisos = range(1, 99);

        $tipo_habitacion = TiposHabitaciones::select('id','nombre')->Where('estado',1)->get();

        if(!$habitacion){ 

            return [ 
                'tipo_habitacion' => $tipo_habitacion,
                'pisos' =>  $pisos,
            ];
            
        } 

        return [
            'habitacion' => $habitacion,
            'tipo_habitacion' => $tipo_habitacion,
            'pisos' =>  $pisos,
        ];
    }


}
