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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('placa', 20)->unique();
            $table->string('tipo_vehiculo', 50);
            $table->string('marca', 50)->nullable();
            $table->string('modelo', 50)->nullable();
            $table->string('chasis', 50)->nullable();
            $table->string('motor', 50)->nullable();
            $table->integer('kilometraje')->default(0);
            $table->decimal('cilindraje', 5,2)->nullable();
            $table->decimal('capacidad_carga', 5, 2)->nullable();
            $table->integer('capacidad_pasajeros')->nullable();
            $table->enum('estado_asignacion', ['Asignado', 'No Asignado'])->default('No Asignado'); 
            $table->foreignId('personal_id')->constrained('personal_policials')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
