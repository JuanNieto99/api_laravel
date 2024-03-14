<?php

namespace App\Http\Controllers;

use App\Models\Impuesto;
use App\Models\ImpuestoProducto;
use Illuminate\Http\Request;

class ImpuestoController extends Controller
{
    function getProductoImpuesto () {
        
        $impuestos = Impuesto::where('estado', 1)->get();

        return [
            'impuestos' => $impuestos,
        ];
    }

    function guardarImpuesto(Request $request) {

        $impuesto = $request->impuestos;
        $id = $request->id;
        
        ImpuestoProducto::where('producto_id', $id)->delete();
        $insert = [];
        foreach ($impuesto as $key => $value) {
            $insert[] = [
                'producto_id' => $id,
                'impuesto_id' => $value['id'],
            ];
        }

        $val = ImpuestoProducto::insert($insert);

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
