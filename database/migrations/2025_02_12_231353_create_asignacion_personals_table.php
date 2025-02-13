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
        Schema::create('asignacion_personals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->references('id')->on('personal_policials');
            $table->foreignId('dependencia_id')->references('id')->on('dependencias');
            $table->timestamp('fecha_asignacion')->useCurrent(); 
            $table->text('observacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignacion_personals');
    }
};
