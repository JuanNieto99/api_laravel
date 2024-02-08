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
        Schema::create('estados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);  
            $table->string('descripcion');
            $table->unsignedBigInteger('modulo_id')->nullable(false);  // 1-> habitaciones
            $table->unsignedTinyInteger('estado'); //1->activo 0->inactivo  
            $table->timestamps(); 
        });  

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estados');
    }
};
