<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoDetalle extends Model
{
    protected $primaryKey = 'id';

    protected $table='productos_detalle'; 

    protected $fillable = [
        'producto_id', 
        'cantidad',
        'estado', 
    ];
}
