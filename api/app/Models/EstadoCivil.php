<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $primaryKey = 'id';

    protected $table='estado_civils'; 

    protected $fillable = [ 
        'nombre',
        'estado',
    ];
}
