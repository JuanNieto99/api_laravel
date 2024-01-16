<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $primaryKey = 'id';

    protected $table='permisos'; 

    protected $fillable = [
        'nombre', 
        'codigo',
        'id_padre', 
        'descripcion',
        'estado',
    ];

    public function roles()
    {
        return $this->belongsToMany(Rol::class,'rol_permiso_detalles');
    }
}
