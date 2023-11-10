<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $primaryKey = 'id';

    protected $table='rols'; 

    protected $fillable = [
        'nombre', 
        'descripcion',
        'estado', 
    ];
}
