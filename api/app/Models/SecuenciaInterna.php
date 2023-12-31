<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecuenciaInterna extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $table='secuencia_interna'; 

    protected $fillable = [
        'hotel_id', 
        'descripcion_secuencia', 
        'secuensia_incial', 
        'secuensia_actual',
        'usuario_id_crea', 
        'usuario_id_actualiza', 
        'estado'
    ];
}
