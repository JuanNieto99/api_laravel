<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permiso;

class RolPermisoDetalle extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $table='rol_permiso_detalles'; 

    protected $fillable = [
        'rol_id', 
        'permiso_id', 
    ];

    public function permiso()
    {
        return $this->belongsTo(Permiso::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
