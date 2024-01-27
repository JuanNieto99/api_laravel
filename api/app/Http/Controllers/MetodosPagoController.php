<?php

namespace App\Http\Controllers;

use App\Models\MetodosPago;
use Illuminate\Http\Request;

class MetodosPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);
        $search = $request->query('search',false);

        $query = MetodosPago::where('estado',1)->orderBy('nombre', 'asc');

        $query->where(function ($query) use ($search) { 
            $query->where('metodos_pagos.nombre', 'like', "%{$search}%");    
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
    public function show(metodos_pago $metodos_pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(metodos_pago $metodos_pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, metodos_pago $metodos_pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(metodos_pago $metodos_pago)
    {
        //
    }
}
