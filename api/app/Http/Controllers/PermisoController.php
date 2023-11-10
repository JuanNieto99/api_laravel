<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;

class PermisoController extends Controller
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
                'nombre' => 'required|string|max:50|unique:permisos',
                'codigo' => 'required|string|max:100', 
                'id_padre' => 'integer',
            ], 
            [
                'nombre.required' => "El campo es requerio",
                'nombre.max' => "La cantidad maxima del campo es 50",
                'nombre.unique' =>  "El nombre ya existe",
                'codigo.required' => "El campo es requerido",
                'codigo.max' => "La cantidad maxima del campo es 100", 
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $permiso = Permiso::create([
            'nombre' => $request->nombre,
            'codigo' => $request->codigo,
        ]);

        if($permiso){
            return response()
            ->json([
                'permiso' => $permiso,
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
    public function show(permiso $permiso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(permiso $permiso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, permiso $permiso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(permiso $permiso)
    {
        //
    }
}
