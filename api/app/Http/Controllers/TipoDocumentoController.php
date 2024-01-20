<?php

namespace App\Http\Controllers;

use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);
        $search = $request->query('search',false);

        $query = TipoDocumento::where('estado',1)->orderBy('nombre', 'asc');
        $query->where(function ($query) use ($search) {
            $query->where('tipo_documentos.nombre', 'like', "%{$search}%");     
            $query->orWhere('tipo_documentos.nombre_abreviado', 'like', "%{$search}%"); 
            $query->orWhere('tipo_documentos.codigo_dian', 'like', "%{$search}%");      
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
    public function show(TipoDocumento $tipo_documento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoDocumento $tipo_documento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoDocumento $tipo_documento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoDocumento $tipo_documento)
    {
        //
    }
}
