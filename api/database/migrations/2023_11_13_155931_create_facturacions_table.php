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
        Schema::create('facturacions', function (Blueprint $table) {
            $table->id(); 
            $table->string('concepto', 30);
            $table->string('secuencia_factura_interna');
            $table->string('secuencia_factura_externa')->nullable();
            $table->decimal('total', 12, 2)->nullable(false);
            $table->decimal('sub_total', 12, 2)->nullable(false); 
            $table->decimal('iva', 12, 2)->nullable(false); 
            $table->unsignedBigInteger('hotel_id')->nullable(false); 
            $table->unsignedBigInteger('cliente_id')->nullable(false); 
            $table->unsignedBigInteger('porcentaje_descuento')->nullable(); 
            $table->unsignedBigInteger('secuencia_interna')->nullable(false); 
            $table->unsignedBigInteger('secuencia_externa')->nullable(); 
            $table->string('cufe', 200)->nullable();
            $table->unsignedTinyInteger('estado'); // 1-> facturado 0->factura anulada
            $table->timestamps();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturacions');
    }
};
