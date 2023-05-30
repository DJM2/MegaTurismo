<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 120)->unique();
            $table->string('descripcion', 250);
            $table->text('contenido'); 
            $table->text('resumen'); 
            $table->text('detallado');
            $table->text('incluidos');
            $table->text('importante')->nullable();
            $table->string('lugarInicio')->nullable();
            $table->string('lugarFin')->nullable();
            $table->integer('precioReal');
            $table->integer('precioPublicado');
            $table->integer('dias');
            $table->string('imgThumb');
            $table->string('img');
            $table->string('mapa')->nullable();
            $table->string('categoria');
            $table->string('keywords');
            $table->string('slug')->unique();
            $table->string('galeria')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};