<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use App\Models\Cliente;
use App\Models\ControlCaja;
use App\Models\DetalleCaja;
use App\Models\Historial;
use App\Models\Hotel;
use App\Models\TipoCaja;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class CajaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);
        $search = $request->query('search',false);

        $query = Caja::with([
        'tipoCajas' => function($query){
            $query->select('nombre','id');
        },'hotel'=> function ($query){
            $query->select('nombre','id');
        } ,'usuario'=> function ($query){
            $query->select('usuario','id');
        } 
        ]) 
        ->join('tipo_cajas','tipo_cajas.id', 'cajas.tipo')
        ->join('hotels','hotels.id', 'cajas.hotel_id')
        ->select('cajas.*')
        ->where('cajas.estado',1)->orderBy('cajas.nombre', 'asc');
        
        if(!empty($search) && $search!=null){
            
            $query->where(function ($query) use ($search) { 
                $query->where('cajas.nombre', 'like', "%{$search}%"); 
                $query->orWhere('cajas.descripcion', 'like', "%{$search}%");  
                $query->orWhere('tipo_cajas.nombre', 'like', "%{$search}%");  
                $query->orWhere('cajas.base', 'like', "%{$search}%");  
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
                'nombre' => 'required|string|max:50|unique:rols',
                'descripcion' => 'required|string|max:100', 
                'base' => 'required|numeric', 
                'estado' => 'required|integer',
                'hotel_id' => 'required|integer',
                'tipo' => 'required|integer',
                'usuario_id' => 'required|integer',
            ], 
            [
                'nombre.required' => "El campo es requerio",
                'nombre.max' => "La cantidad maxima del campo es 50", 
                'descripcion.required' => "El campo es requerido",
                'descripcion.max' => "La cantidad maxima del campo es 100",
                'estado.required' => "El campo es requerido",
                'base.required' => "El campo es requerido",
                'hotel_id.required' => "El campo es requerido",
                'tipo.required' => "El campo es requerido",
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
            'tipo' => $request->tipo,
            'usuario_id' => $request->usuario_id,
        ]);

        $json = [
            'asunto' => 'Caja Crear',
            'adjunto' => [
                'respuesta' => !empty($caja),
                'id' => $caja->id,
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
        $tipo_caja = TipoCaja::select('nombre','id')->where('estado','1')->get();
        $usuario = Usuario::select('usuario','id')->where('estado','1')->get();

        if(!$caja){
            return [
                'hotel' => $hotel, 
                'tipo_caja' => $tipo_caja,
                'usuario' => $usuario ,
            ];
        }

        return [
            'hotel' => $hotel,
            'tipo_caja' => $tipo_caja,
            'caja' => $caja,
            'usuario' => $usuario ,
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
                'tipo' => 'required|integer',
                'usuario_id' => 'required|integer',
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
                'tipo.required' => 'required|integer', 
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
            'tipo' => $request->tipo,
            'usuario_id' => $request->usuario_id,
        ]);

        $json = [
            'asunto' => 'Caja Actualizar',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
                'id' => $request->id,
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
                'id' =>  $request->id,
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
            ], 
            [
                'caja_id.required' => "El campo es requerio", 
                'saldo_base.required' => "El campo es requerio",  
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
            return response()->json(['error' => 'Solo es posible abrir una caja', 'code' => "warning"]);
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
                'id' => $request->caja_id,
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
        $id_control_caja = $request->control_caja_id; 

        $controlCaja = ControlCaja::where('id', $id_control_caja )
        ->where('estado', 1) 
        ->select('id','abrir_saldo', 'abrir_caja')
        ->first();

        if(!$controlCaja){
            return response()->json(['mensaje' => 'No hay caja abierta', 'code' => "warning"]);
        }

        $saldo_abrir =  $controlCaja->abrir_saldo;
 

        $detalleCajaIngreso = DetalleCaja::where('caja_control_id', $id_control_caja)
        ->where('created_at','>=', $controlCaja ['abrir_caja'] )
        ->selectRaw('SUM(precio) as total_precio_ingreso')
        ->where('tipo',1 )
        ->first();


        $detalleCajaEgreso = DetalleCaja::where('caja_control_id', $id_control_caja)
        ->where('created_at','>=', $controlCaja ['abrir_caja'] )
        ->selectRaw('SUM(precio) as total_precio_egreso')
        ->where('tipo',2)
        ->first();

        $totalIngreso = empty($detalleCajaIngreso["total_precio_ingreso"])?0:$detalleCajaIngreso["total_precio_ingreso"]; 
        $totalEgreso = empty($detalleCajaIngreso["total_precio_egreso"])?0:$detalleCajaIngreso["total_precio_egreso"]; 
        $detalle_caja_precio = $totalIngreso  - $totalEgreso ;

        $usuario = auth()->user();
        $updateControlCaja = true;
        $updateControlCaja = ControlCaja::where('caja_id', $caja_id )
        ->where('estado', 1) 
        ->update(
            [
                'cierre_caja' => Carbon::now()->format('Y-m-d H:i:s'),
                'cierre_saldo' => $saldo_abrir + $detalle_caja_precio,
                'diferencia' => $detalle_caja_precio,
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


    public function getAbrirCaja($usuario_id) {
        $caja = Caja::with(['usuario' => function ($query) {
            $query->select('id', 'usuario');
        }])
        ->where('usuario_id', $usuario_id)
        ->first();

        return [
            'caja' => $caja,
        ];
    }
}
