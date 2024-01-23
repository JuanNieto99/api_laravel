<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $primaryKey = 'id';

    protected $table='estados'; 

    protected $fillable = [
        'nombre',
        'descripcion',
        'modulo_id',
        'estado'
    ];
}
