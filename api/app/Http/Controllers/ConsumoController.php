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
    public function index()
    {
        //
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(consumo $consumo)
    {
        //
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
    public function destroy(consumo $consumo)
    {
        //
    }
}
