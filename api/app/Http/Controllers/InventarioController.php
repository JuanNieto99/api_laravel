<?php

namespace App\Http\Controllers;

use App\Models\DetalleHabitacionReserva;
use App\Models\Historial;
use App\Models\Hotel;
use App\Models\Inventario;
use App\Models\ProductoDetalle;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    { 
        $per_page = $request->query('per_page', 1);
        $search = $request->query('search',false);

        $query = Inventario::with(['hotel'=> function ($query) {
            $query->select('id','nombre');
        }])
        ->where('estado','!=',0)->orderBy('nombre', 'asc');

        $query->where(function ($query) use ($search) { 
            $query->where('inventarios.nombre', 'like', "%{$search}%");    
            $query->where('inventarios.descripcion', 'like', "%{$search}%");     
        }); 

        return $per_page? $query->paginate($per_page) : $query->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'nombre' => 'required|string|max:50',
                'descripcion' => 'required|string|max:200', 
                'hotel_id' => 'required|integer',
                'estado' => 'required|integer',
            ], 
            [
                'nombre.required' => "El campo es requerio",
                'nombre.max' => "La cantidad maxima del campo es 50",
                'descripcion.required' => "El campo es requerido",
                'hotel_id.required' => "El campo es requerido",
                'estado.required' => "El campo es requerido",
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $inventario = Inventario::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'hotel_id' => $request->hotel_id,
            'estado' => $request->estado, 
        ]);

        $json = [
            'asunto' => 'Inventario Crear',
            'adjunto' => [
                'respuesta' => !empty($inventario),
                'id' => $inventario->id,
            ],
        ];

        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 6,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),                     
        ]);

        if($inventario){
            return response()
            ->json([
                'inventario' => $inventario,
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
        $inventario = Inventario::where('estado',1)->find($id);

        if(!$inventario){
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }

        return $inventario;
    } 


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'nombre' => 'required|string|max:50',
                'descripcion' => 'required|string|max:200', 
                'hotel_id' => 'required|integer',
                'estado' => 'required|integer',
                'id' => 'required|integer',
            ], 
            [
                'nombre.required' => "El campo es requerio",
                'nombre.max' => "La cantidad maxima del campo es 50",
                'descripcion.required' => "El campo es requerido",
                'hotel_id.required' => "El campo es requerido",
                'estado.required' => "El campo es requerido", 
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        
        $filasActualizadas = Inventario::where('id', $request->id)
        ->update(
            [
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'hotel_id' => $request->hotel_id,
                'estado' => $request->estado, 
            ]
        );

        $json = [
            'asunto' => 'Inventario Actualizar',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
                'id' => $request->id,
            ],
        ];

        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 6,
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
        $filasActualizadas = Inventario::where('id', $request->id)
        ->update([ 
            'estado' => 0,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $json = [
            'asunto' => 'Inventario Eliminado',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
                'id' => $request->id,
            ],
        ];

        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 6,
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

    public function edit($id)
    {
        $inventario = Inventario::where('estado',1)->find($id);
        $hotel = Hotel::select('nombre','id')->where('estado','1')->get();

        if(!$inventario){
            return [ 
                'hotel' => $hotel,
            ];
        }

        return [ 
            'hotel' => $hotel,
            'inventario' => $inventario,
        ];
    } 


    public static function descontarInventario($id_detalle) {
        
        $detalle_habitacion = DetalleHabitacionReserva::where('tipo', 1)
        ->where('reserva_detalle_id', $id_detalle)
        ->get();

        $producto_detalle = [];

        foreach ($detalle_habitacion as $key => $value) {
            $producto_detalle [] = [
                'producto_id' => $value->item_id,
                'cantidad' => $value->cantidad,
                'estado' => 3
            ];
        } 
 
        if(count( $producto_detalle) > 0){ 
            ProductoDetalle::insert($producto_detalle); 
        }
        
    }

    public static function validarDisponibilidadProducto($producto_id, $cantidad)  {

        $productos = Productos::where('id', $producto_id)->select('sin_limite_cantidad', 'nombre')->first();

        $menseje = "";
        $validacion = false;

        if( $productos->sin_limite_cantidad == '1' ){
            $agregados = ProductoDetalle::where('producto_id', $producto_id)
            ->where('estado', 2)
            ->select(DB::raw('SUM(cantidad) as cantidad'))            
            ->first();
    
            $usados = ProductoDetalle::where('producto_id', $producto_id)
            ->where('estado', 3)
            ->select(DB::raw('SUM(cantidad) as cantidad'))            
            ->first();
            Log::debug($agregados);
            Log::debug($usados);

            $cantidad_agregada = $agregados->cantidad ? $agregados->cantidad : 0;
            $cantidad_usada = $usados->cantidad ? $usados->cantidad : 0;
            $cantidad_actual =   $cantidad_agregada - $cantidad_usada;

            if($cantidad_actual < $cantidad) {
                $menseje = "La cantidad agregada del producto ".$productos->nombre." sobre pasa al stock";
                $validacion = true;
            }
        }
 

        return [
            'mensaje' => $menseje,
            'validacion' => $validacion, 
        ];
    }
    
}
