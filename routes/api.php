<?php

use App\Http\Controllers\ConsultaController;
use Illuminate\Support\Facades\Route;

Route::get('/consultas', [ConsultaController::class, 'index'])->name('consultas.index');
Route::get('/consultas/filter', [ConsultaController::class, 'filter'])->name('consultas.filter');
