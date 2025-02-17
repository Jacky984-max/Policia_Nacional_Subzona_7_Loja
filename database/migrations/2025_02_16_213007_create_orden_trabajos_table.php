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
        Schema::create('orden_trabajos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mantenimiento_id')->constrained('mantenimientos')->onDelete('cascade'); // Relacionado con el mantenimiento
            $table->dateTime('fecha_generacion'); // Fecha de emisión de la orden
            $table->text('detalle_mantenimiento'); // Descripción de los trabajos realizados
            $table->enum('estado', ['Pendiente', 'Finalizado'])->default('Pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_trabajos');
    }
};
