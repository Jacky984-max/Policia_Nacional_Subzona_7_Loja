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
        Schema::create('reclamo_sugerencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('provincia_id')->constrained('dependencias')->onDelete('cascade'); 
            $table->foreignId('nombre_circuito_id')->constrained('dependencias')->onDelete('cascade'); 
            $table->foreignId('parroquia_id')->constrained('dependencias')->onDelete('cascade');
            $table->string('tipo');
            $table->string('nombres');
            $table->string('apellidos');
            $table->char('contacto', '10');
            $table->string('detalle');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reclamo_sugerencias');
    }
};
