<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecetaImpuesto extends Model
{
    protected $primaryKey = 'id';

    protected $table='receta_impuesto'; 

    protected $fillable = [
        'receta_id' ,
        'impuesto_id',
    ]; 

    function impuesto() {
        return $this->belongsTo(Impuesto::class,'impuesto_id','id');
    }
}
