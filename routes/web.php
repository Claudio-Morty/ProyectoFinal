<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalidaController;


Route::resource('productos', ProductoController::class)->middleware('auth');


Route::resource('categorias', CategoriaController::class)->middleware('auth');
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/salidas/create', [SalidaController::class, 'create'])->name('salidas.create');
Route::post('/salidas', [SalidaController::class, 'store'])->name('salidas.store');
Route::get('/salidas', [SalidaController::class, 'index'])->name('salidas.index');
Route::get('salidas/{id}/edit', [SalidaController::class, 'edit'])->name('salida.edit');
Route::delete('salidas/{id}', [SalidaController::class, 'destroy'])->name('salida.destroy');


Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



