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
            $table->string('circuito');
            $table->string('sub_circuito');
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
