<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoServicioModel extends Model
{
    protected $primaryKey = 'id';

    protected $table='tipo_servicio'; 

    protected $fillable = [
        'nombre',  
        'estado', 
    ];
}
