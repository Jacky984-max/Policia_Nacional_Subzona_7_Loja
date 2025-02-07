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
            $table->foreignId('solicitud_id')->constrained('solicitud_mantenimientos')->onDelete('cascade');
            $table->dateTime('fecha_ingreso'); // Fecha de recepción
            $table->integer('kilometraje'); // Kilometraje del vehículo al ingresar
            $table->string('tipo_vehiculo'); // Auto, Moto, etc.
            $table->string('placa');
            $table->string('marca');
            $table->string('modelo');
            $table->string('asunto'); // Asunto de la recepción
            $table->text('detalle'); //Descripción detallada del problema
            $table->enum('estado', ['COMPLETADO'])->default('COMPLETADO');
            $table->enum('tipo_mantenimiento', ['Mantenimiento 1', 'Mantenimiento 2', 'Mantenimiento 3']);
            $table->decimal('subtotal', 10, 2);
            $table->decimal('iva', 10, 2);
            $table->decimal('total', 10, 2);
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
