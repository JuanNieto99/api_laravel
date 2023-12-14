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
        Schema::create('facturacion_medios_pagos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('facturacion_id')->nullable(false);
            $table->unsignedBigInteger('metodo_pago_id')->nullable(false); 
            $table->decimal('valor', 12, 2)->nullable(false);
            $table->foreign('facturacion_id')->references('id')->on('facturacions')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('metodo_pago_id')->references('id')->on('metodos_pagos')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturacion_medios_pagos');
    }
};
