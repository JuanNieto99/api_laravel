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
            $table->string('nombres', 70);
            $table->string('apellidos', 70)->nullable();
            $table->unsignedTinyInteger('tipo');  // 1 -> natural 2 -> juridico
            $table->unsignedTinyInteger('estado');
            $table->unsignedBigInteger('ciudad_id')->nullable(false);
            $table->unsignedBigInteger('tipo_documento_id')->nullable(false);  
            $table->string('numero_documento',15);  
            $table->unsignedBigInteger('genero_id')->nullable();  // 1 -> masculino , 2-> femenino
            $table->unsignedBigInteger('estado_civil_id')->nullable();
            $table->string('barrio_residencia', 50);
            $table->timestamp('fecha_nacimiento')->nullable();
            $table->string('telefono', 30);
            $table->string('celular', 30);
            $table->unsignedBigInteger('nivel_studio_id')->nullable();
            $table->string('correo', 50);
            $table->string('observacion', 200);
            $table->unsignedBigInteger('usuario_create_id')->nullable(false); 
            $table->unsignedBigInteger('usuario_update_id')->nullable(); 
            $table->unsignedBigInteger('hotel_id')->nullable(false);
            $table->timestamps(); 
            $table->foreign('ciudad_id')->references('id')->on('ciudads')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('usuario_create_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('genero_id')->references('id')->on('generos')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('estado_civil_id')->references('id')->on('estado_civils')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('nivel_studio_id')->references('id')->on('nivel_estudios')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('restrict'); 
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
