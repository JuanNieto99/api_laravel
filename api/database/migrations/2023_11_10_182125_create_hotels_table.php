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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('direccion', 50);
            $table->unsignedBigInteger('ciudad_id')->nullable(false);
            $table->string('contacto', 50);
            $table->string('contacto_telefono', 30);
            $table->string('contacto_cargo', 30); 
            $table->string('telefono', 30);
            $table->string('nit', 30);
            $table->string('razon_social', 50);
            $table->unsignedBigInteger('cantidad_habitaciones');
            $table->string('email', 50);
            $table->unsignedTinyInteger('tipo_contribuyente');
            $table->unsignedBigInteger('usuario_id')->nullable(false);
            $table->foreign('ciudad_id')->references('id')->on('ciudads')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
