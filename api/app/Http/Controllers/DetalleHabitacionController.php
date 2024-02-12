<?php

namespace App\Http\Controllers;

use App\Models\Abono;
use App\Models\DetalleHabitacion;
use App\Models\DetalleHabitacionReserva;
use App\Models\Habitacion;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;   
use Illuminate\Support\Facades\DB; // Asegúrate de importar la clase DB desde el espacio de nombres correcto

class DetalleHabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);
        $search = $request->query('search',false);

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
        ->join('habitacions', 'habitacions.id', 'detalle_habitacions.habitacion_id')
        ->join('clientes', 'clientes.id', 'detalle_habitacions.cliente_id')
        ->join('usuario', 'usuario.id', 'detalle_habitacions.usuario_id')
        ->join('hotel', 'hotel.id', 'detalle_habitacions.usuario_id')
        ->select('detalle_habitacions.*')
        ->orderBy('detalle_habitacions.id', 'asc');


        if(!empty($search) && $search!=null){
            
            $query->where(function ($query) use ($search) { 
                $query->where('habitacions.nombre', 'like', "%{$search}%");   
                $query->orWhere('clientes.nombre', 'like', "%{$search}%");  
                $query->orWhere('usuario.nombre', 'like', "%{$search}%");  
                $query->orWhere('hotel.nombre', 'like', "%{$search}%");  
                $query->orWhere('clientes.apellidos', 'like', "%{$search}%");  
            }); 
            
        }

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
            $detalle = DetalleHabitacion::with([
                'habitacion' => function ($query) use ($hotel_id) {
                    $query->where('hotel_id', $hotel_id)
                    ->select('id', 'nombre');
                },
                'cliente' => function ($query) {
                    $query->select('id', 'nombres', 'apellidos');
                },
            ])
            ->select('detalle_habitacions.*' )
            ->join('estado_habitacion', 'estado_habitacion.habitacion_detalle_id', 'detalle_habitacions.id')
            ->where('estado_habitacion.estado_id', 5)  
            ->where('detalle_habitacions.fecha_inicio', '>=', $hoy->subDays($dias_restar))
            ->get();
        
            
            return [
                'habitaciones' =>  $detalle
            ];
        }

    }

    function getDetalleHabitacion($id_detalle_habitacion) {
        
        $detalle_habitacion =  DetalleHabitacion::with(['habitacion' => function ($query) {
            $query->select('id', 'nombre' );
        },'cliente'=> function ($query) {
            $query->select('id', 'nombres', 'apellidos');
        }, 'estadoHabitacion.estado'=> function ($query) {
            $query->select('id', 'nombre');
        }])
        ->where('id', $id_detalle_habitacion)
        ->first();

        $tarifas = DetalleHabitacionReserva::with(['tarifa'=> function ($query) {
            $query->select('id', 'nombre' );
        }])
        ->where('reserva_detalle_id', $id_detalle_habitacion)
        ->where('tipo', 3)->get();

        $abonos = Abono::with(['metodoPago' => function ($query) {
            $query->select('id', 'nombre' );
        }])->where('habitacion_detalle_id',  $id_detalle_habitacion)->get();
        
        return [
            'detalle_habitacion' =>  $detalle_habitacion,
            'tarifas' => $tarifas,
            'abonos' => $abonos,
        ];
    }

}
