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
        Schema::create('facturacions', function (Blueprint $table) {
            $table->id();
            $table->string('concepto', 100);
            $table->json('descripcion');
            $table->decimal('total', 12, 2)->nullable(false);
            $table->decimal('iva', 12, 2)->nullable(false); 
            $table->unsignedBigInteger('metodo_pago_id')->nullable(false); 
            $table->unsignedBigInteger('cliente_id')->nullable(false); 
            $table->unsignedBigInteger('porcentaje_descuento')->nullable(); 
            $table->string('cufe', 200)->nullable();
            $table->unsignedTinyInteger('estado');
            $table->timestamps();
            $table->foreign('metodo_pago_id')->references('id')->on('metodos_pagos')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturacions');
    }
};
