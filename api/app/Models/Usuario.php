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
    ];

    public function roles()
    {
        return $this->belongsTo(Rol::class, 'rol_id','id');
    }

}
