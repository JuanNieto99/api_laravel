<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturacionImpuesto extends Model
{
    protected $primaryKey = 'id';

    protected $table='facturacion_impuesto'; 
    
    public $timestamps = false;

    protected $fillable = [ 
        'valor', 
        'factura_id',
        'impuesto_id',
        'porcentaje',  
    ];
}
