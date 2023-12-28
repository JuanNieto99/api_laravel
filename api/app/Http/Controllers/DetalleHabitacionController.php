<?php

namespace App\Http\Controllers;

use App\Models\DetalleHabitacion;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;   

class DetalleHabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);

        $query = DetalleHabitacion::with([
        'habitacion' => function ($query)  {
            $query->select('id', 'nombre');
        },
        'cliente' => function ($query)  {
            $query->select('id', 'nombres', 'apellidos');
        },
        'usuario' => function ($query)  {
            $query->select('id', 'usuario');
        },
        'hotel' => function ($query)  {
            $query->select('id', 'nombre');
        },
        ])
        ->orderBy('id', 'asc');

        return $per_page? $query->paginate($per_page) : $query->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $validator = Validator::make($request->all(),[  
            'fecha_inicio' => 'required|string',
            'fecha_salida' => 'required|string',
            'cliente_id' => 'required|integer',
            'habitacion_id' => 'required|integer',
            'hotel_id' => 'required|integer',
        ]   
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $usuario = auth()->user();
        
        DetalleHabitacion::create(
        [
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_salida' => $request->fecha_salida,
            'cliente_id' => $request->cliente_id,
            'habitacion_id' => $request->habitacion_id,
            'usuario_id' => $usuario->id,
            'hotel_id' => $request->hotel_id,
        ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(detalleHabitacion $detalleHabitacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(detalleHabitacion $detalleHabitacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, detalleHabitacion $detalleHabitacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(detalleHabitacion $detalleHabitacion)
    {
        //
    }

    public function getReservasCalendario(Request $request)
    {
        $hotel_id = $request->hotel_id;
        if($hotel_id){
            $hoy = Carbon::now(); 
            $dias_restar = 20; 
            $detalle = DetalleHabitacion::with(['habitacion'=> function ($query) use ($hotel_id) {
                $query->where('hotel_id',$hotel_id);
            }])
            ->where('estado',1) 
            ->where('fecha_inicio','>=',$hoy->subDays($dias_restar));
            
            return [
                'habitaciones' =>  $detalle
            ];
        }

    }

}
