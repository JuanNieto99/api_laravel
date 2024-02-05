<?php

namespace App\Http\Controllers;

use App\Models\Abono;
use App\Models\Cliente;
use App\Models\DetalleHabitacion;
use App\Models\DetalleHabitacionReserva;
use App\Models\Empleado;
use App\Models\EstadoHabitacion;
use App\Models\Habitacion;
use App\Models\Historial;
use App\Models\Hotel;
use App\Models\Productos;
use App\Models\MetodosPago;
use App\Models\Tarifa;
use App\Models\TiposHabitaciones;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

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

        $habitacion_estado = EstadoHabitacion::select('estado_id') 
        ->where('habitacion_id', $request->habitacion_id);

        if($habitacion_estado['estado_id'] == 5){

        } else {
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
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            ]); 
    
            $abonos = [];
            $productos = [];
    
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
            }
    
            foreach ($request->productos as $key => $value) { 
                $productos[] = [
                    'tipo' => $value['tipo'],
                    'valor' =>  $value['valor'],
                    'item_id' =>  $value['code'],
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

        $estado_habitacion = DetalleHabitacion::where('habitacion_id', $request->id_habitacion)
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
        ->delete(); 
        
        Abono::where('habitacion_detalle_id', $id_detalle)->delete();
        DetalleHabitacionReserva::where('reserva_detalle_id', $id_detalle)->delete();

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

        return [
            'cliente' => $cliente->get(),
            'metodos_pago' => $metodos_pago,
            'tarifa' => $tarifas,
            'productos' => $productos,
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

        $estado = [2,5];

        $estados_activos = EstadoHabitacion::whereIn('estado_id', $estado)
        ->where('habitacion_id', $request->habitacion_id)
        ->count();

        if($estados_activos>0){
            return response()->json(['error' => 'No se completo correctamente la accion porque la habitacion esta ocupada, o reservada', 'code' => "warning"], 200);
        }

        $filasActualizadas = EstadoHabitacion::insert([
            'estado_id' => 5, // reservada
            'habitacion_id' => $request->habitacion_id,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_final' => $request->fecha_final,
            'descripcion' => $request->descripcion,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        ]); 

        $detalle_habitacion = DetalleHabitacion::create([
            'usuario_id' => $usuario->id,
            'cliente_id' => $request->cliente_id,
            'habitacion_id' => $request->habitacion_id,
            'hotel_id' => $request->hotel_id,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_salida' => $request->fecha_salida,
            'descripcion' => $request->descripcion,
            'total' => $request->total,
            'subtotal' => $request->subtotal,
        ]);

        $abonos = [];
        $productos = [];

        foreach ($request->abonos as $key => $value) {

            $abonos[] = [
                'hotel_id' => $request->habitacion_id,
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
        }

        foreach ($request->productos as $key => $value) { 
            $productos[] = [
                'tipo' => $value['tipo'],
                'valor' =>  $value['valor'],
                'item_id' =>  $value['code'],
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

        $filasActualizadas = EstadoHabitacion::where('habitacion_id', $request->id_habitacion)
        ->where('estado_id', 5)
        ->delete(); 

        if(!$filasActualizadas ){
            return response()->json(['error' => 'No se completo correctamente la accion', 'code' => "error"], 200);
        } 

    
        $estado_habitacion = DetalleHabitacion::where('habitacion_id', $request->id_habitacion)
        ->select('id')
        ->first();   

        $id_detalle = $estado_habitacion['id'];
    
        Abono::where('habitacion_detalle_id', $id_detalle)->delete();
        DetalleHabitacionReserva::where('reserva_detalle_id', $id_detalle)->delete();

        $filasActualizadas = DetalleHabitacion::where('habitacion_id', $request->id_habitacion) 
        ->delete(); 

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
}
