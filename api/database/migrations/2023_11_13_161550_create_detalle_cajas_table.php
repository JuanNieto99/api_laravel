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
        Schema::create('detalle_cajas', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('tipo'); // 1-> ingreso 2-> egreso
            $table->unsignedTinyInteger('estado'); // 1-> abieto 2-> cerrado
            $table->unsignedBigInteger('usuario_id')->nullable(false); 
            $table->unsignedBigInteger('facturacion_id')->nullable(false); 
            $table->unsignedBigInteger('caja_id')->nullable(false); 
            $table->decimal('precio', 12, 2)->nullable();
            $table->unsignedBigInteger('metodo_pago_id')->nullable(false); 
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('caja_id')->references('id')->on('cajas')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('metodo_pago_id')->references('id')->on('metodos_pagos')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_cajas');
    }
};
