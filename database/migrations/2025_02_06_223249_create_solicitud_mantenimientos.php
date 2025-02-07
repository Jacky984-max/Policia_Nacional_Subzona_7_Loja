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
        Schema::create('solicitud_mantenimientos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_mantenimiento');
            $table->string('descripcion',255)->nullable();
            $table->dateTime('fecha_hora');
            $table->integer('kilometraje');
            $table->string('observacion',255)->nullable();
            $table->string('solicitante');
            $table->enum('estado', ['PENDIENTE', 'EN PROCESO', 'COMPLETADO', 'CANCELADO'])->default('PENDIENTE');
            $table->foreignId('flotavehicular_id')->constrained('vehiculos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_mantenimientos');
    }
};
