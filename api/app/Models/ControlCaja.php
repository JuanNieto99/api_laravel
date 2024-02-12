<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlCaja extends Model
{
    protected $primaryKey = 'id';

    protected $table='cajas_control'; 

    protected $fillable = [
        'caja_id', 
        'abrir_caja',
        'cierre_caja',  
        'abrir_saldo',
        'cierre_saldo',
        'diferencia',
        'usuario_id_abre',
        'usuario_id_cierra',
        'estado',
    ];

    public function detalleCajas() {
        return $this->belongsTo(DetalleCaja::class,'id','habitacion_id');
    }
    
    public function caja() {
        return $this->belongsTo(Caja::class, 'caja_id','id');
    }
}
