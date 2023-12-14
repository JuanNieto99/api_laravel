<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use App\Models\Consumo;
use App\Models\DetalleCaja;
use App\Models\DetalleHabitacion;
use App\Models\Facturacion;
use App\Models\FacturacionMedioPago;
use App\Models\Habitacion;
use App\Models\Historial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class FacturacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);

        $query = Facturacion::orderBy('id', 'desc');

        return $per_page? $query->paginate($per_page) : $query->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[  
                'concepto' => 'required|string',
                'descripcion' => 'string',
                'metodos_pagos' => 'required|json',
                'cliente_id' => 'required|integer',
                'porcentaje_descuento' => 'required|integer',
                'hotel_id' => 'required|integer', 
            ], 
            [ 
                'concepto.required' => "El campo es requerio", 
                'metodos_pagos.required' => "El campo es requerio",  
                'cliente_id.required' => "El campo es requerio",  
                'porcentaje_descuento.required' => "El campo es requerio",
                'hotel_id.required' => "El campo es requerio",      
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }
 

        $caja_abierta = Caja::with(['control_caja'=>function ($query) {
            $query->where('estado', 1);
            $query->where('abrir_caja', Carbon::now()->format('Y-m-d'));
        }])
        ->where('estado',1) 
        ->first();  

        if(!$caja_abierta) {
            return response()->json(['mensaje' => 'No hay caja abierta','code' => "warning"]);
        }


        $usuario = auth()->user(); 
        $medios_pagos_array =  json_decode($request->metodos_pagos, true);
        $sub_total = 0;
        $total = 0;
        $iva_total = 0;
        $descuento = $request->porcentaje_descuento;  


        $consumos = Consumo::where('cliente_id', $request->cliente_id)
        ->where('estado',1)
        ->get();
 
        
        $detalle_habitacion = DetalleHabitacion::with(['habitacion'=>function($query){
            $query->where('estado', 2);
        }])

        ->where('cliente_id', $request->cliente_id) 
        ->get();

        if($detalle_habitacion){
            $actualizar_detalle_habitacion = [];

            foreach ( $detalle_habitacion  as $key => $value) {
                $sub_total = empty($value->habitacion)?0:$value->habitacion->precio;
                $actualizar_detalle_habitacion [] = $value->id;
            } 
        } 

        foreach ($consumos as $key => $value) { 
            $sub_total = $sub_total +  $value->precio; 
        } 
        
        $total = $sub_total;

        if($descuento >0){
            $total =  $sub_total * $descuento /100; 
        } 

        if($sub_total<=0){
            return response()->json(['mensaje' => 'El valor a pagar para este cliente no debe estar por debajo de 0' ,'code' => "warning"]); 
        }

        //validacion que el total de metodos de pago sea al total de la deuda
        $pagos_medios_pagos = 0;

        foreach ($medios_pagos_array  as $key => $value) {
            $pagos_medios_pagos += $value['precio'];
        }

        if($pagos_medios_pagos != $total) {
            return response()->json(['mensaje' => 'Los medios de pagos no coinciden con la cantidad '.$total ,'code' => "warning"]); 

        }

        $factura_insert = [
            'concepto' => $request->concepto,
            'descripcion' => $request->descripcion,
            'sub_total' => $sub_total,
            'total' => $total,
            'iva' => $iva_total, 
            'cliente_id' => $request->cliente_id, 
            'porcentaje_descuento' => $descuento,
            'hotel_id' => $request->hotel_id, 
            'estado' => 1,
        ];

        $factura = Facturacion::create( $factura_insert ); 
        
        if($factura){
            $medios_pagos_detalle_array = [];

            $medios_pagos_caja_array = []; 
            foreach ($medios_pagos_array  as $key => $value) {
                $medios_pagos_detalle_array [] = [
                    'facturacion_id' => $factura->id,
                    'metodo_pago_id' => $value['metodo_pago_id'],
                    'valor' => $value['precio'],
                ]; 

                $medios_pagos_caja_array[] = [
                    'facturacion_id' => $factura->id,
                    'metodo_pago_id' => $value['metodo_pago_id'],
                    'usuario_id' => $usuario->id,
                    'caja_id' => $caja_abierta->id,
                    'precio' => $value['precio'],
                    'tipo' => 1,
                    'estado' => 1,  
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ];
            } 
                
            FacturacionMedioPago::insert($medios_pagos_detalle_array);

            DetalleCaja::insert($medios_pagos_caja_array);  

            if($detalle_habitacion){  
                $habitacion_id = $detalle_habitacion[0]["habitacion_id"];
                DetalleHabitacion::whereIn('id', $actualizar_detalle_habitacion)
                ->update([
                    'facturacion_id' => $factura->id,
                    'checkout' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);  
                
                Habitacion::where('id', $habitacion_id )
                ->update(
                    [
                        'estado' => 4,
                    ]
                ); 
            }
            
            //pasa el consumo a estado facturado


            Consumo::where('cliente_id', $request->cliente_id)
            ->update([
                'facturacion_id' => $factura->id ,
                'estado' => 3,
            ]);  
        }  

        $json = [
            'asunto' => 'Facturacion Crear',
            'adjunto' => [
                'respuesta' => !empty($factura),
            ],
        ]; 
        
        Historial::insert([
            'tipo' => 2,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,          
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),           
        ]);

        if($factura){   
            return response()->json(['mensaje' => 'Factura exitosa','factura'  => $factura ,'code' => "success"]);
        } else {
            return response()->json(['error' => 'Error', 'code' => "error"], 404);
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
        $factura = Facturacion::with(['facturacion_medio_pago'])
        ->where('estado',1)->find($id);
        
        if(!$factura){
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }
        
        return $factura;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(facturacion $facturacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, facturacion $facturacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $filasActualizadas = Facturacion::where('id', $request->id)
        ->update([ 
            'estado' => 0,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $json = [
            'asunto' => 'Anular Facturacion',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
            ],
        ];

        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 2,
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
