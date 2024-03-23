<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
    const PRODUCTO = 1;
    const SERVICIO = 2;
    const TARIFA = 3;
    const RECETA = 4;

    protected $primaryKey = 'id';

    protected $table='tipo_servicio'; 

    protected $fillable = [
        'nombre',  
        'estado', 
    ];
}
