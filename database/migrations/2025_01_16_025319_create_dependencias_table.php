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
        Schema::create('dependencias', function (Blueprint $table) {
            $table->id();
            $table->string('provincia');
            $table->string('cod_distrito');
            $table->string('cod_circuito');
            $table->string('cod_sub_circuito');
            $table->integer('numero_distrito');
            $table->string('nombre_distrito');
            $table->string('nombre_circuito');
            $table->string('nombre_sub_circuito');
            $table->string('parroquia');
            $table->integer('numero_circuito');
            $table->integer('numero_sub_circuito');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dependencias');
    }
};
