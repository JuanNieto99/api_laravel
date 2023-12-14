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
        Schema::create('detalle_habitacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id')->nullable(false); 
            $table->unsignedBigInteger('cliente_id')->nullable(false); 
            $table->unsignedBigInteger('habitacion_id')->nullable(false); 
            $table->unsignedBigInteger('facturacion_id')->nullable(); 
            $table->timestamp('checkout')->nullable(); 
            $table->timestamp('checkin')->nullable(); 
            $table->timestamp('fecha_inicio')->nullable();
            $table->timestamp('fecha_salida')->nullable();   
            $table->foreign('cliente_id')->references('id')->on('clientes')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('habitacion_id')->references('id')->on('habitacions')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_habitacions');
    }
};
