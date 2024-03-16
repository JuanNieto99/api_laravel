<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $primaryKey = 'id';

    protected $table='recetas'; 

    protected $fillable = [
        'nombre', 
        'descripcion',
        'imagen',
        'precio', 
        'estado',  
        'hotel_id',    
    ];

    public function hotel() { 
        return $this->belongsTo(Hotel::class,'hotel_id','id');
    }

    function recetaDetalle() {
        return $this->hasMany(RecetaDetalle::class, 'receta_id', 'id' );  
    }

    public function impuestos()  {
        return $this->hasMany(RecetaImpuesto::class, 'receta_id', 'id');
    }
}
