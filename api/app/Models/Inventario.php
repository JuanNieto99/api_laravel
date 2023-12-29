<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $primaryKey = 'id';

    protected $table='inventarios'; 

    protected $fillable = [
        'nombre', 
        'descripcion',
        'hotel_id',
        'estado', 
    ];

    public function hotel() {
    
        return $this->belongsTo(Hotel::class,'hotel_id','id');
    }
}
