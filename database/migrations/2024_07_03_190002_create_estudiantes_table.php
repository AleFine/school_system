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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id('id_estudiante');
            $table->string('nombre_estudiante');
            $table->string('apellido_estudiante');
            $table->date('fechaNacimiento');
            $table->string('DNI');
            $table->string('genero');
            $table->string('pais');
            $table->string('region');
            $table->string('ciudad');
            $table->string('distrito');
            $table->string('estado_civil');
            $table->string('telefono');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
