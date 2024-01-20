<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;

class PaisController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);
        $search = $request->query('search',false);

        $query = Pais::where('estado',1)->orderBy('nombre', 'asc');
        $query->where(function ($query) use ($search) { 
            $query->where('Pais.nombre', 'like', "%{$search}%");    
            $query->where('Pais.abreviatura', 'like', "%{$search}%");    
            $query->where('Pais.codigo_dian', 'like', "%{$search}%");    
        }); 
        return $per_page? $query->paginate($per_page) : $query->get();
    }

}
