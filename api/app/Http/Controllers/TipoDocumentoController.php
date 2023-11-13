<?php

namespace App\Http\Controllers;

use App\Models\tipo_documento;
use Illuminate\Http\Request;

class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);

        $query = tipo_documento::where('estado',1)->orderBy('nombre', 'asc');

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
    public function show(tipo_documento $tipo_documento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tipo_documento $tipo_documento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tipo_documento $tipo_documento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tipo_documento $tipo_documento)
    {
        //
    }
}
