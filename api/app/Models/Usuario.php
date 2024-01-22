<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rol;

class Usuario extends Model
{
    
    protected $primaryKey = 'id';

    protected $table='usuarios'; 

    protected $fillable = [
        'usuario', 
        'email',
        'password',
        'rol_id',
        'estado',
        'updated_at', 
    ];

    public function roles()
    {
        return $this->belongsTo(Rol::class, 'rol_id','id');
    }

    public function usuarioHotel(){ 
        return $this->belongsTo(HotelDetalleUsuario::class, 'usuario_id','id'); 
    }

}
