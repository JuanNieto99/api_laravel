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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 70);
            $table->string('apellidos', 70);
            $table->unsignedBigInteger('tipo_documento_id')->nullable(false);  
            $table->string('numero_documento',15);  
            $table->string('celular', 30);
            $table->unsignedBigInteger('genero_id')->nullable(false);  // 1 -> masculino , 2-> femenino
            $table->unsignedBigInteger('usuario_create_id')->nullable(false); 
            $table->unsignedBigInteger('usuario_update_id')->nullable(); 
            $table->unsignedBigInteger('hotel_id')->nullable(false);
            $table->unsignedTinyInteger('estado'); 
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('genero_id')->references('id')->on('generos')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('usuario_create_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('restrict'); 
            $table->timestamps();
        });

        Schema::create('tarifas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 70);
            $table->decimal('valor', 12, 2)->nullable(false);
            $table->unsignedBigInteger('hotel_id')->nullable(false); 
            $table->unsignedBigInteger('tipo_habitacion_id')->nullable(false); 
            $table->unsignedBigInteger('cantidad'); 
            $table->unsignedTinyInteger('tipo'); //1-> noche 2 ->horas
            $table->unsignedBigInteger('usuario_create_id')->nullable(false); 
            $table->unsignedBigInteger('usuario_update_id')->nullable(); 
            $table->string('descripcion')->nullable(); 
            $table->unsignedTinyInteger('estado'); 
            $table->timestamps();
            $table->foreign('tipo_habitacion_id')->references('id')->on('tipo_habitacion')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('usuario_create_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('restrict'); 
        });

        Schema::create('impuestos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);  
            $table->string('descripcion'); 
            $table->string('porcentaje'); 
            $table->unsignedTinyInteger('estado'); //1->activo 0->inactivo  
            $table->timestamps(); 
        });  

        Schema::create('configuraciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);  
            $table->string('descripcion'); 
            $table->string('codigo', 50); 
            $table->unsignedTinyInteger('estado'); //1->activo 0->inactivo  
            $table->timestamps(); 
        });  

        Schema::create('estado_habitacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estado_id')->nullable(false);  
            $table->unsignedBigInteger('habitacion_id')->nullable(false);  
            $table->unsignedBigInteger('empleado_id')->nullable();  
            $table->unsignedBigInteger('habitacion_detalle_id')->nullable();   
            $table->timestamp('fecha_inicio')->nullable();
            $table->timestamp('fecha_final')->nullable();  
            $table->string('descripcion')->nullable();  
            $table->timestamp('created_at');
            $table->foreign('habitacion_id')->references('id')->on('habitacions')->onUpdate('cascade')->onDelete('restrict');
          //  $table->foreign('empleado_id')->references('id')->on('empleados')->onUpdate('cascade')->onDelete('restrict');
        }); 

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
        Schema::dropIfExists('tarifa');
        Schema::dropIfExists('impuestos');
        Schema::dropIfExists('configuraciones');
        Schema::dropIfExists('estado_habitacion');
    }
};
