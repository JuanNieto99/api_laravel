<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleHabitacion extends Model
{
    protected $primaryKey = 'id';

    protected $table='detalle_habitacions'; 

    protected $fillable = [ 
        'usuario_id',
        'cliente_id',
        'habitacion_id',
        'checkout',
        'checkin',
        'fecha_inicio',
        'fecha_salida',
        'estado'
    ];

    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class, 'habitacion_id','id');
    }
}
