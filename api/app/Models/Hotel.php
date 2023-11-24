<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $primaryKey = 'id';

    protected $table='hotels'; 

    protected $fillable = [
        'nombre', 
        'direccion',
        'ciudad_id',
        'contacto',
        'contacto_telefono',
        'contacto_cargo',
        'telefono',
        'nit',
        'razon_social',
        'cantidad_habitaciones',
        'email',
        'tipo_contribuyente',
        'usuario_id',
        'imagen',
        'estado'
    ];
}
