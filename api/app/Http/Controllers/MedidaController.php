<?php

namespace App\Http\Controllers;

use App\Models\Medidas;
use Illuminate\Http\Request;

class MedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);
        $search = $request->query('search',false);

        $query = Medidas::where('estado',1)->orderBy('nombre', 'asc');

        $query->where(function ($query) use ($search) { 
            $query->where('medidas.nombre', 'like', "%{$search}%");    
        }); 
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
    public function show(Medidas $medidas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medidas $medidas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medidas $medidas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medidas $medidas)
    {
        //
    }
}
