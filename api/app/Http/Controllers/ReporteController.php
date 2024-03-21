<?php

namespace App\Http\Controllers;

use App\Models\Facturacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PDF;

class ReporteController extends Controller
{
    function reporteFacturacionRemision($id) {
        Log::debug($id);

        $factura = Facturacion::with(['hotel', 'cliente'])->find($id);
        
        $imagen = $factura->hotel->imagen;
        $ruta_imagen = ''; 

        if($imagen == 'defaultHotel.jpg'){
            $ruta_imagen = str_replace("\u005C",'',base64_encode(file_get_contents(storage_path("app/public/config/defaultHotel.jpg")))) ;
        } else  {
            $ruta_imagen = 'imagenes/hoteles/'.$imagen;
        } 
        $pdf = PDF::loadView('PDF/facturaRemision', ['factura' => $factura, 'ruta_imagen' => 'data:image/jpeg;base64,'.$ruta_imagen]);
        return $pdf->stream('remision_'.$factura->secuencia_factura_interna.'.pdf');
    }
}
