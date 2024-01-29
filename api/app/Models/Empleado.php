<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $primaryKey = 'id';

    protected $table='empleados'; 

    protected $fillable = [ 
        'nombres',
        'apellidos',
        'tipo_documento_id',
        'numero_documento',
        'celular',
        'genero_id',
        'usuario_create_id',
        'usuario_update_id',
        'estado',
        'hotel_id'
    ];
}
