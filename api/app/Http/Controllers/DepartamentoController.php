<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento; 

class DepartamentoController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);
        $search = $request->query('search',false);

        $query = Departamento::with(['pais'])        
        ->where('estado',1)
        ->join('pais', 'pais.id', 'departamentos.pais_id')
        ->select('departamentos.*')
        ->orderBy('departamentos.nombre', 'asc');


        if(!empty($search) && $search!=null){
            
            $query->where(function ($query) use ($search) { 
                $query->where('pais.nombre', 'like', "%{$search}%");   
                $query->orWhere('departamentos.codigo_dane', 'like', "%{$search}%");  
            }); 
            
        }

        return $per_page? $query->paginate($per_page) : $query->get();
    }

    public function indexGetByPais(Request $request)  {
        $id = $request->id;

        return  Departamento::where('pais_id', $id)->get();

    }
}
