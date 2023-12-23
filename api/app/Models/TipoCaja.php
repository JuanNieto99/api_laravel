<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCaja extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $table='tipo_cajas'; 

    protected $fillable = [
        'nombre', 
        'descripcion', 
        'estado', 
    ];
}
