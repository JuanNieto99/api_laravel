<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Validator;   
use App\Models\SecuenciaInterna;

class SecuenciaInternaController extends Controller
{
    
    public function index(Request $request) {
        
        $per_page = $request->query('per_page', 1);

        $query = SecuenciaInterna::where('estado',1)->orderBy('nombre', 'asc');

        return $per_page? $query->paginate($per_page) : $query->get();
    }

    public function create(Request $request) { 
        
        $validator = Validator::make($request->all(),[
            'hotel_id' => 'required|integer',
            'descripcion_secuencia' => 'required|string', 
            'secuensia_incial' => 'required|integer',
            'secuensia_actual' => 'required|integer', 
        ]);    

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $usuario = auth()->user(); 

        $creado = SecuenciaInterna::create(
            [
                'hotel_id' => $request->hotel_id,
                'descripcion_secuencia' => $request->descripcion_secuencia, 
                'secuensia_actual' => $request->secuensia_actual,
                'secuensia_incial' => $request->secuensia_incial,
                'usuario_id_crea' => $usuario->id, 
                'estado' => 1,
            ]
        ); 

        $json = [
            'asunto' => 'creacion secuencia interna',
            'adjunto' => [
                'respuesta' => !empty($creado),
                'id' => $creado->id,
            ],
        ];

        Historial::insert([
            'tipo' => 13,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,   
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),     
        ]);

        if($creado){
            return response()->json(['mensaje' => 'Creacion exitosa', 'code' => "success"]);

        } else {

            return response()->json(['error' => 'Creacion no exitosa', 'code' => "error"], 404);
        }

    }


    public function edit($id) {
        $hotel = Hotel::select('nombre','id')->where('estado','1')->get();

        $secuencia_interna = SecuenciaInterna::where('id', $id)
        ->where('estado', 1)
        ->first();
        
        if($secuencia_interna){
            return [
                'hotel' => $hotel,
                'secuencia_interna' => $secuencia_interna,
            ];
        }

        return [
            'hotel' => $hotel,
        ];
    }

    public function show($id) {
        $secuencia = SecuenciaInterna::where('id', $id)
        ->where('estado', 1)
        ->first();
        
        if($secuencia){
            return [ 
                'secuencia_interna' => $secuencia,
            ];
        } else {
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);

        }
    }


    public function update(Request $request) { 

        $validator = Validator::make($request->all(),[
            'hotel_id' => 'required|integer',
            'descripcion_secuencia' => 'required|string', 
            'secuensia_incial' => 'required|integer',
            'secuencia_final' => 'required|integer', 
            'id' => 'required|integer', 
        ]);    

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $usuario = auth()->user();

        $update = SecuenciaInterna::where('id',$request->id)
        ->update(
            [
                'hotel_id' =>  $request->hotel_id,
                'prefijo' =>  $request->prefijo,
                'fecha_inicio' =>  $request->fecha_inicio,
                'fecha_final' => $request->fecha_final,
                'secuensia_incial' => $request->secuensia_incial,
                'secuencia_final' => $request->secuencia_final,
                'usuario_id_actualiza' => $usuario->id,
            ]
        );

        $json = [
            'asunto' => 'Secuencia externa actualizada',
            'adjunto' => [
                'respuesta' => !empty($update),
                'id' => $request->id,
            ],
        ];

        Historial::insert([
            'tipo' => 13,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,   
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),                  
        ]);

        if($update){
            return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]);
        } else {
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        } 
    }


    public function destroy (Request $request) { 
        
        $filasActualizadas = SecuenciaInterna::where('id', $request->id)
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
