<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $primaryKey = 'id';

    protected $table='clientes'; 

    protected $fillable = [
        'nombres', 
        'apellidos',
        'tipo', 
        'ciudad_id', 
        'tipo_documento_id', 
        'numero_documento', 
        'genero_id', 
        'estado_civil_id',
        'barrio_residencia',
        'fecha_nacimiento',
        'telefono',
        'celular',
        'nivel_studio_id',
        'correo',
        'observacion',
        'usuario_create_id',
        'usuario_update_id',
        'hotel_id',
        'estado',
    ];

    public function ciudad () {
        return $this->belongsTo(Ciudad::class);
    }

    public function tipoDocumento() {
        return $this->belongsTo(TipoDocumento::class);
    }

    public function genero() {
        return $this->belongsTo(Genero::class);
    }

    public function estadoCivil() {
        return $this->belongsTo(EstadoCivil::class);
    }

    public function hotel() {
        return $this->belongsTo(Hotel::class);    
    }
}
