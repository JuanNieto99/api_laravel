<?php

namespace App\Http\Controllers;

use App\Models\Facturacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PDF;

class ReporteController extends Controller
{
    function reporteFacturacionRemision($id) { 

        $factura = Facturacion::with(['hotel', 'cliente'])->find($id);
        
        $imagen = $factura->hotel->imagen;
        $ruta_imagen = ''; 

        if($imagen == 'defaultHotel.jpg'){
            $ruta_imagen = str_replace("\u005C",'',base64_encode(file_get_contents(storage_path("app/public/config/defaultHotel.jpg")))) ;
        } else  {
            $ruta_imagen = 'imagenes/hoteles/'.$imagen;
        } 

        $fecha_hoy = Carbon::now();

        $pdf = PDF::loadView('PDF/facturaRemision', ['factura' => $factura, 'ruta_imagen' => 'data:image/jpeg;base64,'.$ruta_imagen, 'fecha_actual' => $fecha_hoy->format('Y-m-d H:i:s')]);
        return $pdf->stream('remision_'.$factura->secuencia_factura_interna.'.pdf');
    }
}
