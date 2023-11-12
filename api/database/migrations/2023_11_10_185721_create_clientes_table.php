<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 100);
            $table->string('Apellidos', 50);
            $table->unsignedTinyInteger('tipo');  // 1 -> natural 2 -> juridico
            $table->unsignedBigInteger('ciudad_id')->nullable(false);
            $table->unsignedTinyInteger('tipo_documento');  
            $table->string('numero_documento');  
            $table->unsignedTinyInteger('genero');  // 1 -> masculino , 2-> femenino
            $table->unsignedTinyInteger('estado civil');
            $table->string('barrio residencia');
            $table->timestamp('fecha_nacimiento');
            $table->string('telefono', 30);
            $table->string('celular', 30);
            $table->unsignedTinyInteger('nivel_studio'); 
            $table->string('correo', 50);
            $table->string('observacion', 200);
            $table->unsignedBigInteger('usuario_id')->nullable(false); 
            $table->timestamps();
            $table->foreign('ciudad_id')->references('id')->on('ciudads')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
