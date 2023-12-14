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
        Schema::create('habitacions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('descripcion');
            $table->json('diseno_json');
            $table->unsignedTinyInteger('estado')->nullable(false); //1->creado 0->eliminado 2->ocupado 3->disponible 4->limpieza
            $table->unsignedBigInteger('tipo')->nullable(false); 
            $table->unsignedBigInteger('hotel_id')->nullable(false); 
            $table->unsignedBigInteger('capacidad_personas'); 
            $table->decimal('precio', 12, 2)->nullable();
            $table->unsignedBigInteger('usuario_modifica')->nullable(false); 
            $table->foreign('usuario_modifica')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitacions');
    }
};
