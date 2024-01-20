<?php

namespace App\Http\Controllers;

use App\Models\estadoCivil;
use Illuminate\Http\Request;

class EstadoCivilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);
        $search = $request->query('search',false);

        $query = estadoCivil::where('estado',1)
        ->orderBy('nombre', 'asc');



        if(!empty($search) && $search!=null){
            
            $query->where(function ($query) use ($search) { 
                $query->where('estado_civils.nombre', 'like', "%{$search}%");    
            }); 
            
        }

        return $per_page? $query->paginate($per_page) : $query->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(estadoCivil $estado_civil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(estadoCivil $estado_civil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, estadoCivil $estado_civil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(estadoCivil $estado_civil)
    {
        //
    }
}
