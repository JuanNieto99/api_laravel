<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Termwind\Components\Hr;

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
        'usuario_id',
        'tipo',
    ];

    public function control_caja()
    {
        return $this->belongsTo(ControlCaja::class,'id','caja_id');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }

    public function tipoCajas()
    {
        return $this->belongsTo(TipoCaja::class, 'tipo', 'id');
    }

    public function usuario()  {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }
}
