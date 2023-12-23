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
        Schema::create('secuencia_interna', function (Blueprint $table) { 
                $table->id();
                $table->unsignedBigInteger('hotel_id')->nullable(false);
                $table->string('descripcion_secuencia', 100);  
                $table->unsignedBigInteger('secuensia_incial')->nullable(false); 
                $table->unsignedBigInteger('secuensia_actual')->nullable(false); 
                $table->unsignedBigInteger('usuario_id_crea')->nullable(false); 
                $table->unsignedBigInteger('usuario_id_actualiza')->nullable(); 
                $table->unsignedTinyInteger('estado');
                $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('restrict'); 
                $table->foreign('usuario_id_crea')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('restrict');
                $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secuencia_interna');
    }
};
