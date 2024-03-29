<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleHabitacion extends Model
{
    protected $primaryKey = 'id';

    protected $table='detalle_habitacions'; 

    protected $fillable = [ 
        'usuario_id',
        'cliente_id',
        'habitacion_id',
        'checkout',
        'checkin',
        'fecha_inicio',
        'fecha_salida',
        'estado_id',
        'facturacion_id',
        'descripcion',
        'hotel_id',
        'total',
        'subtotal'
    ];

    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class, 'habitacion_id','id');
    }

    public function cliente()  {
        return $this->belongsTo(Cliente::class); 
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class); 
    }

    public function hotel() {
        return $this->belongsTo(Hotel::class);  
    }

    public function estadoHabitacion() {
        return $this->belongsTo(EstadoHabitacion::class,'habitacion_id','habitacion_id'); 
    }

    public function  detalleHabitacionReserva()  {
        return $this->belongsTo(DetalleHabitacionReserva::class,'id','reserva_detalle_id');  

    }

    
}
