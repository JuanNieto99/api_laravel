<?php

namespace App\Http\Controllers;

use App\Models\Abono;
use App\Models\Historial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon; 

class ControllerAbonos extends Controller
{
    function create(Request $request){

        $validator = Validator::make($request->all(),[  
                'hotel_id' => 'required|integer', 
                'habitacion_id' => 'required|integer',
                'cliente_id' => 'required|integer',
                'valor' => 'required',               
            ]           
        ); 

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $usuario = auth()->user(); 

        $data = [
            'hotel_id' => $request->hotel_id,
            'habitacion_id' => $request->habitacion_id,
            'usuario_id_crea' => $usuario->id,
            'valor' => $request->valor,
            'cliente_id' => $request->cliente_id,
            'tipo_abono' => 1,
            'estado' => 1
        ];

        $respuesta = Abono::create($data);

        $json = [
            'asunto' => 'Abono Crear',
            'adjunto' => [
                'respuesta' => !empty($respuesta),
                'id' => $respuesta->id,
                'data' => json_encode($data),
            ],
        ]; 

        Historial::insert([
            'tipo' => 2,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,          
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),           
        ]);
        
        if($respuesta){
            return response()
            ->json([
                'abono' => $respuesta,
                'code' => "success"
            ], 201);
        } else {
            return response()
            ->json([
                'abono' => null,
                'code' => "error"
            ], 201);
        }

    }

    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);
        $search = $request->query('search',false);

        $query = Abono::with([ 
            'cliente'=> function ($query) {
                $query->select('id', 'nombres', 'apellidos');
            },
            'hotel'=> function ($query) {
                $query->select('id', 'nombre');
            }
        ])
        ->join('hotels', 'hotels.id', 'abonos.hotel_id')
        ->join('clientes', 'clientes.id', 'abonos.cliente_id')
        ->select('abonos.*')
        ->where('abonos.estado','!=',0)->orderBy('abonos.id', 'asc');


        if(!empty($search) && $search!=null){
            
            $query->where(function ($query) use ($search) { 
                $query->where('ciudads.nombre', 'like', "%{$search}%");   
                $query->orWhere('ciudads.codigo_dane', 'like', "%{$search}%");  
            }); 
            
        }
        return $per_page? $query->paginate($per_page) : $query->get();
    }


    public function destroy(Request $request)
    {
        $filasActualizadas = Abono::where('id', $request->id)
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
