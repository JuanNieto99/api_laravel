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
        Schema::create('historials', function (Blueprint $table) {
            $table->id();
            $table->json('data_json');
            $table->unsignedTinyInteger('tipo'); //0->autenticacion 1 -> control de habitacion 2 -> facturacion 3 ->inventario 4->cliente  5-> hotel 6->inventario 7->permiso 8->productos 9->receta 10->rol 11->usuario 12->caja  ,13 ->secuencias
            $table->unsignedBigInteger('usuario_id')->nullable(false); 
            $table->unsignedBigInteger('hotel_id')->nullable(); 
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historials');
    }
};
