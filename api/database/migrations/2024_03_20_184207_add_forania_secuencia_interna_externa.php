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
        Schema::table('secuencia_externa', function (Blueprint $table) { 
            $table->foreign('tipo_operacion_id')->references('id')->on('tipo_operacion')->onUpdate('cascade')->onDelete('restrict'); 
        }); 

        Schema::table('secuencia_interna', function (Blueprint $table) { 
            $table->foreign('tipo_operacion_id')->references('id')->on('tipo_operacion')->onUpdate('cascade')->onDelete('restrict'); 
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('secuencia_externa', function (Blueprint $table) { 
            $table->dropForeign('tipo_operacion_id');
        }); 

        Schema::table('secuencia_interna', function (Blueprint $table) { 
            $table->dropForeign('tipo_operacion_id');
        }); 
    }
};
