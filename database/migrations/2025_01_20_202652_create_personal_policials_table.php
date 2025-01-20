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
        Schema::create('personal_policials', function (Blueprint $table) {
            $table->id();
            $table->integer('cedula');
            $table->string('nombres');
            $table->string('apellidos');
            $table->date('fecha_nacimiento');
            $table->string('tipo_sangre');
            $table->string('ciudad_nacimiento');
            $table->char('celular', '10');
            $table->string('rango');
            $table->foreignId('dependencia_id')->constrained('dependencias')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_policials');
    }
};
