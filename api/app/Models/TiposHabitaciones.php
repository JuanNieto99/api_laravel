<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposHabitaciones extends Model
{
    protected $primaryKey = 'id';

    protected $table='tipo_habitacion'; 

    protected $fillable = [
        'nombre',  
        'hotel_id',  
        'estado', 
        'diseno_json',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class,'hotel_id','id');
    }
}
