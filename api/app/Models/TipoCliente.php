<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCliente extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $table='tipo_cliente'; 

    protected $fillable = [
        'nombre',   
        'estado', 
    ]; 
}
