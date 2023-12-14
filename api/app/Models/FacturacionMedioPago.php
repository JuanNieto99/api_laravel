<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturacionMedioPago extends Model
{
    protected $primaryKey = 'id';

    protected $table='facturacion_medios_pagos'; 

    protected $fillable = [ 
        'facturacion_id',
        'metodo_pago_id', 
        'valor',
    ];
}
