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
            $table->string('nombre');
            $table->date('fecha_nacimiento');
            $table->string('tipo_sangre');
            $table->string('ciudad_nacimiento');
            $table->char('celular', '10');
            $table->string('rango');
            $table->enum('estado_asignacion', ['Asignado', 'No Asignado'])->default('No Asignado'); 
            $table->foreignId('dependencia_id')->constrained('dependencias')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null'); 
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
