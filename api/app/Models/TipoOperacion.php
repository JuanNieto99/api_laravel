<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoOperacion extends Model
{
    const FACTURACION = 1;

    protected $primaryKey = 'id';
    protected $table='tipo_operacion'; 

    protected $fillable = [
        'nombre',  
        'estado', 
    ];
}
