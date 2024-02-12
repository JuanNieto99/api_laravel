<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCaja extends Model
{
    protected $primaryKey = 'id';

    protected $table='detalle_cajas'; 

    protected $fillable = [
        'tipo', 
        'estado',
        'usuario_id',  
        'facturacion_id',
        'caja_id',
        'precio',
        'metodo_pago_id',
        'caja_control_id',
        'operacion_id',
        'referencia_id',
        'created_at', 
    ];

    public function caja() {
        return $this->belongsTo(Caja::class, 'caja_id','id');
    }
}
