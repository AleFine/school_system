<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\DepartamentoController;

use App\Http\Controllers\PersonalController;


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
