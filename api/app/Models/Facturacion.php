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
        'descripcion',
        'total',
        'sub_total',
        'iva', 
        'cliente_id',
        'porcentaje_descuento',
        'cufe',
        'hotel_id',
        'estado',  
    ];

    public function facturacion_medio_pago(){
        return $this->belongsTo(FacturacionMedioPago::class, 'id','facturacion_id');
    }
}
