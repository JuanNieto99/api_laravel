<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoHabitacion extends Model
{
    protected $primaryKey = 'id';

    protected $table='estado_habitacion'; 

    protected $fillable = [ 
        'estado_id',
        'habitacion_id',
        'estado_habitacion',
        'fecha_inicio',
        'fecha_final',
        'descripcion',
        'empleado_id'
    ];
}
