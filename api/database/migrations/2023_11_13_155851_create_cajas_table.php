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
        Schema::create('cajas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('descripcion');
            $table->decimal('base', 12, 2)->nullable(false); 
            $table->unsignedBigInteger('tipo')->nullable(false); 
            $table->unsignedBigInteger('usuario_id')->nullable(false); 
            $table->unsignedTinyInteger('estado')->nullable(false);  //1->creada 0->eliminada 
            $table->timestamps();
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cajas');
    }
};
