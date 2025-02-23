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
            $table->string('tipo');
            $table->string('nombres');
            $table->string('apellidos');
            $table->char('contacto', '10');
            $table->string('detalle');
            $table->string('nombre_circuito')->nullable();
            $table->string('nombre_sub_circuito')->nullable();
            $table->foreignId('dependencia_id')->constrained('dependencias')->onDelete('cascade');
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
