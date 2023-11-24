<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetalleHabitacion;

class Habitacion extends Model
{
    protected $primaryKey = 'id';

    protected $table='habitacions'; 

    protected $fillable = [
        'nombre', 
        'descripcion',
        'diseno_json', 
        'estado',  
        'tipo', 
        'capacidad_personas', 
        'precio', 
        'usuario_modifica',
        'estado'
    ];

    public function detalle()
    {
        return $this->belongsTo(DetalleHabitacion::class,'id','habitacion_id');
    }
}
