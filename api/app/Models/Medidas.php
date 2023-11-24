<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medidas extends Model
{
    protected $primaryKey = 'id';

    protected $table='medidas'; 

    protected $fillable = [
        'nombre',  
        'estado', 
    ];
}
