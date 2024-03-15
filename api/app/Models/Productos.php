<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $primaryKey = 'id';

    protected $table='productos'; 

    protected $fillable = [
        'nombre', 
        'descripcion',
        'imagen',
        'precio',
        'cantidad',
        'estado',
        'inventario_id',
        'sin_limite_cantidad',
        'medida_id',
        'stop_minimo',
        'visible_venta',
        'visible_receta',
        'precio_base',
        'tipo_producto', 
    ];

    public function inventario() {
        return $this->belongsTo(Inventario::class);
    }

    public function medida() {
        return $this->belongsTo(Medidas::class);
    }
    
    public function impuestos()  {
        return $this->hasMany(ImpuestoProducto::class, 'producto_id', 'id');
    }
}
