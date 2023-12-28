<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $primaryKey = 'id';

    protected $table='ciudads'; 

    protected $fillable = [
        'nombre', 
        'departamento_id',
        'codigo_dane', 
        'ciudad_id',  
        'estado',
    ];
}
