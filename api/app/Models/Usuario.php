<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    
    protected $primaryKey = 'id';

    protected $table='usuarios'; 

    protected $fillable = [
        'usuario', 
        'email',
        'password',
        'rol_id',
        'estado',
    ];
}
