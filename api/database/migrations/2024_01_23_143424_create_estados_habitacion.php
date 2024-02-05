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

        Schema::create('estado_habitacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estado_id')->nullable(false);  
            $table->unsignedBigInteger('habitacion_id')->nullable(false);  
            $table->unsignedBigInteger('empleado_id')->nullable();  
            $table->timestamp('fecha_inicio')->nullable();
            $table->timestamp('fecha_final')->nullable();  
            $table->string('descripcion')->nullable();  
            $table->timestamp('created_at');
            $table->foreign('habitacion_id')->references('id')->on('habitacions')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('empleado_id')->references('id')->on('empleados')->onUpdate('cascade')->onDelete('restrict');
        }); 


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estado_habitacion');
        Schema::dropIfExists('estados');
    }
};
