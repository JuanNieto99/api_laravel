<?php

namespace App\Http\Controllers;

use App\Models\estado_civil;
use Illuminate\Http\Request;

class EstadoCivilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);

        $query = estado_civil::where('estado',1)->orderBy('nombre', 'asc');

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
    public function show(estado_civil $estado_civil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(estado_civil $estado_civil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, estado_civil $estado_civil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(estado_civil $estado_civil)
    {
        //
    }
}
