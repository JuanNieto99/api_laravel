<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecuenciaExterna extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $table='secuencia_externa'; 

    protected $fillable = [
        'hotel_id', 
        'prefijo', 
        'fecha_inicio',  
        'fecha_final',  
        'secuensia_incial',
        'secuencia_final',
        'usuario_id_crea',
        'usuario_id_actualiza',
        'secuensia_actual',
        'estado'
    ];

    public function hotel() { 
        return $this->belongsTo(Hotel::class,'hotel_id','id');
    }
}
