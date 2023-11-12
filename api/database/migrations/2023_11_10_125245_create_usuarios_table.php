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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('usuario', 50);
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->unsignedBigInteger('rol_id')->nullable(false);
            $table->unsignedTinyInteger('estado');
            $table->unsignedTinyInteger('superadmin');
            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable(); 
            $table->string('verify_token', 255)->nullable();
            $table->rememberToken();
            $table->foreign('rol_id')->references('id')->on('rols')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }

    
};
