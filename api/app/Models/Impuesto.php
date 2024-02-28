<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impuesto extends Model
{
    protected $primaryKey = 'id';

    protected $table='impuestos'; 

    protected $fillable = [
        'id', 
        'nombre', 
        'descripcion',
        'hotel_id',
        'porcentaje',
        'estado'
    ];

}
