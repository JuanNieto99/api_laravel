<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Hotel;
use App\Models\Tarifa;
use App\Models\TiposHabitaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class TarifaController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);
        $search = $request->query('search',false);

        $query = Tarifa::with([ 
        'hotel'=> function ($query) {
            $query->select('id','nombre');
        },
        'tipoHabitacion'=> function ($query) {
            $query->select('id','nombre');
        }, 
        ])
        ->join('hotels', 'hotels.id', 'tarifas.hotel_id')
        ->join('tipo_habitacion', 'tipo_habitacion.id', 'tarifas.tipo_habitacion_id')
        ->select('tarifas.*')
        ->where('tarifas.estado','!=',0)->orderBy('tarifas.nombre', 'asc');

        if(!empty($search) && $search!=null){
            
            $query->where(function ($query) use ($search) {  
                $query->Where('tarifas.nombre', 'like', "%{$search}%");  
                $query->orWhere('hotels.nombre', 'like', "%{$search}%");  
                $query->orWhere('tipo_habitacion.nombre', 'like', "%{$search}%");  
            });
            
        }

        return $per_page? $query->paginate($per_page) : $query->get();
    }

    function create(Request $request) {
        $validator = Validator::make($request->all(),[
                'nombre' => 'required|string|max:50',
                'valor' => 'required', 
                'hotel_id' => 'required|integer', 
                'tipo_habitacion_id' => 'required|integer',
                'cantidad' => 'required|integer', 
                'tipo' => 'required|integer', 
                'descripcion' => 'required|string',
            ] 
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        } 
        $usuario = auth()->user(); 

        $data = Tarifa::create([
            'nombre' => $request->nombre,
            'valor' => $request->valor,
            'hotel_id' => $request->hotel_id,
            'tipo_habitacion_id' => $request->tipo_habitacion_id,
            'cantidad' => $request->cantidad,
            'tipo' => $request->tipo,
            'usuario_create_id' => $usuario->id,
            'descripcion' => $request->descripcion,
            'estado' => 1, 
        ]);

        $json = [
            'asunto' => 'Crear Tarifa',
            'adjunto' => [
                'respuesta' => !empty($data),
                'id' => $data->id,
            ],
        ];

        
        Historial::insert([
            'tipo' => 14,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,                
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),     
        ]);

        if($data ){

            return response()
            ->json([
                'rol' => $data,
                'code' => "success"
            ], 201);
        } else {

            return response()->json(['error' => 'Erro al crear', 'code' => "error"], 404); 
        } 
        
    }

    function edit($id) {
        $tipo_habitacion = TiposHabitaciones::select('nombre', 'id')->get();
        $hotel = Hotel::select('nombre', 'id')->get();

        if($id){
            $tarifa = Tarifa::select('nombre', 'id', 'cantidad', 'valor', 'descripcion', 'hotel_id', 'tipo_habitacion_id', 'tipo')
            ->where('id', $id)
            ->first();

            return [
                'tipo_habitacion' => $tipo_habitacion,
                'hotel' => $hotel,
                'tarifa' => $tarifa,
            ];
        }



        return [
            'tipo_habitacion' => $tipo_habitacion,
            'hotel' => $hotel, 
        ];

    }

    function update(Request $request){

        $validator = Validator::make($request->all(),[
                'nombre' => 'required|string|max:50',
                'valor' => 'required', 
                'hotel_id' => 'required|integer', 
                'tipo_habitacion_id' => 'required|integer',
                'cantidad' => 'required|integer', 
                'tipo' => 'required|integer',   
                'id' => 'required|integer',   
            ] 
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        } 
        $usuario = auth()->user();

        $data = Tarifa::where('id', $request->id )
        ->update([
            'nombre' => $request->nombre,
            'valor' => $request->valor,
            'hotel_id' => $request->hotel_id,
            'tipo_habitacion_id' => $request->tipo_habitacion_id,
            'cantidad' => $request->cantidad,
            'tipo' => $request->tipo,
            'usuario_create_id' =>  $usuario->id,
        ]);
        
        $json = [
            'asunto' => 'Tarifa Actualizado',
            'adjunto' => [
                'respuesta' => !empty($data),
                'id' => $request->id,
            ],
        ];
    
        
        Historial::insert([
            'tipo' => 14,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,        
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),             
        ]);

        if($data){
            return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]); 
        } else {
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }
    }

    function destroy(Request $request) {
        $filasActualizadas = Tarifa::where('id', $request->id)
        ->update([ 
            'estado' => 0,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        
        $json = [
            'asunto' => 'Secuencia externa eliminada',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
                'id' => $request->id
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
}
