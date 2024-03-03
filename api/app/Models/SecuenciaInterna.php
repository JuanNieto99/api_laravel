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
        'secuencia_incial', 
        'secuencia_actual',
        'usuario_id_crea', 
        'usuario_id_actualiza', 
        'estado'
    ];

    public function hotel() { 
        return $this->belongsTo(Hotel::class,'hotel_id','id');
    }
}
