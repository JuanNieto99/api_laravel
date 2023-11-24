<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $primaryKey = 'id';

    protected $table='productos'; 

    protected $fillable = [
        'nombre', 
        'descripcion',
        'imagen',
        'precio',
        'cantidad',
        'estado',
        'inventario_id',
        'sin_limite_cantidad',
        'medida_id',
    ];
}
