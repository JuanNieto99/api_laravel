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
        Schema::create('consumos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id')->nullable(false); 
            $table->unsignedBigInteger('cliente_id')->nullable(false); 
            $table->unsignedBigInteger('habitacion_id')->nullable(); 
            $table->unsignedBigInteger('consumido_id')->nullable(false); 
            $table->unsignedTinyInteger('tipo_consumido');  // 1 -> receta  2 -> producto 
            $table->decimal('precio', 12, 2)->nullable();
            $table->unsignedBigInteger('cantidad'); 
            $table->timestamp('created_at')->nullable();
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onUpdate('cascade')->onDelete('restrict');
            //$table->foreign('producto_id')->references('id')->on('productos')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consumos');
    }
};
