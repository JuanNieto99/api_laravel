<?php

namespace App\Http\Controllers;

use App\Models\TiposContribuyentes;
use Illuminate\Http\Request;

class TipoContribuyenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);
        $search = $request->query('search',false);

        $query = TiposContribuyentes::where('estado',1)->orderBy('nombre', 'asc');
        $query->where(function ($query) use ($search) {
            $query->where('tipo_contribuyente.nombre', 'like', "%{$search}%");     
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
    public function show(TiposContribuyentes $tiposContribuyentes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TiposContribuyentes $tiposContribuyentes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TiposContribuyentes $tiposContribuyentes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TiposContribuyentes $tiposContribuyentes)
    {
        //
    }
}
