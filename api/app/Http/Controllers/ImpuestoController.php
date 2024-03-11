<?php

namespace App\Http\Controllers;

use App\Models\Impuesto;
use App\Models\ImpuestoProducto;
use Illuminate\Http\Request;

class ImpuestoController extends Controller
{
    function getImpuestosDetalle () {
        
        $impuesto = Impuesto::where('estado', 1)->get();

        return [
            'impuesto' => $impuesto,
        ];
    }

    function guardarImpuesto(Request $request) {

        $producto_id = $request->producto_id;
        $impuesto_id = $request->impuesto_id;

        $insert = [
            'producto_id' => $producto_id,
            'impuesto_id' => $impuesto_id,
        ];

        $val = ImpuestoProducto::insert($insert );

        if($val){
            return [
                'msm' => 'Registro Exitoso',
                'val' => 'success',
            ];
        }

        return [
            'msm' => 'Error',
            'val' => 'error',
        ];
    }

    function indexImpuesto($producto_id) {

        $impuestoProducto = ImpuestoProducto::with(['impuesto'])
        ->where('producto_id', $producto_id)
        ->get();

        return [
            'impuestoProducto' => $impuestoProducto,
        ];
    }
}
