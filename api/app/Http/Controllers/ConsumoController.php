<?php

namespace App\Http\Controllers;

 
use App\Models\Consumo;
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

        $query = Consumo::where('estado',1)->orderBy('nombre', 'asc');

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
            'habitacion_id' => 'required|integer',
            'consumido_id' => 'required|integer',
            'tipo_consumido' => 'required|integer',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        } 

        $consumo = Consumo::create([
            'usuario_id' => $request->usuario_id,
            'cliente_id' => $request->cliente_id,
            'habitacion_id' => $request->habitacion_id,
            'consumido_id' => $request->consumido_id,
            'tipo_consumido' => $request->tipo_consumido,
            'precio' => $request->precio,
            'cantidad' => $request->cantidad, 
            'estado' => '1'
        ]);
        

        if($consumo){
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

        if ($filasActualizadas > 0) {
            // La actualización fue exitosa
            return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]);
        } else {
            // No se encontró un usuario con el ID proporcionado
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }
    }
}
