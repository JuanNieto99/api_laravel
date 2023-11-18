<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $primaryKey = 'id';

    protected $table='clientes'; 

    protected $fillable = [
        'nombres', 
        'apellidos',
        'tipo', 
        'ciudad_id', 
        'tipo_documento_id', 
        'numero_documento', 
        'genero_id', 
        'estado_civil_id',
        'barrio_residencia',
        'fecha_nacimiento',
        'telefono',
        'celular',
        'nivel_studio_id',
        'correo',
        'observacion',
        'usuario_create_id',
        'usuario_update_id',
        'estado'
    ];
}
