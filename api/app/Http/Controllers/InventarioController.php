<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;
class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    { 
        $per_page = $request->query('per_page', 1);

        $query = Inventario::where('estado','!=',0)->orderBy('nombre', 'asc');

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
    
}
