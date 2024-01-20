<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $primaryKey = 'id';

    protected $table='departamentos'; 

    protected $fillable = [
        'nombre', 
        'codigo_dane', 
        'pais_id', 
        'estado', 
        'indicativo_departamento',  
    ];

    public function pais() {
        return $this->belongsTo(Pais::class,'id','pais_id');
    }
}
