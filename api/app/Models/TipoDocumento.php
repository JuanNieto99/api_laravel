<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{ 
        protected $primaryKey = 'id';
    
        protected $table='tipo_documentos'; 
    
        protected $fillable = [
            'nombre_abreviado', 
            'nombre',
            'estado',
            'codigo_dian'
        ];
}
