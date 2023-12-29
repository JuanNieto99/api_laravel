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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('descripcion');
            $table->string('imagen', 70);
            $table->unsignedTinyInteger('sin_limite_cantidad')->nullable(false); //1-> sin limite 0->con limite
            $table->unsignedBigInteger('medida_id')->nullable(false); // 1 -> gramo, 2->peso , 3 -> kg, 4->
            $table->decimal('precio', 12, 2)->nullable(false);
            $table->unsignedBigInteger('cantidad');
            $table->unsignedTinyInteger('estado')->nullable(false); //0 -> eliminado  1 -> registrado 
            $table->unsignedBigInteger('inventario_id')->nullable(false);
            $table->unsignedBigInteger('stop_minimo');
            $table->unsignedBigInteger('visible_venta'); // 1 -> visible, 0->no visible
            $table->decimal('precio_base', 12, 2)->nullable(false);
            $table->unsignedBigInteger('tipo_producto'); //2->producto 1->servicio 
            $table->foreign('inventario_id')->references('id')->on('inventarios')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
