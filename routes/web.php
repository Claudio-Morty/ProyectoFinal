<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UserController;


Route::resource('productos', ProductoController::class)->middleware('auth');


Route::resource('categorias', CategoriaController::class)->middleware('auth');
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');

Route::resource('usuarios', UserController::class);
Route::put('/usuarios/{usuario}', [UserController::class, 'update'])->name('usuarios.update');

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



