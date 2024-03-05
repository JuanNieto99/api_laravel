<?php

namespace App\Http\Controllers;

use App\Models\Abono;
use App\Models\Caja;
use App\Models\Cliente; 
use App\Models\DetalleCaja;
use App\Models\DetalleHabitacion;
use App\Models\DetalleHabitacionReserva;
use App\Models\Empleado;
use App\Models\EstadoHabitacion;
use App\Models\Habitacion;
use App\Models\Historial;
use App\Models\Hotel;
use App\Models\Impuesto;
use App\Models\Productos;
use App\Models\MetodosPago;
use App\Models\Tarifa;
use App\Models\TiposHabitaciones;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Symfony\Component\ErrorHandler\Debug;

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    { 
        $per_page = $request->query('per_page', 1);
        $search = $request->query('search',false);

        $query = Habitacion::with(['detalle',
        'hotel'=> function ($query) {
            $query->select('id','nombre');
        },
        'tipoHabitacion'=> function ($query) {
            $query->select('id','nombre');
        },
        /*  'usuario'=> function ($query) {
            $query->select('id','usuario');
        },*/
        ])
        ->join('hotels', 'hotels.id', 'habitacions.hotel_id')
        ->join('tipo_habitacion', 'tipo_habitacion.id', 'habitacions.tipo')
        ->select('habitacions.*')
        ->where('habitacions.estado','!=',0)->orderBy('habitacions.nombre', 'asc');

        if(!empty($search) && $search!=null){
            
            $query->where(function ($query) use ($search) {  
                $query->Where('habitacions.nombre', 'like', "%{$search}%");  
                $query->orWhere('hotels.nombre', 'like', "%{$search}%");  
                $query->orWhere('tipo_habitacion.nombre', 'like', "%{$search}%");  
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
                'nombre' => 'required|string|max:50',
                'descripcion' => 'required|string', 
                'diseno_json' => 'required|string',
                'estado' => 'required|integer', 
                'tipo' => 'required|integer',
                'capacidad_personas' => 'required|integer', 
                'precio' => 'required',
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
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $usuario = auth()->user();


        $habitacion = Habitacion::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'diseno_json'  =>  $request->diseno_json,
            'estado'  =>  $request->estado,
            'tipo'  =>  $request->tipo,
            'capacidad_personas'  =>  $request->capacidad_personas,
            'precio'  =>  $request->precio,
            'usuario_modifica' => $usuario->id,
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
            return response()->json(['error' => 'Erro al crear', 'code' => "error"], 200); 
        } 
    } 

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $habitacion = Habitacion::where('estado','!=',0)->find($id);

        if(!$habitacion){
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 200);
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
            ]    
        );


        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $usuario = auth()->user();

        $filasActualizadas = Habitacion::where('id', $request->id)
        ->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'diseno_json'  =>  $request->diseno_json,
            'estado'  =>  $request->estado,
            'tipo'  =>  $request->tipo,
            'capacidad_personas'  =>  $request->capacidad_personas,
            'precio'  =>  $request->precio,
            'usuario_modifica'  => $usuario->id, 
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
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy(Request $request)
    {

        $validator = Validator::make($request->all(),
        [ 
            'id' => 'required|integer',  
        ] );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

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
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 200);
        }
    }

    function checkinReserva(Request $request) {
        
        $validator = Validator::make($request->all(),
        [ 
            'habitacion_id' => 'required|integer',  
            'id_detalle' => 'required|integer', 
        ] );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $estado = EstadoHabitacion::where('habitacion_detalle_id',  $request->id_detalle)
        ->where('estado_id', 2)
        ->count();  

        if(($estado) > 0 ){
            return response()->json(['error' => 'Esta habitacion esta ocupada, Solo se puede ocupar una habitacion reservada ', 'code' => "warning"], 200);
        }

        $usuario = auth()->user();

        DetalleHabitacion::where('id',  $request->id_detalle)->update([
            'checkin'=> Carbon::now()->format('Y-m-d H:i:s'),
            'fecha_inicio'=> Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $filas_actualizadas = EstadoHabitacion::where('habitacion_detalle_id',  $request->id_detalle)->update([
            'estado_id' => 2, 
        ]); 

        $json = [
            'asunto' => 'Habitacion Ocupar',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
                'id' => $request->id,
                'data' => json_encode($request),
            ],
        ];

        Historial::insert([
            'tipo' => 1,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,     
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),                
        ]); 

        
        if($filas_actualizadas) { 
            return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]); 
        } else {
            return response()->json(['error' => 'No se completo correctamente la accion', 'code' => "error"], 200);
        }   
    }

    public function ocupar(Request $request) {
        
        $validator = Validator::make($request->all(),
            [
                'cliente_id' => 'required|integer',
                'habitacion_id' => 'required|integer', 
                'subtotal' => 'required', 
                'tarifas' => 'required', 
                'total' => 'required', 
                'hotel_id' => 'required',  
                'total' => 'required', 
                'subtotal' => 'required',   
            ]  
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $usuario = auth()->user();
        
            $caja = Caja::with(['control_caja'])
            ->where('usuario_id', $usuario->id)
            ->where('estado', 1)
            ->first();

            if(empty($caja)){
                return response()->json(['error' => 'No hay ninguna caja abierta', 'code' => "warning"], 200);
            }
    
            if(!$caja->control_caja ){
                return response()->json(['error' => 'No hay ninguna caja abierta', 'code' => "warning"], 200);
            }

            /*  $habitacion_estado = EstadoHabitacion::select('estado_id') 
            ->where('habitacion_id', $request->habitacion_id);*/

            $detalle_habitacion = DetalleHabitacion::create([
                'usuario_id' => $usuario->id,
                'cliente_id' => $request->cliente_id,
                'habitacion_id' => $request->habitacion_id, 
                'checkin' =>  Carbon::now()->format('Y-m-d H:i:s'), 
                'hotel_id' => $request->hotel_id,
                'descripcion' => $request->descripcion,
                'total' => $request->total,
                'subtotal' => $request->subtotal,
            ]); 
    
            $filas_actualizadas = EstadoHabitacion::insert([
                'estado_id' => 2, // Ocupar
                'habitacion_id' => $request->habitacion_id,
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_final' => $request->fecha_final,
                'descripcion' => $request->descripcion,
                'habitacion_detalle_id' => $detalle_habitacion->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            ]); 
    
            $abonos = [];
            $productos = [];
            $tipo = 1; // 1-> ingreso 2-> egreso

            foreach ($request->abonos as $key => $value) {
    
                $abonos[] = [
                    'hotel_id' => $request->hotel_id,
                    'habitacion_detalle_id' => $detalle_habitacion->id,
                    'cliente_id' => $request->cliente_id,
                    'valor' => $value['monto'],
                    'usuario_id_crea' => $usuario->id,
                    'metodo_pago_id' => $value['medio_pago']['id'],
                    'tipo_abono' => 1,
                    'estado' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ];

                $detale_caja_abono [] = [
                    'tipo' => $tipo,
                    'estado' => 1,
                    'usuario_id' => $usuario->id,
                    'caja_id' => $caja->id,
                    'caja_control_id' => $caja['control_caja']['id'],
                    'precio' => $value['monto'],
                    'metodo_pago_id' => $value['medio_pago']['id'],
                    'operacion_id' => 1,
                    'referencia_id' => $detalle_habitacion->id,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ];
            }
    
            foreach ($request->productos as $key => $value) { 
                $productos[] = [
                    'tipo' => $value['tipo'],
                    'valor' =>  $value['valor'],
                    'item_id' =>  $value['code'],
                    'cantidad' => $value['cantidad'],
                    'reserva_detalle_id' => $detalle_habitacion->id,
                ];
            }
    
            foreach ($request->tarifas as $key => $value) { 
                $productos[] = [
                    'tipo' => 3,
                    'valor' =>  $value['valor'],
                    'item_id' =>  $value['id'],
                    'reserva_detalle_id' => $detalle_habitacion->id,
                ];
            }
            
    
            if($abonos){  
                Abono::insert($abonos);    
                DetalleCaja::insert($detale_caja_abono);
            }
    
            if($productos){  
                DetalleHabitacionReserva::insert($productos);    
            }
    
            EstadoHabitacion::where('habitacion_id', $request->habitacion_id)
            ->where('estado_id', 3.)
            ->delete(); 
    
        
                
            $json = [
                'asunto' => 'Habitacion Ocupar',
                'adjunto' => [
                    'respuesta' => !empty($filasActualizadas),
                    'id' => $request->id,
                    'data' => json_encode($request),
                ],
            ];
    
            Historial::insert([
                'tipo' => 1,
                'data_json' => json_encode($json),
                'usuario_id' => $usuario->id,     
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),                
            ]); 
    
            if($filas_actualizadas) { 
                return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]); 
            } else {
                return response()->json(['error' => 'No se completo correctamente la accion', 'code' => "error"], 200);
            }  

    }

    public function desocupar(Request $request) {
        
        $validator = Validator::make($request->all(),[ 
                'id_habitacion' => 'required|integer',  
            ], 
            [
                'id_habitacion.required' => "El campo es requerio", 
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $usuario = auth()->user();

        $estado_habitacion = EstadoHabitacion::where('estado_id', 2)
        ->where('habitacion_id', $request->id_habitacion)
        ->select('habitacion_detalle_id', 'id')
        ->first();

        $habitacion_detalle_id = $estado_habitacion['habitacion_detalle_id'];

        $filasActualizadas = DetalleHabitacion::where('id', $habitacion_detalle_id )
        ->update([
            'checkout' =>  Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        ]);

        EstadoHabitacion::where('id',  $estado_habitacion->id)
        ->update([
            'estado_id' => 7,
        ]);

        $devolver_abono = DetalleCaja::
        where('operacion_id', 1)
        ->where('referencia_id', $habitacion_detalle_id)->get();
/*
        $abono_regresado = [];

        $tipo = 2; //1->ingreso 2->egreso

        foreach ($devolver_abono  as $key => $value) {
            $abono_regresado [] = [
                'tipo' => $tipo,
                'estado' => 1,
                'usuario_id' => $usuario->id,
                'caja_id' => $value->caja_id,
                'caja_control_id' => $value->caja_control_id,
                'precio' => $value->precio,
                'referencia_id' => 
                'metodo_pago_id' =>  $value->metodo_pago_id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'operacion_id' => 1,
            ];
        }

        DetalleCaja::insert($abono_regresado);
        Abono::where('habitacion_detalle_id', $habitacion_detalle_id)->update([
            'estado' => 0,
        ]);*/


        /*   $estado_habitacion = DetalleHabitacion::where('habitacion_id', $request->id_habitacion)
        ->where('')
        ->select('id')
        ->first();   

        $id_detalle = $estado_habitacion['id'];

        $filasActualizadas = EstadoHabitacion::insert([
            'estado_id' => 3,
            'habitacion_id' =>  $request->id_habitacion,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        ]);

        $filasActualizadas = DetalleHabitacion::where('id', $id_detalle)
        ->update([
            'checkout' =>  Carbon::now()->format('Y-m-d H:i:s'), 
        ]); 

       EstadoHabitacion::where('habitacion_id', $request->id_habitacion)
        ->where('estado_id', 2)
        ->delete(); */
        
      /*  Abono::where('habitacion_detalle_id', $id_detalle)->delete();
        DetalleHabitacionReserva::where('reserva_detalle_id', $id_detalle)->delete();*/

        $json = [
            'asunto' => 'Habitacion Desocupar',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
                'id' => $request->id,
            ],
        ];

        Historial::insert([
            'tipo' => 1,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,     
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),                
        ]);

        if($filasActualizadas) {  
            return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]); 
        } else {
            return response()->json(['error' => 'No se completo correctamente la accion', 'code' => "error"], 200);
        } 

    }

    function mantenimiento(Request $request) {
                
        $validator = Validator::make($request->all(),
            [ 
                'habitacion_id' => 'required|integer',  
                'fecha_inicio' => 'required',
                'fecha_final' => 'required',
                'descripcion' => 'required',
                'empleado_id' => 'required',
            ], 
            [
                'habitacion_id.required' => "El campo es requerio", 
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $usuario = auth()->user();

        $estado = [2]; //esta ocupada?

        $estados_activos = EstadoHabitacion::whereIn('estado_id', $estado)
        ->where('habitacion_id', $request->habitacion_id)
        ->count();

        if($estados_activos>0){
            return response()->json(['error' => 'No se completo correctamente la accion porque la habitacion esta ocupada', 'code' => "warning"], 200);
        }

        $data = [
            'fecha_incio' => $request->fecha_inicio,
            'fecha_final' => $request->fecha_final,
            'habitacion_id' => $request->habitacion_id,
        ];

        $validacionFechas = $this->validarFechasSobrePuestas($data);

        if(!$validacionFechas['estado']){ 
            return response()->json(['error' => $validacionFechas['mensaje'], 'code' => "warning"], 200);
        }

        $filasActualizadas = EstadoHabitacion::insert([
            'estado_id' => 6,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_final' => $request->fecha_final,
            'habitacion_id' => $request->habitacion_id,
            'descripcion' => $request->descripcion,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        ]);

        $json = [
            'asunto' => 'Habitacion Mantenimiento',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
                'id' => $request->id,
            ],
        ];

        Historial::insert([
            'tipo' => 1,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,     
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),                
        ]);

        if($filasActualizadas){ 
            return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]);  
        } else {
            return response()->json(['error' => 'No se completo correctamente la accion', 'code' => "error"], 200);
        }
    }

    function anularMantenimiento(Request $request) {
                
        $validator = Validator::make($request->all(),
            [ 
                'id_habitacion' => 'required|integer',  
            ], 
            [
                'id_habitacion.required' => "El campo es requerio", 
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $usuario = auth()->user();

        $estado = [2];

        $estados_activos = EstadoHabitacion::whereIn('estado_id', $estado)
        ->where('habitacion_id', $request->id_habitacion)
        ->count();

        if($estados_activos > 0){
            return response()->json(['error' => 'No se completo correctamente la accion porque la habitacion esta ocupada', 'code' => "warning"], 200);
        } 

        $filasActualizadas = EstadoHabitacion::where('habitacion_id', $request->id_habitacion)
        ->where('estado_id', 6)
        ->delete(); 


        $json = [
            'asunto' => 'Habitacion Mantenimiento anulada',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
                'id' => $request->id, 
                'data' => [
                    'id_habitacion' =>  $request->id_habitacion,
                ]
            ],
        ];

        Historial::insert([
            'tipo' => 1,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,     
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),                
        ]);

        if($filasActualizadas){ 
            return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]);  
        } else {
            return response()->json(['error' => 'No se completo correctamente la accion', 'code' => "error"], 200);
        }
    }

    function limpieza(Request $request)  {
        $validator = Validator::make($request->all(),
            [ 
                'habitacion_id' => 'required|integer',  
                'fecha_inicio' => 'required',
                'fecha_final' => 'required',
                'descripcion' => 'required',
                'empleado_id' => 'required',
            ], 
            [
                'habitacion_id.required' => "El campo es requerio", 
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $usuario = auth()->user();

        $estado = [2]; //esta ocupada?

        $estados_activos = EstadoHabitacion::whereIn('estado_id', $estado)
        ->where('habitacion_id', $request->habitacion_id)
        ->count();

        if($estados_activos>0){
            return response()->json(['error' => 'No se completo correctamente la accion porque la habitacion esta ocupada', 'code' => "warning"], 200);
        }

        $data = [
            'fecha_incio' => $request->fecha_inicio,
            'fecha_final' => $request->fecha_final,
            'habitacion_id' => $request->habitacion_id,
        ];

        $validacionFechas = $this->validarFechasSobrePuestas($data);

        if(!$validacionFechas['estado']){ 
            return response()->json(['error' => $validacionFechas['mensaje'], 'code' => "warning"], 200);
        }

        $filasActualizadas = EstadoHabitacion::insert([
            'estado_id' => 4,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_final' => $request->fecha_final,
            'habitacion_id' => $request->habitacion_id,
            'descripcion' => $request->descripcion,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        ]);

        $json = [
            'asunto' => 'Habitacion Limpieza',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
                'id' => $request->id,
            ],
        ];

        Historial::insert([
            'tipo' => 1,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,     
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),                
        ]);

        if($filasActualizadas){ 
            return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]);  
        } else {
            return response()->json(['error' => 'No se completo correctamente la accion', 'code' => "error"], 200);
        }
    }

    function anularLimpieza(Request $request)  {
        $validator = Validator::make($request->all(),
            [ 
                'id_habitacion' => 'required|integer',  
            ], 
            [
                'id_habitacion.required' => "El campo es requerio", 
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $usuario = auth()->user();

        $estado = [2];

        $estados_activos = EstadoHabitacion::whereIn('estado_id', $estado)
        ->where('habitacion_id', $request->id_habitacion)
        ->count();

        if($estados_activos>0){
            return response()->json(['error' => 'No se completo correctamente la accion porque la habitacion esta ocupada', 'code' => "warning"], 200);
        } 

        $filasActualizadas = EstadoHabitacion::where('habitacion_id', $request->id_habitacion)
        ->where('estado_id', 4)
        ->delete(); 

        $json = [
            'asunto' => 'Habitacion Limpieza',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
                'id' => $request->id,
            ],
        ];

        Historial::insert([
            'tipo' => 1,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,     
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),                
        ]);

        if($filasActualizadas){ 
            return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]);  
        } else {
            return response()->json(['error' => 'No se completo correctamente la accion', 'code' => "error"], 200);
        }
    }

    function getReserva(Request $request) {

        $hotel_id = $request->hotel_id;
        $cliente_busqueda = $request->cliente_busqueda;
        $tipo_habitacion = $request->tipo_habitacion;

        $cliente = Cliente::select('nombres','apellidos','numero_documento', 'id')
        ->where('hotel_id',  $hotel_id); 

        if( $cliente_busqueda ){
            $cliente->where(function ($query) use ($cliente_busqueda){
                $query->Where('clientes.nombres', 'like', "%{$cliente_busqueda}%");  
                $query->orWhere('clientes.apellidos', 'like', "%{$cliente_busqueda}%");  
                $query->orWhere('clientes.numero_documento', 'like', "%{$cliente_busqueda}%");  
            });
        }
    
        $metodos_pago = MetodosPago::select('nombre', 'id')->get();

        $tarifas = Tarifa::select('id', 'nombre', 'valor', 'tipo')
        ->where('hotel_id',  $hotel_id)
        ->where('tipo_habitacion_id', $tipo_habitacion)
        ->get();

        $productos = Productos::select('productos.nombre', 'productos.id', 'productos.precio', 'productos.tipo_producto')
        ->join('inventarios','inventarios.id','productos.inventario_id') 
        ->where('inventarios.hotel_id', $hotel_id)
        ->get();

        $habitacion = Habitacion::where('hotel_id', $hotel_id )->get();

        $impuesto = Impuesto::where('hotel_id', $hotel_id)->get();

        return [
            'cliente' => $cliente->get(),
            'metodos_pago' => $metodos_pago,
            'tarifa' => $tarifas,
            'productos' => $productos,
            'habitacion' => $habitacion,
            'impuesto' => $impuesto,
        ];
    }

    function reservar(Request $request)  {
        //agregar validacion de que no hay una reserva para la misma habitacion en las mismas fecha
        $validator = Validator::make($request->all(),
            [
                'cliente_id' => 'required|integer',
                'habitacion_id' => 'required|integer', 
                'fecha_inicio' => 'required', 
                'fecha_final' => 'required',  
                'subtotal' => 'required', 
                'tarifas' => 'required', 
                'total' => 'required', 
                'hotel_id' => 'required',  
                'total' => 'required', 
                'subtotal' => 'required',   
            ]  
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $usuario = auth()->user();

/*        $estado = [2,5];

        $estados_activos = EstadoHabitacion::whereIn('estado_id', $estado)
        ->where('habitacion_id', $request->habitacion_id)
        ->count();*/
        $caja = Caja::with(['control_caja' => function ($query)  {
            $query->where('estado', 1);
        }])
        ->where('usuario_id', $usuario->id)
        ->where('estado', 1)
        ->first();

        if(empty($caja)){
            return response()->json(['error' => 'No hay ninguna caja abierta', 'code' => "warning"], 200);
        }

        if(!$caja->control_caja ){
            return response()->json(['error' => 'No hay ninguna caja abierta', 'code' => "warning"], 200);
        }


        $data = [
            'fecha_incio' => $request->fecha_inicio,
            'fecha_final' => $request->fecha_final,
            'habitacion_id' => $request->habitacion_id,
        ];

        $validacionFechas = $this->validarFechasSobrePuestas( $data);
        
        if(!$validacionFechas['estado']){ 
            return response()->json(['error' => $validacionFechas['mensaje'], 'code' => "warning"], 200);
        }


        $detalle_habitacion = DetalleHabitacion::create([
            'usuario_id' => $usuario->id,
            'cliente_id' => $request->cliente_id,
            'habitacion_id' => $request->habitacion_id,
            'hotel_id' => $request->hotel_id,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_salida' => $request->fecha_final,
            'descripcion' => $request->descripcion,
            'total' => $request->total,
            'subtotal' => $request->subtotal,
        ]);

        $filasActualizadas = EstadoHabitacion::insert([
            'estado_id' => 5, // reservada
            'habitacion_id' => $request->habitacion_id,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_final' => $request->fecha_final,
            'descripcion' => $request->descripcion,
            'habitacion_detalle_id' => $detalle_habitacion->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        ]); 


        $abonos = [];
        $productos = [];
        $detale_caja_abono = [];
        $tipo = 1; //1->ingreso 2->egreso
        foreach ($request->abonos as $key => $value) {

            $abonos[] = [
                'hotel_id' => $request->hotel_id,
                'habitacion_detalle_id' => $detalle_habitacion->id,
                'cliente_id' => $request->cliente_id,
                'valor' => $value['monto'],
                'usuario_id_crea' => $usuario->id,
                'metodo_pago_id' => $value['medio_pago']['id'],
                'tipo_abono' => 1,
                'estado' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];

            $detale_caja_abono [] = [
                'tipo' => $tipo,
                'estado' => 1,
                'usuario_id' => $usuario->id,
                'caja_id' => $caja->id,
                'caja_control_id' => $caja['control_caja']['id'],
                'precio' => $value['monto'],
                'metodo_pago_id' => $value['medio_pago']['id'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'referencia_id' =>  $detalle_habitacion->id,
                'operacion_id' => 1,
            ];
        }
        if($request->productos){

            foreach ($request->productos as $key => $value) { 
                $productos[] = [
                    'tipo' => $value['tipo'],
                    'valor' =>  $value['valor'],
                    'item_id' =>  $value['code'],
                    'reserva_detalle_id' => $detalle_habitacion->id,
                ];
            }
        }


        foreach ($request->tarifas as $key => $value) { 
            $productos[] = [
                'tipo' => 3,
                'valor' =>  $value['valor'],
                'item_id' =>  $value['id'],
                'reserva_detalle_id' => $detalle_habitacion->id,
            ];
        }
        

        if($abonos){  
            Abono::insert($abonos);    
            DetalleCaja::insert($detale_caja_abono);
        }

        if($productos){  
            DetalleHabitacionReserva::insert($productos);    
        } 

        $json = [
            'asunto' => 'Habitacion Ocupar',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
                'id' => $request->id,
            ],
        ];

        Historial::insert([
            'tipo' => 1,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,     
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),                
        ]);

        if($filasActualizadas){ 
            return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]);  
        } else {
            return response()->json(['error' => 'No se completo correctamente la accion', 'code' => "error"], 200);
        }
    }

    public function anualarReservar(Request $request)  {
        $validator = Validator::make($request->all(),
            [ 
                'id_habitacion' => 'required|integer', 
                'id_detalle' => 'required|integer', 
            ], 
            [
                'id_habitacion.required' => "El campo es requerio",  
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $usuario = auth()->user();

        $estado = [2];

        $estados_activos = EstadoHabitacion::whereIn('estado_id', $estado)
        ->where('habitacion_id', $request->id_habitacion)
        ->count();

        if($estados_activos>0){
            return response()->json(['error' => 'No se completo correctamente la accion porque la habitacion esta ocupada', 'code' => "warning"], 200);
        } 

        $devolver_abono = DetalleCaja::
        where('operacion_id', 1)
        ->where('referencia_id', $request->id_detalle)->get();

        $abono_regresado = [];

        $tipo = 2; //1->ingreso 2->egreso

        foreach ($devolver_abono  as $key => $value) {
            $abono_regresado [] = [
                'tipo' => $tipo,
                'estado' => 1,
                'usuario_id' => $usuario->id,
                'caja_id' => $value->caja_id,
                'caja_control_id' => $value->caja_control_id,
                'precio' => $value->precio,
                'metodo_pago_id' =>  $value->metodo_pago_id,
                'referencia_id' => $request->id_detalle,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'operacion_id' => 1,
            ];
        }

        DetalleCaja::insert($abono_regresado);
        
        Abono::where('habitacion_detalle_id',$request->id_detalle)->update([
            'estado' => 0,
        ]);

        $json = [
            'asunto' => 'Habitacion Desocupar',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
                'id' => $request->id,
            ],
        ];

        Historial::insert([
            'tipo' => 1,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,     
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),                
        ]);

        DetalleHabitacionReserva::where('reserva_detalle_id', $request->id_detalle)->update([
            'estado_id' => 0
        ]);

        $filasActualizadas = EstadoHabitacion::where('habitacion_detalle_id', $request->id_detalle)
        ->where('estado_id', 5)
        ->update([
            'estado_id' => 0
        ]);

        $filasActualizadas = DetalleHabitacion::where('id', $request->id_detalle) 
        ->update([
            'estado_id' => 0
        ]);

        if($filasActualizadas){ 
            return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]);  
        } else {
            return response()->json(['error' => 'No se completo correctamente la accion', 'code' => "error"], 200);
        }
    }

    public function edit($id) {
        $habitacion = Habitacion::where('estado','!=',0)->find($id);
        $pisos = range(1, 99);

        $tipo_habitacion = TiposHabitaciones::select('id','nombre')->Where('estado',1)->get();
        $hotel = Hotel::select('nombre','id')->where('estado','1')->get();

        if(!$habitacion){ 

            return [ 
                'tipo_habitacion' => $tipo_habitacion,
                'pisos' =>  $pisos,
                'hotel' => $hotel,
            ];
            
        } 

        return [
            'habitacion' => $habitacion,
            'tipo_habitacion' => $tipo_habitacion,
            'pisos' =>  $pisos,
            'hotel' => $hotel,
        ];
    }

    public function listarHabitacionDashboard(Request $request) {
        $validator = Validator::make($request->all(),[ 
            'hotel_id' => 'required|integer',  
            'piso_id' => 'required|integer',  
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $data = Habitacion::with(['habitacion_estado', 'detalle', 'tipoHabitacion'=>function($query){
            $query->select('id', 'diseno_json', 'nombre');
        }])
        ->select('nombre', 'descripcion', 'diseno_json', 'piso', 'id', 'tipo')
        ->where('estado','!=', 0)
        ->where('piso',$request->piso_id)
        ->where('hotel_id',$request->hotel_id)
        ->get();

        return $data;
    }


    public function listarHabitacionDashboardPisos(Request $request) {
        $validator = Validator::make($request->all(),[ 
            'hotel_id' => 'required|integer',     
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $pisos = Habitacion::where('hotel_id', $request->hotel_id)
        ->select('piso')
        ->groupBy('piso')
        ->get();     

        return [
            'pisos' => $pisos,
        ];
    }

    function gatProductosServicio(Request $request) {
        $validator = Validator::make($request->all(),[     
            'hotel_id' => 'required|integer',    
        ]); 
        
        if($validator->fails()){
            return response()->json($validator->errors());
        } 

        $nombre_busqueda = $request->producto_busqueda;
        $hotel_id = $request->hotel_id;


        $productos = Productos::select('productos.nombre','productos.id', 'productos.valor')
        ->join('inventarios','inventarios.id','productos.inventario_id')
    
        ->where('inventarios.hotel_id', $hotel_id) ;

        if(!empty($nombre_busqueda)) {
            $productos->where(function ($query) use ($nombre_busqueda){
                $query->Where('productos.nombre', 'like', "%{$nombre_busqueda}%");  
                $query->orWhere('productos.descripcion', 'like', "%{$nombre_busqueda}%");   
            });
        } 

        return [
            'productos' =>  $productos ->get(),
        ];
    }

    function getEmpleadosHabitacion(Request $request) {

        $validator = Validator::make($request->all(),[     
            'hotel_id' => 'required|integer',    
        ]); 
        
        if($validator->fails()){
            return response()->json($validator->errors());
        } 

        $hotel_id = $request->hotel_id;

        $empleados = Empleado::select('id','nombres', 'apellidos')
        ->where('hotel_id',  $hotel_id)
        ->where('estado',  1)
        ->get();

        return [
            'empleados' => $empleados,
        ];

    }

    public function validarFechasSobrePuestas($data){

        $fecha_inicio = $data['fecha_incio'];
        $fecha_final = $data['fecha_final'];
        $habitacion_id = $data['habitacion_id'];

        $data = EstadoHabitacion::where('habitacion_id', $habitacion_id ) 
        ->where(function ($query) use ($fecha_inicio, $fecha_final) {
            $query->where(function ($q) use ($fecha_inicio, $fecha_final) {
                $q->where('fecha_inicio', '>=', $fecha_inicio)
                    ->where('fecha_inicio', '<=', $fecha_final);
            })->orWhere(function ($q) use ($fecha_inicio, $fecha_final) {
                $q->where('fecha_final', '>=', $fecha_inicio)
                    ->where('fecha_final', '<=', $fecha_final);
            })->orWhere(function ($q) use ($fecha_inicio, $fecha_final) {
                $q->where('fecha_inicio', '<', $fecha_inicio)
                    ->where('fecha_final', '>', $fecha_final);
            });
        })
        ->where('estado_id','!=',0)
        ->first(); 

        if ($data) {
            $estado = '';

            switch ($data['estado_id']) {
                case '5': 
                    $estado = "en la reserva";
                    break;

                case '2': 
                    $estado = "en la ocupacion";
                    break;

                case '6': 
                    $estado = "en el mantenimiento";
                    break;   

                case '4': 
                    $estado = "en la limpieza";
                    break; 
                
                default:
                    # code...
                    break;
            }
            return [
                'mensaje' => 'Las fechas ingresadas se sobrepone con otras '. $estado,
                'data' => $data,
                'estado' => false,
            ];
        } else {
            return [ 
                'estado' => true,
            ];
        }
    }

    public function getRoomDashBoard(Request $request) {
        
        $habitacion_data_estado = EstadoHabitacion::where('habitacion_id', $request->habitacion_id)
        ->whereIn('estado_id', [2,7])->first();  

        $habitacion_data = DetalleHabitacion::with([
        'habitacion' => function($query){
            $query->select('id', 'nombre');
        },
        'cliente' => function($query){
            $query->select('id', 'nombres', 'apellidos');
        }])
        ->where('habitacion_id', $request->habitacion_id)
        ->where('id', $habitacion_data_estado->habitacion_detalle_id)
        ->first();

        $metodos_pago = MetodosPago::where('estado', 1)->get();

        $abono = Abono::with(['metodoPago'])
        ->where('habitacion_detalle_id',$habitacion_data_estado->habitacion_detalle_id)
        ->get();

        $tarifasHabitacion = DetalleHabitacionReserva::with(['tarifa'])
        ->where('tipo', 3)
        ->where('reserva_detalle_id', $habitacion_data_estado->habitacion_detalle_id)
        ->get();

        $productosHabitacion = DetalleHabitacionReserva::with(['productos'])
        ->whereIn('tipo', [1,2])
        ->where('reserva_detalle_id', $habitacion_data_estado->habitacion_detalle_id)
        ->get();


        /* $serviciosHabitacion = DetalleHabitacionReserva::where('tipo', 2)
        ->where('reserva_detalle_id', $habitacion_data_estado->habitacion_detalle_id)
        ->get();*/

        $tarifas = Tarifa::where('estado', 1)->where('hotel_id',  $habitacion_data->hotel_id)->get();

        $productos = Productos::where('productos.estado', 1)
        ->join('inventarios','inventarios.id','productos.inventario_id')
        ->where('inventarios.hotel_id', $habitacion_data->hotel_id)
        ->select('productos.*')
        ->get();

        $impuesto = Impuesto::where('hotel_id', $habitacion_data->hotel_id)->get();


        return [
            'estadoHabitacion' => $habitacion_data_estado,
            'detalleHabitacion' =>  $habitacion_data,
            'abonoHabitacion' => $abono,
            'tarifasHabitacion' => $tarifasHabitacion,
            'productosHabitacion' => $productosHabitacion,
           // 'serviciosHabitacion' => $serviciosHabitacion,
            'tarifas' => $tarifas,
            'productos' => $productos,
            'metodos_pago' => $metodos_pago,
            'impuesto' => $impuesto,
        ]; 

    }

    function saveDetalle(Request $request) {
        $productos = $request->productos;
        $tarifas = $request->tarifas;
        $abonos = $request->abonos;
        $detalle_id = $request->detalleId;
        $hotel_id = $request->hotelId;
        $cliente_id = $request->clienteId;

        $productos_data = [];
        $abonos_data = [];

        $usuario = auth()->user();

        DetalleHabitacionReserva::where('reserva_detalle_id', $detalle_id)->delete();

        Abono::where('habitacion_detalle_id', $detalle_id)->delete();

        $sobrepaso_stock = false;
        $sobrepaso_stock_mensaje = ""; 

        foreach ($productos as $key => $value) { 
                
                if($value['tipoProducto'] == 1){
                    $validacion = InventarioController::validarDisponibilidadProducto($value['id'], $value['cantidad']?$value['cantidad']:1);
                    $sobrepaso_stock = $validacion['validacion'];
                    $sobrepaso_stock_mensaje = $validacion['mensaje']; 

                    if($sobrepaso_stock){
                        return response()->json(['msm' => $sobrepaso_stock_mensaje ,'code' => "warning"]);
                    }
                }

                $productos_data [] = [
                    'tipo' => $value['tipoProducto'],
                    'cantidad' => $value['cantidad']?$value['cantidad']:1,
                    'valor' =>(int) $value['valor'],
                    'reserva_detalle_id' => $detalle_id,
                    'item_id' => $value['id'],
                ];
          
        }

        foreach ($tarifas as $key => $value) { 

            $productos_data [] = [
                'tipo' => 3,
                'cantidad' => 1,
                'valor' => $value['valor'],
                'reserva_detalle_id' => $detalle_id,
                'item_id' => $value['id'],
            ];
        }
 
        foreach ($abonos as $key => $value) { 
            $abonos_data[] = [
                'hotel_id' => $hotel_id,
                'habitacion_detalle_id' => $detalle_id,
                'cliente_id' => $cliente_id,
                'valor' => $value['valor'],
                'usuario_id_crea' => $usuario->id,
                'metodo_pago_id' => $value['metodo_pago_id'],
                'tipo_abono' => 1,
                'estado' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        }

 
        if($abonos_data) {
            Abono::insert($abonos_data);
        }
        

        if($productos_data){
            DetalleHabitacionReserva::insert($productos_data);
        }

        return [
            'msm' => 'Guardado Exitoso',
            'code' => 'success'
        ];
        //DetalleHabitacionReserva
    }

    

}
