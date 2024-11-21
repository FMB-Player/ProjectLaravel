<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;

Route::get('/', [ClientesController::class, 'index'])->name("inicio");
Route::get('/clientes/crear', [ClientesController::class, 'create'])->name("clientes.crear");
Route::post('/clientes/guardar', [ClientesController::class, 'store'])->name("clientes.guardar");
Route::get('/clientes/editar/{id}', [ClientesController::class, 'edit'])->name("clientes.edit");
route::post('/clientes/actualizar/{id}', [ClientesController::class, 'update'])->name("clientes.actualizar");
Route::delete('/clientes/eliminar/{id}', [ClientesController::class, 'destroy'])->name("clientes.destroy");