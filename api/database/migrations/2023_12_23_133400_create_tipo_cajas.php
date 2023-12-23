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
        Schema::create('tipo_cajas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);  
            $table->string('descripcion'); 
            $table->unsignedTinyInteger('estado'); 
            $table->timestamps();
        });

        Schema::table('cajas', function (Blueprint $table) { 
            $table->foreign('tipo')->references('id')->on('tipo_cajas')->onUpdate('cascade')->onDelete('restrict'); 
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_cajas');
    }
};
