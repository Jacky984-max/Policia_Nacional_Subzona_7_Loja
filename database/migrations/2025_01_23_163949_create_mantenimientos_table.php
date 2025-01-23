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
            $table->string('solicitante');
            $table->dateTime('fecha_hora');
            $table->integer('kilometraje');
            $table->string('observacion',255)->nullable();
            $table->foreignId('flotavehicular_id')->nullable()->constrained('flota_vehiculars')->onDelete('set null');
            $table->enum('estado', ['PENDIENTE', 'EN PROCESO', 'COMPLETADO'])->default('PENDIENTE');
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
