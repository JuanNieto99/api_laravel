<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturacion extends Model
{
    protected $primaryKey = 'id';

    protected $table='facturacions'; 

    protected $fillable = [ 
        'concepto', 
        'total',
        'sub_total',
        'impuesto_total', 
        'cliente_id',
        'porcentaje_descuento',
        'cufe',
        'hotel_id',
        'estado',  
        'secuencia_factura_interna',
        'secuencia_factura_externa',
        'secuencia_externa',
        'secuencia_interna'
    ];

    public function facturacion_medio_pago(){
        return $this->belongsTo(FacturacionMedioPago::class, 'id','facturacion_id');
    }

    public function cliente() {
        return $this->belongsTo(Cliente::class); 
    }

    public function hotel() {
        return $this->belongsTo(Hotel::class); 
    } 

    function impuestos () {
        return $this->hasMany(FacturacionImpuesto::class, 'factura_id','id' );
    }

  
}
