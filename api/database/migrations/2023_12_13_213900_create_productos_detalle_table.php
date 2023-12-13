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
        Schema::create('productos_detalle', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id')->nullable(false);
            $table->unsignedBigInteger('cantidad')->nullable(false);
            $table->unsignedTinyInteger('estado')->nullable(false); // 1->agregado 0 -> eliminado  2->consumido    
            $table->foreign('producto_id')->references('id')->on('productos')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    { 
        Schema::dropIfExists('productos_detalle'); 
    }
};
