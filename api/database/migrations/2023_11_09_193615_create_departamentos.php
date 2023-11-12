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
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 200);
            $table->string('codigo_dane', 2);
            $table->unsignedBigInteger('pais_id');
            $table->unsignedTinyInteger('estado')->nullable();
            $table->string('indicativo_departamento', 2);
            $table->foreign('pais_id')->references('id')->on('pais')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departamentos');

    }
};
