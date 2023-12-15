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
        Schema::create('cajas_control', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('caja_id')->nullable(false); 
            $table->timestamp('abrir_caja');
            $table->timestamp('cierre_caja')->nullable(); 
            $table->decimal('abrir_saldo', 12, 2)->nullable();
            $table->decimal('cierre_saldo', 12, 2)->nullable();
            $table->decimal('diferencia', 12, 2)->nullable();
            $table->unsignedBigInteger('usuario_id_abre')->nullable(false); 
            $table->unsignedBigInteger('usuario_id_cierra')->nullable(); 
            $table->unsignedTinyInteger('estado')->nullable(false)->default(0); // 1->abierta 0->cerrada  
            $table->timestamps();
            $table->foreign('usuario_id_abre')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('caja_id')->references('id')->on('cajas')->onUpdate('cascade')->onDelete('restrict');
        });

        Schema::table('detalle_cajas', function (Blueprint $table) {
            $table->foreign('caja_control_id')->references('id')->on('cajas_control')->onUpdate('cascade')->onDelete('restrict');
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cajas_control');
    }
};
