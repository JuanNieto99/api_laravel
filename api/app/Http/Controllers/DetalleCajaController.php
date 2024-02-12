<?php

namespace App\Http\Controllers;

use App\Models\ControlCaja;
use App\Models\DetalleCaja;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\Historial;

class DetalleCajaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);
        $search = $request->query('search',false);

        $query = ControlCaja::with(['caja.tipoCajas' => function ($query) {
            $query->select('id', 'nombre');
        }])  
        ->select('cajas_control.*')
        ->join('cajas','cajas.id', 'cajas_control.caja_id')
        ->join('tipo_cajas','tipo_cajas.id', 'cajas.tipo') 
        ->orderBy('cajas_control.id', 'desc');
        
        if(!empty($search) && $search!=null){
            
            $query->where(function ($query) use ($search) { 
                $query->where('cajas.nombre', 'like', "%{$search}%"); 
                $query->orWhere('tipo_cajas.nombre', 'like', "%{$search}%");  
                $query->orWhere('cajas_control.cierre_caja', 'like', "%{$search}%");  
            }); 
            
        }
        
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
    public function show(detalleCaja $detalleCaja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(detalleCaja $detalleCaja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, detalleCaja $detalleCaja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $filasActualizadas = ControlCaja::where('id', $request->id)
        ->update([ 
            'estado' => 0,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $json = [
            'asunto' => 'Control Caja Anulada',
            'adjunto' => [
                'respuesta' => !empty($filasActualizadas),
                'id' => $request->id,
                'data' =>  $request,
            ],
        ];

        $usuario = auth()->user();
        
        Historial::insert([
            'tipo' => 12,
            'data_json' => json_encode($json),
            'usuario_id' => $usuario->id,    
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),                 
        ]);

        if ($filasActualizadas > 0) {
            // La actualización fue exitosa
            return response()->json(['mensaje' => 'Actualización exitosa', 'code' => "success"]);
        } else {
            // No se encontró un usuario con el ID proporcionado
            return response()->json(['error' => 'Registro no encontrado', 'code' => "error"], 404);
        }
    }
}
