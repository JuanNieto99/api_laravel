<?php

namespace App\Http\Controllers;

use App\Models\nivelEstudio;
use Illuminate\Http\Request;

class NivelEstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);

        $query = nivelEstudio::where('estado',1)->orderBy('nombre', 'asc');

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
    public function show(nivelEstudio $nivel_estudio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(nivelEstudio $nivel_estudio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, nivelEstudio $nivel_estudio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(nivelEstudio $nivel_estudio)
    {
        //
    }
}
