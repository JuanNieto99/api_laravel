<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];
}
