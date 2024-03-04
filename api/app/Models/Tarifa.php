<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    protected $primaryKey = 'id';

    protected $table='tarifas'; 

    protected $fillable = [ 
        'nombre',
        'valor',
        'hotel_id',
        'tipo_habitacion_id',
        'cantidad',
        'tipo',
        'usuario_create_id',
        'usuario_update_id',
        'estado', 
        'descripcion',
        'created_at',
    ];

    public function detalle()
    {

    }

    public function hotel() {
    
        return $this->belongsTo(Hotel::class,'hotel_id','id');
    }

    public function tipoHabitacion() {
        return $this->belongsTo(TiposHabitaciones::class,'tipo_habitacion_id','id');
    }
}
