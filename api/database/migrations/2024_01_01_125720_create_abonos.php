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
        Schema::create('abonos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id')->nullable(false); 
            $table->unsignedBigInteger('habitacion_detalle_id')->nullable(false); 
            //$table->unsignedBigInteger('factura_id')->nullable(); 
            $table->unsignedBigInteger('cliente_id')->nullable(false); 
            $table->decimal('valor', 12, 2)->nullable(false);
            $table->unsignedBigInteger('metodo_pago_id')->nullable(false);  
            $table->unsignedBigInteger('usuario_id_crea')->nullable(false);  
            $table->unsignedBigInteger('tipo_abono')->nullable(false); // 1-> habitacion 
            $table->unsignedTinyInteger('estado'); //1->activo 0->inactivo 2->facturado
            $table->timestamps();
            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('restrict'); 
            $table->foreign('usuario_id_crea')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('metodo_pago_id')->references('id')->on('metodos_pagos')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('habitacion_detalle_id')->references('id')->on('detalle_habitacions')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonos');
    }
};
