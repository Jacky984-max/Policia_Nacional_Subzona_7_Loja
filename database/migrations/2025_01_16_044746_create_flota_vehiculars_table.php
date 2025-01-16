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
        Schema::create('flota_vehiculars', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_vehiculo');
            $table->string('marca');
            $table->integer('kilometraje');
            $table->integer('capacidad_pasajeros');
            $table->string('placa');
            $table->string('modelo');
            $table->integer('cilindraje');
            $table->string('chasis');
            $table->string('motor');
            $table->integer('capacidad_carga');

       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flota_vehiculars');
    }
};
