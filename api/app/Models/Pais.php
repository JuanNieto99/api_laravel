<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $primaryKey = 'id';

    protected $table='pais'; 

    protected $fillable = [
        'nombre', 
        'estado', 
        'extension',
        'abreviatura',
        'codigo_telefono',
        'codigo_dian'
    ];
}
