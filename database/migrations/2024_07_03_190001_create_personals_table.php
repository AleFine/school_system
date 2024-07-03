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
        Schema::create('personal', function (Blueprint $table) {
            $table->id('id_trabajador');
            $table->string('nombre_trabajador');
            $table->string('apellido_trabajador');
            $table->string('DNI');
            $table->string('direccion');
            $table->date('fechaIngreso');
            $table->date('fechaNacimiento');
            $table->string('telefono');
            $table->unsignedBigInteger('id_departamento');
            $table->foreign('id_departamento')->references('id_departamento')->on('departamentos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal');
    }
};
