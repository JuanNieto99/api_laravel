<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class metodos_pago extends Model
{
    protected $primaryKey = 'id';

    protected $table='metodos_pagos'; 

    protected $fillable = [
        'nombre', 
        'estado', 
        'codigo_dian',
    ];
}
