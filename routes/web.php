<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\DepartamentoController;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CursosPrimariaController;
use App\Http\Controllers\CursosSecundariaController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\EstudianteCursoController;
use App\Http\Controllers\CompetenciaController;
use App\Http\Controllers\EstudianteSeccionController;
use App\Http\Controllers\TercioPrimariaController;
use App\Http\Controllers\TercioSecundariaController;



use App\Http\Controllers\GradoCursoPrimariaController;
use App\Http\Controllers\GradoCursoSecundariaController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'dashboard'])->name('jejeje');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::resource('estudiantes', EstudianteController::class);
Route::get('cancelar_estudiante', function () {
    return redirect()->route('estudiantes.index')->with('datos','Acción Cancelada ..!');
})->name('cancelar_estudiante');
Route::get('estudiante/{id}/confirmar',[EstudianteController::class,'confirmar'])->name('estudiantes.confirmar');


Route::resource('nivels', NivelController::class);
Route::resource('grados', GradoController::class);
Route::resource('secciones', SeccionController::class);


Route::resource('departamento', DepartamentoController::class);
Route::get('cancelar3', function () {
    return redirect()->route('departamento.index')->with('datos','Acción Cancelada ..!');
})->name('cancelar3');
Route::get('departamento/{id}/confirmar',[DepartamentoController::class,'confirmar'])->name('departamento.confirmar');


Route::resource('personal', PersonalController::class);
Route::get('cancelar4', function () {
    return redirect()->route('personal.index')->with('datos','Acción Cancelada ..!');
})->name('cancelar4');
Route::get('personal/{id}/confirmar',[PersonalController::class,'confirmar'])->name('personal.confirmar');


Route::resource('cursos-primaria', CursosPrimariaController::class);

/////////////        RUTAS PARA REGISTRO DE NOTAS EN CURSOS    ///////////////////

// Rutas para la gestión de cursos y estudiantes

// Grupo de rutas relacionadas con los detalles del curso
Route::prefix('cursos-primaria/{curso}')->group(function () {
    // Ruta para mostrar los detalles de un curso
    Route::get('/detalle', [CursosPrimariaController::class, 'showDetails'])
        ->name('cursos-primaria.details');

    // Ruta para mostrar todos los estudiantes en la vista que agrega alumnos a un curso
    Route::get('/agregar-estudiantes', [CursosPrimariaController::class, 'showAddStudents'])
        ->name('cursos-primaria.add-students');

    // Ruta para manejar la adición de estudiantes a un curso
    Route::post('/agregar-estudiantes', [CursosPrimariaController::class, 'addStudent'])
        ->name('cursos-primaria.store-student');

    // Rutas relacionadas con la edición de notas de los estudiantes en un curso específico
    Route::prefix('edit-student')->group(function () {
        // Ruta para mostrar el formulario de edición de notas
        Route::get('{estudiante}', [NotasController::class, 'edit'])
            ->name('cursos-primaria.edit-student');

        // Ruta para actualizar las notas de un estudiante en un curso específico
        Route::put('update-student/{estudiante}', [NotasController::class, 'update'])
            ->name('cursos-primaria.update-student');
    });
});

Route::delete('/estudiante_curso/{id_curso}/{id_estudiante}', [NotasController::class, 'destroyPrimaria'])->name('estudiante_curso.destroy');


/// Rutas para la gestión de cursos y estudiantes en el nivel secundario

// Grupo de rutas relacionadas con los cursos secundarios
Route::prefix('cursos-secundaria/{curso}')->group(function () {
    // Ruta para mostrar los detalles de un curso secundario
    Route::get('/detalle', [CursosSecundariaController::class, 'showDetails'])
        ->name('cursos-secundaria.details');

    // Ruta para mostrar todos los estudiantes en la vista que agrega alumnos a un curso secundario
    Route::get('/agregar-estudiantes', [CursosSecundariaController::class, 'showAddStudents'])
        ->name('cursos-secundaria.add-students');

    // Ruta para manejar la adición de estudiantes a un curso secundario
    Route::post('/agregar-estudiantes', [CursosSecundariaController::class, 'addStudent'])
        ->name('cursos-secundaria.store-student');

    // Rutas relacionadas con la edición de notas de los estudiantes en un curso secundario
    Route::prefix('edit-student')->group(function () {
        // Ruta para mostrar el formulario de edición de notas
        Route::get('{estudiante}', [NotasController::class, 'edit2'])
            ->name('cursos-secundaria.edit-student');

        // Ruta para actualizar las notas de un estudiante en un curso secundario
        Route::put('update-student/{estudiante}', [NotasController::class, 'update'])
            ->name('cursos-secundaria.update-student');
    });
});

Route::delete('/estudiante_cursoS/{id_curso}/{id_estudiante}', [NotasController::class, 'destroySecundaria'])->name('estudiante_curso.destroy2');
Route::get('cursos-primaria/{curso}/detalle/competencias',[CompetenciaController::class,'mostrarCompetencias'])->name('cursos.competencias');
Route::get('cursos-secundaria/{curso}/detalle/competencias',[CompetenciaController::class,'mostrarCompetencias2'])->name('cursos.competencias2');
/////////////        FIN    ///////////////////



Route::resource('cursos-primaria', CursosPrimariaController::class);
Route::resource('cursos-secundaria', CursosSecundariaController::class);
Route::get('/trabajadores/{departamento_id}', [CursosPrimariaController::class, 'getTrabajadoresByDepartamento']);
Route::get('/trabajadores/{departamento_id}', [CursosSecundariaController::class, 'getTrabajadoresByDepartamento']);


Route::resource('grado-cursos-primaria', GradoCursoPrimariaController::class);
Route::resource('grado-cursos-secundaria', GradoCursoSecundariaController::class);

Route::get('grado-cursos-primaria/{id}', [GradoCursoPrimariaController::class, 'show'])->name('grado.cursos.primaria.show');
Route::get('grado-cursos-secundaria/{id}', [GradoCursoSecundariaController::class, 'show'])->name('grado.cursos.secundaria.show');


Route::resource('competencias', CompetenciaController::class);
Route::get('competencias/{id}/confirmar',[CompetenciaController::class,'confirmar'])->name('competencias.confirmar');


Route::resource('tercio-primaria', TercioPrimariaController::class);
Route::resource('tercio-secundaria', TercioSecundariaController::class);
Route::get('tercio-primaria/{id}', [TercioPrimariaController::class, 'show'])->name('tercio.primaria.show');
Route::get('tercio-secundaria/{id}', [TercioSecundariaController::class, 'show'])->name('tercio.secundaria.show');










































Route::resource('estudiantes_secciones', EstudianteSeccionController::class);
Route::get('cancelar_estudiantes_secciones', function () {
    return redirect()->route('estudiantes_secciones.index')->with('datos','Acción Cancelada ..!');
})->name('cancelar_estudiantes_secciones');
Route::get('estudiantes_secciones/{id_estudiante}/{id_seccion}/confirmar', [EstudianteSeccionController::class, 'confirmar'])->name('estudiantes_secciones.confirmar');
Route::delete('estudiantes_secciones/{id_estudiante}/{id_seccion}', [EstudianteSeccionController::class, 'destroy'])->name('estudiantes_secciones.destroy');

Route::get('estudiantes_secciones/{id_estudiante}/{id_seccion}', [EstudianteSeccionController::class, 'show'])->name('estudiantes_secciones.show');
Route::get('estudiantes_secciones/{id_estudiante}/{id_seccion}/edit', [EstudianteSeccionController::class, 'edit'])->name('estudiantes_secciones.edit');
Route::put('estudiantes_secciones/{id_estudiante}/{id_seccion}', [EstudianteSeccionController::class, 'update'])->name('estudiantes_secciones.update');

