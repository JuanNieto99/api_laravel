<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use App\Models\Cliente;
use App\Models\ControlCaja;
use App\Models\DetalleCaja;
use App\Models\Historial;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;

class CajaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);

        $query = Caja::where('estado',1)->orderBy('nombre', 'asc');

        return $per_page? $query->paginate($per_page) : $query->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'nombre' => 'required|string|max:50|unique:rols',
                'descripcion' => 'required|string|max:100', 
                'base' => 'required|numeric', 
                'estado' => 'required|integer',
                'hotel_id' => 'required|integer',
            ], 
            [
                'nombre.required' => "El campo es requerio",
                'nombre.max' => "La cantidad maxima del campo es 50", 
                'descripcion.required' => "El campo es requerido",
                'descripcion.max' => "La cantidad maxima del campo es 100",
                'estado.required' => "El campo es requerido",
                'base.required' => "El campo es requerido",
                'hotel_id.required' => "El campo es requerido",
            ]  
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $caja = Caja::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'base' => $request->base,
            'estado' => $request->estado,
            'hotel_id' => $request->hotel_id,
        ]);

        $json = [
            'asunto' => 'Caja Crear',
            'adjunto' => [
                'respuesta' => !empty($caja),
            ],
        ];

        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 12,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id, 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),                    
        ]);
        
        if($caja){
            return response()
            ->json([
                'caja' => $caja,
                'code' => "success"
            ], 201);
        } else {
            return response()->json(['error' => 'Erro al crear', 'code' => "error"], 404); 
        } 

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
    public function show($id)
    {
        $caja = Caja::where('estado',1)->find($id);

        if(!$caja){
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }

        return $caja;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $caja = Caja::where('estado',1)->find($id);

        $hotel = Hotel::select('nombre','id')->where('estado','1')->get();

        if(!$caja){
            $hotel = Hotel::select('nombre','id')->where('estado','1')->get();

            return [
                'hotel' => $hotel, 
            ];
        }

        return [
            'hotel' => $hotel,
            'caja' => $caja,
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'nombre' => 'required|string|max:50|unique:rols',
                'descripcion' => 'required|string|max:100', 
                'base' => 'required|numeric', 
                'estado' => 'required|integer',
                'hotel_id' => 'required|integer',
                'id' => 'required|integer',
            ], 
            [
                'nombre.required' => "El campo es requerio",
                'nombre.max' => "La cantidad maxima del campo es 50", 
                'descripcion.required' => "El campo es requerido",
                'descripcion.max' => "La cantidad maxima del campo es 100",
                'estado.required' => "El campo es requerido",
                'base.required' => "El campo es requerido",
                'hotel_id.required' => "El campo es requerido",
                'id.required' => "El campo es requerido",
            ]  
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        
        $filasActualizadas = Caja::where('id', $request->id)
        ->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'base' => $request->base,
            'estado' => $request->estado,
            'hotel_id' => $request->hotel_id,
        ]);

        $json = [
            'asunto' => 'Caja Actualizar',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
            ],
        ];

        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 12,
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
        $filasActualizadas = Caja::where('id', $request->id)
        ->update([ 
            'estado' => 0,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $json = [
            'asunto' => 'Caja Eliminada',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
            ],
        ];

        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 12,
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

    public function abrirCaja (Request $request) {

        $validator = Validator::make($request->all(),[ 
                'caja_id' => 'required|integer', 
                'saldo_base'  => 'required|numeric', 
                'usuario_id_abre' => 'required|integer', 
            ], 
            [
                'caja_id.required' => "El campo es requerio", 
                'saldo_base.required' => "El campo es requerio", 
                'usuario_id_abre.required' => "El campo es requerio", 
            ]  
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $usuario = auth()->user();

        $cajas_abiertas = ControlCaja::where('caja_id', $request->caja_id)
        ->where('estado', 1) 
        ->count();
        
        if( $cajas_abiertas > 0){
            return response()->json(['mensaje' => 'Solo es posible abrir una caja', 'code' => "warning"]);
        }

        $controlCaja = ControlCaja::create(
            [
                'caja_id' => $request->caja_id,
                'abrir_caja' =>  Carbon::now()->format('Y-m-d H:i:s'),
                'usuario_id_abre' => $usuario->id,
                'abrir_saldo' => $request->saldo_base,
                'estado' => 1
            ]
        ); 
        
        $json = [
            'asunto' => 'Abrir caja',
            'adjunto' => [
                'respuesta' => !empty($controlCaja),
            ],
        ];


        Historial::insert([
            'tipo' => 4,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,         
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),            
        ]); 

        if ($controlCaja) {
            // La actualización fue exitosa
            return response()->json(['mensaje' => 'Caja abierta', 'code' => "success"]);
        } else {
            return response()->json(['error' => 'Error', 'code' => "error"], 404);
        }
    }

    function cerrarCaja(Request $request) {
        $caja_id = $request->caja_id; 

        $controlCaja = ControlCaja::where('caja_id', $caja_id )
        ->where('estado', 1) 
        ->select('id','abrir_saldo')
        ->first();

        if(!$controlCaja){
            return response()->json(['mensaje' => 'No hay ninguna caja abierta', 'code' => "warning"]);
        }

        $id_control_caja = $controlCaja->id;
        $saldo_abrir =  $controlCaja->abrir_saldo;

        $detalleCaja = DetalleCaja::where('caja_control_id', $id_control_caja)
        ->selectRaw('SUM(precio) as total_precio')
        ->first();

        $detalle_caja_precio = $detalleCaja["total_precio"];

        $usuario = auth()->user();

        $updateControlCaja = ControlCaja::where('caja_id', $caja_id )
        ->where('estado', 1) 
        ->update(
            [
                'cierre_caja' => Carbon::now()->format('Y-m-d H:i:s'),
                'cierre_saldo' => $detalle_caja_precio,
                'diferencia' => $saldo_abrir - $detalle_caja_precio,
                'usuario_id_cierra' => $usuario->id,
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
                'estado' => 2,
            ]
        );  

        if($updateControlCaja){
            return response()->json(['mensaje' => 'Caja Cerrada', 'code' => "success"]);
        } 
    }

    public function registroAdicionalCaja(Request $request) {
        
        $validator = Validator::make($request->all(),[ 
                'valor' => 'required|integer', 
                'tipo'  => 'required|integer', //1 ->ingreso
                'concepto' => 'required|string',
                'caja_id' => 'required|integer',
                'metodos_pagos' => 'required|json'
            ], 
            [
                'valor.required' => "El campo es requerio", 
                'tipo.required' => "El campo es requerio", 
                'caja_id.required' => "El campo es requerio", 
                'concepto.required' => "El campo es requerio", 
                'metodos_pagos.required' => "El campo es requerio", 
            ]  
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        } 
        $medios_pagos_array =  json_decode($request->metodos_pagos, true);

        $controlCaja = ControlCaja::where('caja_id', $request->caja_id )
        ->where('estado', 1) 
        ->select('id')
        ->first();

        if(!$controlCaja){
            return response()->json(['mensaje' => 'No hay ninguna caja abierta', 'code' => "warning"]);
        }
        $medios_pagos_caja_array = []; 
        $usuario = auth()->user(); 

        foreach ($medios_pagos_array  as $key => $value) {

            $medios_pagos_caja_array[] = [
                'facturacion_id' => null,
                'metodo_pago_id' => $value['metodo_pago_id'],
                'usuario_id' => $usuario->id,
                'caja_id' => $request->caja_id,
                'caja_control_id' => $controlCaja->id,
                'precio' => $value['precio'],
                'tipo' => $request->tipo,
                'estado' => 1,  
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ];
        } 
            
        DetalleCaja::insert($medios_pagos_caja_array);  

        return response()->json(['mensaje' => 'Agregado correctamente ', 'code' => "success"]);
    }
}
