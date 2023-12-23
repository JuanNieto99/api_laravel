<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    protected $primaryKey = 'id';

    protected $table='cajas'; 

    protected $fillable = [
        'nombre', 
        'descripcion',
        'base',  
        'estado',
        'hotel_id',
        'tipo',
    ];

    public function control_caja()
    {
        return $this->belongsTo(ControlCaja::class,'id','caja_id');
    }

}
