<?php

namespace App\Http\Controllers;

use App\Models\Consumo;
use App\Models\ProductoDetalle;
use App\Models\Productos;
use App\Models\Receta;
use App\Models\RecetaDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon; 
class ConsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);
        $search = $request->query('search',false);

        $query = Consumo::with([
            'usuario'=> function ($query) {
                $query->select('id', 'usuario');
            },
            'cliente'=> function ($query) {
                $query->select('id', 'nombres', 'apellidos');
            },
            'hotel'=> function ($query) {
                $query->select('id', 'nombre');
            }
        ])
        ->join('clientes', 'clientes.id', 'consumos.cliente_id')
        ->join('usuarios', 'usuarios.id', 'consumos.usuario_id')
        ->join('hotels', 'hotels.id', 'consumos.hotel_id')
        ->select('consumos.*')
        ->where('consumos.estado','!=',0)->orderBy('consumos.id', 'asc');


        if(!empty($search) && $search!=null){
            
            $query->where(function ($query) use ($search) { 
                $query->where('ciudads.nombre', 'like', "%{$search}%");    
                $query->orWhere('clientes.nombre', 'like', "%{$search}%");   
                $query->orWhere('clientes.apellidos', 'like', "%{$search}%");   
                $query->orWhere('usuarios.nombre', 'like', "%{$search}%");   
                $query->orWhere('hotels.nombre', 'like', "%{$search}%");   
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
            'usuario_id' => 'required|integer',
            'cliente_id' => 'required|integer',
            'detalle_habitacion_id' => 'required|integer',
            'consumido_id' => 'required|integer', 
            'tipo_consumido' => 'required|integer', 
            'cantidad' => 'required|integer',
            'hotel_id' => 'required|integer',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        } 

        $precio = 0;

        switch ($request->tipo_consumido) {
            case '1':
                //receta 
                $receta = Receta::where('id', $request->consumido_id)->select('precio')->first();
                $precio = $receta['precio'];
                
            break;

            case '2':
                //producto 
                $producto = Productos::where('id', $request->consumido_id)->select('precio')->first();
                $precio = $producto['precio'];

            break; 

        }

        $consumo = Consumo::create([
            'usuario_id' => $request->usuario_id,
            'cliente_id' => $request->cliente_id,
            'detalle_habitacion_id' => $request->detalle_habitacion_id,
            'consumido_id' => $request->consumido_id,
            'tipo_consumido' => $request->tipo_consumido, 
            'precio' => $precio,
            'cantidad' => $request->cantidad, 
            'hotel_id' => $request->hotel_id, 
            'estado' => '1'
        ]);
        

        if($consumo){

            switch ($request->tipo_consumido) {
                case '1':
                    //receta 
                    $productos = RecetaDetalle::where('receta_id', $request->consumido_id)
                    ->where('estado', 1)
                    ->select('producto_id','cantidad');

                    $productos_dettalle_array = [];

                    foreach ($productos as $key => $value) { 
                        $productos_dettalle_array [] = [
                            'producto_id' => $value['producto_id'],
                            'cantidad' => $value['cantidad'],
                            'estado' => 0,
                        ];
                    }

                    RecetaDetalle::insert($productos_dettalle_array);
                    
                break;

                case '2':
                    //producto 
                    ProductoDetalle::create([
                        'producto_id' => $request->consumido_id,
                        'cantidad' => $request->cantidad,
                        'estado' => 0,
                    ]);
                    
                    
                break; 

            }

            return response()
            ->json([
                'consumo' => $consumo,
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
        $consumo = Consumo::where('estado',1)->find($id);
        
        if(!$consumo){
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }
        
        return $consumo;
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(consumo $consumo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, consumo $consumo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $filasActualizadas = Consumo::where('id', $request->id)
        ->update([ 
            'estado' => 0,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        ProductoDetalle::create([
            'producto_id' => $request->id,
            'cantidad' => 1,
            'estado' => 1,
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
