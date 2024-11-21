<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\Categoria_ingresoController;

// Asignar pantalla de inicio
Route::get('/', function () {
    return view('welcome');
});


Route::resource('/Clientes', ClienteController::class);
Route::resource('/Categorias', Categoria_ingresoController::class);
