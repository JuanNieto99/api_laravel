<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImpuestoProducto extends Model
{
    protected $primaryKey = 'id';

    protected $table='producto_impuesto'; 

    protected $fillable = [ 
        'producto_id', 
        'impuesto_id', 
    ];

    function impuesto() {
        return $this->belongsTo(Impuesto::class,'impuesto_id','id');
    }
}
