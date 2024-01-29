<?php

namespace App\Http\Controllers;

use App\Models\Tarifa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;

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
                'valor' => 'required|integer', 
                'hotel_id' => 'required|integer', 
                'tipo_habitacion_id' => 'required|integer',
                'cantidad' => 'required|integer', 
                'tipo' => 'required|integer',  
                'usuario_create_id' => 'required|integer',   
            ] 
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        } 
    }
}
