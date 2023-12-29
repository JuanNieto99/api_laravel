<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $primaryKey = 'id';

    protected $table='hotels'; 

    protected $fillable = [
        'nombre', 
        'direccion',
        'ciudad_id',
        'contacto',
        'contacto_telefono',
        'contacto_cargo',
        'telefono',
        'nit',
        'razon_social',
        'cantidad_habitaciones',
        'email',
        'tipo_contribuyente',
        'usuario_id',
        'imagen',
        'estado'
    ];


    public function ciudad () {
        return $this->belongsTo(Ciudad::class);
    }

    public function tipoContribuyente() {
        return $this->belongsTo(TiposContribuyentes::class);
    }


    public function usuario(){
        return $this->belongsTo(Usuario::class); 
    }
}
