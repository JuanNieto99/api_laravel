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
        'secuencia_incial',
        'secuencia_final',
        'usuario_id_crea',
        'usuario_id_actualiza',
        'secuencia_actual',
        'estado',
        'tipo_operacion_id',
    ];

    public function hotel() { 
        return $this->belongsTo(Hotel::class,'hotel_id','id');
    }

    public function tipo_operacion() {
        return $this->belongsTo(TipoOperacion::class,'tipo_operacion_id','id');
    }
}
