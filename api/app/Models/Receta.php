<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $primaryKey = 'id';

    protected $table='recetas'; 

    protected $fillable = [
        'nombre', 
        'descripcion',
        'imagen',
        'precio', 
        'estado',  
        'hotel_id',    
    ];
}
