<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
    protected $primaryKey = 'id';

    protected $table='abonos'; 

    protected $fillable = [
        'hotel_id', 
        'habitacion_detalle_id',
        'cliente_id',  
        'valor',
        'metodo_pago_id',
        'usuario_id_crea', 
        'tipo_abono',
        'estado',
    ];


    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }


    function cliente() {
        return $this->belongsTo(Cliente::class);    
    }

    function usuarioCreate() {
        return $this->belongsTo(Usuario::class,'usuario_id_crea', 'id');    
    }

    function metodoPago()  {
        return $this->belongsTo(MetodosPago::class, 'metodo_pago_id');    
    }
}
