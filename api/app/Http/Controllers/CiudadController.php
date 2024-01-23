<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);
        $search = $request->query('search',false);

        $query = Ciudad::where('estado',1)
        ->select('ciudads.*')
        ->join('departamentos','departamentos.id', 'ciudads.departamento_id')
        ->orderBy('ciudads.nombre', 'asc');

        if(!empty($search) && $search!=null){
            
            $query->where(function ($query) use ($search) { 
                $query->where('ciudads.nombre', 'like', "%{$search}%");   
                $query->orWhere('ciudads.codigo_dane', 'like', "%{$search}%");   
                $query->orWhere('departamentos.nombre', 'like', "%{$search}%");   
            }); 
            
        }
        
        return $per_page? $query->paginate($per_page) : $query->get();
    }

    public function indexGetByDepartamento (Request $request)  {
        $id = $request->id;

        return  Ciudad::where('departamento_id', $id)->get();
    }
}
