<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\SeccionController;

use App\Http\Controllers\Auth\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::resource('estudiantes', EstudianteController::class);
Route::get('cancelar_estudiante', function () {
    return redirect()->route('estudiantes.index')->with('datos','Acción Cancelada ..!');
})->name('cancelar_estudiante');
Route::get('estudiante/{id}/confirmar',[EstudianteController::class,'confirmar'])->name('estudiantes.confirmar');


Route::resource('nivels', NivelController::class);
//Rutas para Grados
Route::resource('grados', GradoController::class);
//Rutas para Secciones
Route::resource('secciones', SeccionController::class);


