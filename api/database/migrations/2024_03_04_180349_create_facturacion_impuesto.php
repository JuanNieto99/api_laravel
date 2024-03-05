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
        Schema::create('facturacion_impuesto', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor', 12, 2)->nullable(false); 
            $table->unsignedBigInteger('factura_id')->nullable(false); 
            $table->unsignedBigInteger('impuesto_id')->nullable(false); 
            $table->unsignedBigInteger('item_id')->nullable(false); 
            $table->unsignedTinyInteger('porcentaje');  
            $table->foreign('factura_id')->references('id')->on('facturacions')->onUpdate('cascade')->onDelete('restrict'); 
            $table->foreign('impuesto_id')->references('id')->on('impuestos')->onUpdate('cascade')->onDelete('restrict'); 
            $table->foreign('item_id')->references('id')->on('productos')->onUpdate('cascade')->onDelete('restrict');    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturacion_impuesto');
    }
};
