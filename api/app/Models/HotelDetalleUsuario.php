<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelDetalleUsuario extends Model
{
    protected $primaryKey = 'id';

    protected $table='hotel_detalle_usuario'; 

    protected $fillable = [
        'usuario_id', 
        'hotel_id', 
    ];


    function hotel() {
        return $this->belongsTo(Hotel::class,'hotel_id','id');
    }
}