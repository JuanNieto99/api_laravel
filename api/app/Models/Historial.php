<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $primaryKey = 'id';

    protected $table='historials'; 

    protected $fillable = [
        'id', 
        'data_json',
        'tipo', 
        'usuario_id',  
    ];

}
