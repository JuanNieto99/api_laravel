<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $primaryKey = 'id';

    protected $table='clientes'; 

    protected $fillable = [
        'nombre', 
        'apellidos',
        'tipo', 
        'ciudad_id', 
        'tipo_documento', 
        'numero_documento', 
        'genero', 
        'estado_civil',
        'barrio_residencia',
        'fecha_nacimiento',
        'telefono',
        'celular',
        'nivel_studio',
        'correo',
        'observacion',
        'usuario_create_id',
        'usuario_update_id'
    ];
}
