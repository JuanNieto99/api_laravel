<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumo extends Model
{
    protected $primaryKey = 'id';

    protected $table='consumos'; 

    protected $fillable = [
        'usuario_id', 
        'cliente_id', 
        'detalle_habitacion_id', 
        'consumido_id', 
        'tipo_consumido', 
        'precio',
        'cantidad',
        'estado',
        'hotel_id',
    ];

    function usuario() {
        return $this->belongsTo(Usuario::class);    
    }


    function cliente() {
        return $this->belongsTo(Cliente::class);    
    }

    public function hotel() {
        return $this->belongsTo(Hotel::class);    
    }
}
