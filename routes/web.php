<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PropiedadController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\Tipo_PropiedadController;

Route::get('/', function () {
    return redirect('Clientes');
});

Route::resource('/Rentas', RentaController::class);
Route::resource('/Clientes', ClienteController::class);
Route::resource('/Propiedades', PropiedadController::class);
Route::resource('/Propietarios', PropietarioController::class);
Route::resource('/Tipos_Propiedad', Tipo_PropiedadController::class);
