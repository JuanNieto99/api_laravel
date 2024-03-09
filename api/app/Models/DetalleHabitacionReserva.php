<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleHabitacionReserva extends Model
{
    protected $primaryKey = 'id';

    protected $table='detalle_habitacion_reservas'; 
    
    public $timestamps = false;

    protected $fillable = [ 
        'tipo',
        'valor',
        'reserva_detalle_id',
        'item_id', 
        'estado_id',
        'cantidad',
    ];

    public function tarifa()  {
        return $this->belongsTo(Tarifa::class,  'item_id', 'id' );  
    }

    public function productos()  {
        return $this->belongsTo(Productos::class,  'item_id', 'id' );  
    }

    public function recetas()  {
        return $this->belongsTo(Receta::class,  'item_id', 'id' );  
    }
}
