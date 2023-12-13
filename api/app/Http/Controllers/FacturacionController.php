<?php

namespace App\Http\Controllers;

use App\Models\Consumo;
use App\Models\Facturacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;

class FacturacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 1);

        $query = Facturacion::where('estado',1)->orderBy('id', 'desc');

        return $per_page? $query->paginate($per_page) : $query->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[ 
                'consumos' => 'required|string',
                'concepto' => 'required|string',
                'descripcion' => 'string',
            ], 
            [
                'consumos.required' => "El campo es requerio", 
                'concepto.required' => "El campo es requerio", 
            ]    
        );

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        if($request->consumos){
            $consumos_array = explode(',',$request->consumos);

            $consumos = Consumo::whereIn('id', $consumos_array)
            ->where('estado',1)
            ->get();

            $sub_total = 0;
            $total = 0;
            $iva_total = 0;
            $descuento = $request->porcentaje_descuento;

            foreach ($consumos as $key => $value) { 
                $sub_total += $value; 
            }
            

            $total = $sub_total;

            if($descuento >0 ){
                $total =  $sub_total * $descuento /100; 
            } 

            $factura = [
                'concepto' => $request->concepto,
                'descripcion' => $request->descripcion,
                'sub_total' => $sub_total,
                'total' => $total,
                'iva' => $iva_total,
                'metodo_pago_id' => $request->metodo_pago_id,
                'cliente_id' => $request->cliente_id,
                'cliente_id' => $request->cliente_id,
                'porcentaje_descuento' => $descuento,
                'estado' => 1,
            ];

            $insertado = Facturacion::create( $factura );

            if($insertado ){ 
                //pasa el consumo a estado facturado
                Consumo::whereIn('id', $consumos_array)->update([
                    'estado' => 3
                ]);

                return response()->json(['mensaje' => 'Factura exitosa', 'code' => "success"]);
            } else {
                return response()->json(['error' => 'Error', 'code' => "error"], 404);
            }

        }

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
    public function show(facturacion $facturacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(facturacion $facturacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, facturacion $facturacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(facturacion $facturacion)
    {
        //
    }
}
