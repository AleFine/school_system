<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTriggerAfterInsertEstudianteCurso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Definir el trigger directamente en una sola consulta SQL
        $sql = "
        CREATE TRIGGER after_insert_estudiante_curso
        AFTER INSERT ON estudiante_curso
        FOR EACH ROW
        BEGIN
            INSERT INTO notas (id_curso, id_estudiante, notaUnidad1, notaUnidad2, notaUnidad3)
            VALUES (NEW.id_curso, NEW.id_estudiante, 0, 0, 0);
        END;
        ";

        // Ejecutar el SQL
        DB::unprepared($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Eliminar el trigger si existe
        DB::unprepared('DROP TRIGGER IF EXISTS after_insert_estudiante_curso');
    }
}
