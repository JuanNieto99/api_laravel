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
 
        Schema::create('medidas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);  
            $table->unsignedTinyInteger('estado');
            $table->timestamps();
        }); 


        Schema::table('productos', function (Blueprint $table) { 
            $table->foreign('medida_id')->references('id')->on('medidas')->onUpdate('cascade')->onDelete('restrict');
        });

        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('descripcion'); 
            $table->decimal('precio', 12, 2)->nullable(); 
            $table->unsignedTinyInteger('estado');            
            $table->timestamps();
        }); 

        Schema::create('detalle_recetas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id')->nullable(false);
            $table->unsignedBigInteger('receta_id')->nullable(false);
            $table->unsignedTinyInteger('estado');
            $table->foreign('receta_id')->references('id')->on('recetas')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('producto_id')->references('id')->on('productos')->onUpdate('cascade')->onDelete('restrict');
        });


        Schema::create('tipo_contribuyente', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);  
            $table->unsignedTinyInteger('estado');
            $table->timestamps();
        }); 
        

        Schema::create('tipo_habitacion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);  
            $table->unsignedTinyInteger('estado');
            $table->timestamps();
        });  


        Schema::table('hotels', function (Blueprint $table) { 
            $table->foreign('tipo_contribuyente')->references('id')->on('tipo_contribuyente')->onUpdate('cascade')->onDelete('restrict');
        });

        Schema::table('habitacions', function (Blueprint $table) { 
            $table->foreign('tipo')->references('id')->on('tipo_habitacion')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
