<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecetaDetalle extends Model
{
    protected $primaryKey = 'id';

    protected $table='detalle_recetas'; 

    protected $fillable = [
        'producto_id', 
        'receta_id',
        'estado',  
    ];
}
