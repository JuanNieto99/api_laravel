<?php

namespace App\Http\Controllers;

use App\Models\DetalleHabitacion;
use App\Models\DetalleHabitacionReserva;
use App\Models\Facturacion;
use App\Models\TipoServicio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PDF;

class ReporteController extends Controller
{
    function reporteFacturacionRemision($id) { 

        $factura = Facturacion::with(['hotel', 'cliente', 'impuestos'])->find($id);
 
        $imagen = $factura->hotel->imagen;
        $ruta_imagen = ''; 
        $impuestos_factura = $factura->impuestos;

        if($imagen == 'defaultHotel.jpg'){
            $ruta_imagen = str_replace("\u005C",'',base64_encode(file_get_contents(storage_path("app/public/config/defaultHotel.jpg")))) ;
        } else  {
            $ruta_imagen = 'imagenes/hoteles/'.$imagen;
        } 

        $fecha_hoy = Carbon::now();
 
        $detalleHabitacion = DetalleHabitacion::where('facturacion_id', $id)
        ->select('id','facturacion_id')
        ->first();

        $productos_detalle_tarifa = DetalleHabitacionReserva::with(['tarifa'])
        ->where('tipo', TipoServicio::TARIFA)
        ->where('reserva_detalle_id', $detalleHabitacion->id)->get();

        $productos_detalle_producto = DetalleHabitacionReserva::with(['productos'])
        ->where('tipo', TipoServicio::PRODUCTO)
        ->where('reserva_detalle_id', $detalleHabitacion->id)->get();

        $productos_detalle_receta = DetalleHabitacionReserva::with(['recetas'])
        ->where('tipo', TipoServicio::RECETA)
        ->where('reserva_detalle_id', $detalleHabitacion->id)->get();

        $productos_detalle_servicio = DetalleHabitacionReserva::with(['productos'])
        ->where('tipo', TipoServicio::SERVICIO)
        ->where('reserva_detalle_id', $detalleHabitacion->id)->get();

        $productos_detalle = [];
        
        foreach ($productos_detalle_tarifa as $key => $value) {  

            $impuestos_total = 0;

            if(!empty($impuestos_factura)) {
                foreach ($impuestos_factura as $key => $value_impuesto) {
                    if($value_impuesto['tipo'] == TipoServicio::TARIFA ){
                        $impuestos_total = $impuestos_total + $value_impuesto['valor'];
                    }
                }
            } 

            $productos_detalle [] = [
                'nombre' => $value['tarifa']['nombre'],
                'valor' => $value['valor'],
                'tipo' => 'Tarifa',
                'cantidad' => $value['cantidad'],
                'impuesto' => $impuestos_total,
            ];
        }
 
        foreach ($productos_detalle_producto as $key => $value) {  

            $impuestos_total = 0;

            if(!empty($impuestos_factura)) {
                foreach ($impuestos_factura as $key => $value_impuesto) {
                    if($value_impuesto['tipo'] == TipoServicio::PRODUCTO ){
                        $impuestos_total = $impuestos_total + $value_impuesto['valor'];
                    }
                }
            }  

            $productos_detalle [] = [
                'nombre' => $value['productos']['nombre'],
                'valor' => $value['valor'],
                'tipo' => 'Productos',
                'cantidad' => $value['cantidad'],
                'impuesto' => $impuestos_total,
            ];
        }

        foreach ($productos_detalle_receta as $key => $value) {  

            $impuestos_total = 0;

            if(!empty($impuestos_factura)) {
                foreach ($impuestos_factura as $key => $value_impuesto) {
                    if($value_impuesto['tipo'] == TipoServicio::RECETA ){
                        $impuestos_total = $impuestos_total + $value_impuesto['valor'];
                    }
                }
            }  

            $productos_detalle [] = [
                'nombre' => $value['recetas']['nombre'],
                'valor' => $value['valor'],
                'tipo' => 'Recetas',
                'cantidad' => $value['cantidad'],
                'impuesto' => $impuestos_total,
            ];
        }

        foreach ($productos_detalle_servicio as $key => $value) {  

            $impuestos_total = 0;

            if(!empty($impuestos_factura)) {
                foreach ($impuestos_factura as $key => $value_impuesto) {
                    if($value_impuesto['tipo'] == TipoServicio::SERVICIO ){
                        $impuestos_total = $impuestos_total + $value_impuesto['valor'];
                    }
                }
            }  

            $productos_detalle [] = [
                'nombre' => $value['productos']['nombre'],
                'valor' => $value['valor'],
                'tipo' => 'Servicio',
                'cantidad' => $value['cantidad'],
                'impuesto' => $impuestos_total,
            ];
        }

        $pdf = PDF::loadView('PDF/facturaRemision', ['factura' => $factura, 'ruta_imagen' => 'data:image/jpeg;base64,'.$ruta_imagen, 'fecha_actual' => $fecha_hoy->format('Y-m-d H:i:s'), 'productos_detalle'=> $productos_detalle]);
        return $pdf->stream('remision_'.$factura->secuencia_factura_interna.'.pdf');
    }
}
