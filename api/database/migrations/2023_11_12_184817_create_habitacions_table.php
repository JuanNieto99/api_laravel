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
        Schema::create('habitacions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->json('descripcion');
            $table->json('diseno_json');
            $table->unsignedTinyInteger('estado')->nullable(false);
            $table->unsignedBigInteger('usuario_id')->nullable(false); 
            $table->unsignedBigInteger('cliente_id')->nullable(false); 
            $table->timestamp('checkout')->nullable();
            $table->timestamp('checkin')->nullable();
            $table->unsignedTinyInteger('tipo');
            $table->timestamps();
            $table->decimal('precio', 12, 2)->nullable();
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitacions');
    }
};
