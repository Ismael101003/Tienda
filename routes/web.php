<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController; // Asegúrate de importar el controlador
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas que requieren que el usuario inicie sesión
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Esta única línea crea todas las rutas para el CRUD de productos
    Route::resource('products', ProductController::class);
});

require __DIR__.'/auth.php';