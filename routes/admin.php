<?php

use App\Http\Controllers\Admin\ComandaController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\UserController;

// Route::get('', function () {
//     return 'hola administrador';
// });
// Route::resource('productos', ProductoController::class);
Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::get('productos', [ProductoController::class, 'index'])->middleware('can:admin.productos')->name('admin.productos');

Route::get('users', [UserController::class, 'index'])->middleware('can:admin.users')->name('admin.users');

Route::get('comandas', [ComandaController::class, 'index'])->middleware('can:admin.comandas')->name('admin.comandas');
