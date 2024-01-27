<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\DetalleHabitacion;
use App\Models\EstadoHabitacion;
use App\Models\Habitacion;
use App\Models\Historial;
use App\Models\Hotel;
use App\Models\MetodosPago;
use App\Models\TiposHabitaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
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
        ->join('tipo_habitacion', 'tipo_habitacion.id', 'tipo_habitacion.hotel_id')
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
                'nombre' => 'required|string|max:50|unique:habitacions',
                'descripcion' => 'required|string', 
                'diseno_json' => 'required|string',
                'estado' => 'required|integer', 
                'tipo' => 'required|integer',
                'capacidad_personas' => 'required|integer', 
                'precio' => 'required',
              //  'usuario_modifica' => 'required',
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
               // 'usuario_modifica.required' => "El campo es requerido", 
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
            return response()->json(['error' => 'Erro al crear', 'code' => "error"], 404); 
        } 
    } 

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $habitacion = Habitacion::where('estado','!=',0)->find($id);

        if(!$habitacion){
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
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
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
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
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }
    }

    public function ocupar(Request $request) {
        
        $validator = Validator::make($request->all(),[ 
                'cliente_id' => 'required|integer', 
                'habitacion_id' => 'required|integer',  
                'hotel_id' => 'required|integer',  
            ], 
            [
                'nombre.required' => "El campo es requerio",
                'cliente_id.required' => "El campo es requerio",
                'habitacion_id.required' => "El campo es requerio", 
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $usuario = auth()->user();

        $ocupar = DetalleHabitacion::create([
            'usuario_id' => $usuario->id,
            'cliente_id' => $request->cliente_id,
            'habitacion_id' => $request->habitacion_id, 
            'checkin' =>  Carbon::now()->format('Y-m-d H:i:s'), 
            'hotel_id' => $request->hotel_id,
        ]); 

        if($ocupar){
            EstadoHabitacion::where('habitacion_id', $request->habitacion_id)->delete(); 

            $filasActualizadas = EstadoHabitacion::insert([
                'estado_id' => 2,
                'habitacion_id' =>  $request->habitacion_id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            ]);
            
            /*Habitacion::where('id', $request->habitacion_id)
            ->update([
                'estado' => '2',
            ]);*/
            if($filasActualizadas) {

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

                return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]); 
            } else {
                return response()->json(['error' => 'No se completo correctamente la accion', 'code' => "error"], 404);
            }

        } else {
            return response()->json(['error' => 'No se completo correctamente la accion', 'code' => "error"], 404);

        }

    }

    public function desocupar(Request $request) {
        
        $validator = Validator::make($request->all(),[ 
                'id_habitacion' => 'required|integer', 
                'id_detalle' =>  'required|integer', 
            ], 
            [
                'id.required' => "El campo es requerio", 
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $usuario = auth()->user();
        /*$filasActualizadas = Habitacion::where('id', $request->id)
        ->update([
            'estado' => '1',
        ]); */
        
        EstadoHabitacion::where('habitacion_id', $request->id_habitacion)->delete(); 

        $filasActualizadas = EstadoHabitacion::insert([
            'estado_id' => 3,
            'habitacion_id' =>  $request->id_habitacion,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        ]);

        $filasActualizadas = DetalleHabitacion::where('id', $request->id_detalle)
        ->update([
            'checkout' =>  Carbon::now()->format('Y-m-d H:i:s'), 
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

        if($filasActualizadas) {  
            return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]); 
        } else {
            return response()->json(['error' => 'No se completo correctamente la accion', 'code' => "error"], 404);
        } 

    }

    function mantenimiento(Request $request) {
                
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

        $estados_activos = EstadoHabitacion::whereIn('estado', $estado)
        ->where('habitacion_id', $request->id_habitacion)
        ->count();

        if($estados_activos>0){
            return response()->json(['error' => 'No se completo correctamente la accion porque la habitacion esta ocupada', 'code' => "warning"], 404);
        }
        

        $filasActualizadas = EstadoHabitacion::insert([
            'estado_id' => 6,
            'habitacion_id' =>  $request->id_habitacion,
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
            return response()->json(['error' => 'No se completo correctamente la accion', 'code' => "error"], 404);
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

        $estados_activos = EstadoHabitacion::whereIn('estado', $estado)
        ->where('habitacion_id', $request->id_habitacion)
        ->count();

        if($estados_activos>0){
            return response()->json(['error' => 'No se completo correctamente la accion porque la habitacion esta ocupada', 'code' => "warning"], 404);
        } 

        $filasActualizadas = EstadoHabitacion::where('habitacion_id', $request->habitacion_id)
        ->where('estado_id', 6)
        ->delete(); 


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
            return response()->json(['error' => 'No se completo correctamente la accion', 'code' => "error"], 404);
        }
    }

    function limpieza(Request $request)  {
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

        $estados_activos = EstadoHabitacion::whereIn('estado', $estado)
        ->where('habitacion_id', $request->id_habitacion)
        ->count();

        if($estados_activos>0){
            return response()->json(['error' => 'No se completo correctamente la accion porque la habitacion esta ocupada', 'code' => "warning"], 404);
        }

        $filasActualizadas = EstadoHabitacion::insert([
            'estado_id' => 4,
            'habitacion_id' =>  $request->id_habitacion,
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
            return response()->json(['error' => 'No se completo correctamente la accion', 'code' => "error"], 404);
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

        $estados_activos = EstadoHabitacion::whereIn('estado', $estado)
        ->where('habitacion_id', $request->id_habitacion)
        ->count();

        if($estados_activos>0){
            return response()->json(['error' => 'No se completo correctamente la accion porque la habitacion esta ocupada', 'code' => "warning"], 404);
        } 

        $filasActualizadas = EstadoHabitacion::where('habitacion_id', $request->habitacion_id)
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
            return response()->json(['error' => 'No se completo correctamente la accion', 'code' => "error"], 404);
        }
    }

    function getReserva(Request $request) {

        $hotel_id = $request->hotel_id;
        $cliente_busqueda = $request->cliente_busqueda;
        $cliente = Cliente::select('nombres','apellidos','numero_documento')->where('hotel_id',  $hotel_id)->get(); 
        $metodos_pago = MetodosPago::select('nombre', 'id')->get();

        return [
            'cliente' => $cliente,
            'metodos_pago' => $metodos_pago
        ];
    }

    function reservar(Request $request)  {
        //agregar validacion de que no hay una reserva para la misma habitacion en las mismas fecha
        $validator = Validator::make($request->all(),
            [ 
                'id_habitacion' => 'required|integer',  
                'cliente_id' => 'required|integer',
                'habitacion_id' => 'required|integer', 
                'fecha_inicio' => 'required', 
                'fecha_final' => 'required', 
            ]  
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $usuario = auth()->user();

        $estado = [2,5];

        $estados_activos = EstadoHabitacion::whereIn('estado', $estado)
        ->where('habitacion_id', $request->id_habitacion)
        ->count();

        if($estados_activos>0){
            return response()->json(['error' => 'No se completo correctamente la accion porque la habitacion esta ocupada, o reservada', 'code' => "warning"], 404);
        }

        $filasActualizadas = EstadoHabitacion::insert([
            'estado_id' => 4,
            'habitacion_id' =>  $request->id_habitacion,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        ]);

        if(!$filasActualizadas ){
            return response()->json(['error' => 'No se completo correctamente la accion', 'code' => "error"], 404);
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
            return response()->json(['error' => 'No se completo correctamente la accion', 'code' => "error"], 404);
        }
    }

    public function anualrReservar(Request $request)  {
        $validator = Validator::make($request->all(),
            [ 
                'id_habitacion' => 'required|integer',
                'id_reserva' => 'required|integer',
            ], 
            [
                'id_habitacion.required' => "El campo es requerio", 
                'id_reserva.required' => "El campo es requerio", 
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $usuario = auth()->user();

        $estado = [2];

        $estados_activos = EstadoHabitacion::whereIn('estado', $estado)
        ->where('habitacion_id', $request->id_habitacion)
        ->count();

        if($estados_activos>0){
            return response()->json(['error' => 'No se completo correctamente la accion porque la habitacion esta ocupada', 'code' => "warning"], 404);
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

        $filasActualizadas = EstadoHabitacion::where('habitacion_id', $request->habitacion_id)
        ->where('estado_id', 4)
        ->delete(); 

        if(!$filasActualizadas ){
            return response()->json(['error' => 'No se completo correctamente la accion', 'code' => "error"], 404);
        }

        $filasActualizadas = DetalleHabitacion::where('id', $request->id_reserva) 
        ->delete(); 

        if($filasActualizadas){ 
            return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]);  
        } else {
            return response()->json(['error' => 'No se completo correctamente la accion', 'code' => "error"], 404);
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

        $data = Habitacion::with(['habitacion_estado', 'detalle'])
        ->select('nombre', 'descripcion', 'diseno_json', 'piso', 'id')
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

}
