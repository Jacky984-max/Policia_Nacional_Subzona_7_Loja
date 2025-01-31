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
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_mantenimiento');
            $table->string('descripcion',255)->nullable();
            $table->dateTime('fecha_hora');
            $table->integer('kilometraje');
            $table->string('observacion',255)->nullable();
            $table->enum('estado', ['PENDIENTE', 'EN PROCESO', 'COMPLETADO'])->default('PENDIENTE');
            $table->foreignId('flotavehicular_id')->constrained('vehiculos')->onDelete('cascade');
            $table->foreignId('solicitante_id')->constrained('personal_policials')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimientos');
    }
};
