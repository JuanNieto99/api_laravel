<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelEstudio extends Model
{
    protected $primaryKey = 'id';

    protected $table='nivel_estudios'; 

    protected $fillable = [
        'nombre', 
        'estado', 
    ];
}
