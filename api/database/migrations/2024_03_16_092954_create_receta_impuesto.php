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
        Schema::create('receta_impuesto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receta_id')->nullable(false);  
            $table->unsignedBigInteger('impuesto_id')->nullable(false); 
            $table->foreign('impuesto_id')->references('id')->on('impuestos')->onUpdate('cascade')->onDelete('restrict'); 
            $table->foreign('receta_id')->references('id')->on('recetas')->onUpdate('cascade')->onDelete('restrict'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receta_impuesto');
    }
};
