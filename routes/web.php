<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccesoController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EncuestasController;
use App\Http\Controllers\PreguntasController;

Route::get('/', [AccesoController::class, 'index'])->name('index');
Route::get('/login', [AccesoController::class, 'index'])->name('login');
Route::post('/acceder', [AccesoController::class, 'acceder'])->name('acceso.acceder');

Route::get('/dashboard', [IndexController::class, 'index'])->name('index');
Route::get('/view', [IndexController::class, 'view'])->name('view');

Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');
Route::post('/usuarios', [UsuariosController::class, 'store'])->name('usuarios.store');
Route::put('/usuarios/{id}', [UsuariosController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');

Route::get('/cliente', [ClientesController::class, 'index'])->name('clientes.index');
Route::post('/cliente', [ClientesController::class, 'store'])->name('clientes.store');
Route::put('/cliente/{id}', [ClientesController::class, 'update'])->name('clientes.update');
Route::delete('/cliente/{id}', [ClientesController::class, 'destroy'])->name('clientes.destroy');

Route::get('/encuestas', [EncuestasController::class, 'index'])->name('encuestas.index');
Route::post('/encuestas', [EncuestasController::class, 'store'])->name('encuestas.store');
Route::put('/encuestas/{id}', [EncuestasController::class, 'update'])->name('encuestas.update');
Route::delete('/encuestas/{id}', [EncuestasController::class, 'destroy'])->name('encuestas.destroy');

Route::get('/preguntas', [PreguntasController::class, 'index'])->name('preguntas.index');
Route::post('/preguntas', [PreguntasController::class, 'store'])->name('preguntas.store');
Route::put('/preguntas/{id}', [PreguntasController::class, 'update'])->name('preguntas.update');
Route::delete('/preguntas/{id}', [PreguntasController::class, 'destroy'])->name('preguntas.destroy');