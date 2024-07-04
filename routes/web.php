<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CursosPrimariaController;
use App\Http\Controllers\CursosSecundariaController;

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

























Route::resource('cursos-primaria', CursosPrimariaController::class);
Route::resource('cursos-secundaria', CursosSecundariaController::class);
Route::get('/trabajadores/{departamento_id}', [CursosPrimariaController::class, 'getTrabajadoresByDepartamento']);
Route::get('/trabajadores/{departamento_id}', [CursosSecundariaController::class, 'getTrabajadoresByDepartamento']);