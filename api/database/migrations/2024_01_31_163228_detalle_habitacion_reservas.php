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
        Schema::create('detalle_habitacion_reservas', function (Blueprint $table) {
            $table->id();  
            $table->unsignedTinyInteger('tipo');  // 1->producto  2->servicio 3-> tarifa  4->receta
            $table->decimal('valor', 12, 2)->nullable(false); 
            $table->unsignedBigInteger('reserva_detalle_id')->nullable(false); // hace referencia a el id e la reserva o del producto
            $table->unsignedBigInteger('item_id')->nullable(false); 
            $table->unsignedBigInteger('cantidad')->nullable(false)->default(1); 
            $table->unsignedTinyInteger('estado_id')->default(1);
            $table->foreign('reserva_detalle_id')->references('id')->on('detalle_habitacions')->onUpdate('cascade')->onDelete('restrict'); 
        });  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_habitacion_reservas'); 
    }
};
