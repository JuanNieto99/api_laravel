<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumo extends Model
{
    protected $primaryKey = 'id';

    protected $table='consumos'; 

    protected $fillable = [
        'usuario_id', 
        'cliente_id', 
        'habitacion_id', 
        'consumido_id', 
        'tipo_consumido', 
        'precio',
        'cantidad',
    ];
}
