<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RolPermisoDetalle;
use App\Models\User;

class Rol extends Model
{
    protected $primaryKey = 'id';

    protected $table='rols'; 

    protected $fillable = [
        'nombre', 
        'descripcion',
        'estado'
    ];

    public function rolPermisoDetalle()
    {
        return $this->hasMany(RolPermisoDetalle::class);
    }
    
}
