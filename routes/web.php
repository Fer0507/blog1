<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;

// Rutas de autenticación
Auth::routes();

// Ruta principal para la página inicial (Página de bienvenida de Laravel)
Route::get('/', function () {
    return view('welcome'); // Cargar la página de bienvenida predeterminada de Laravel
})->name('welcome');

// Rutas del controlador de publicaciones (PostController)
Route::resource('posts', PostController::class)->names([
    'index' => 'posts.index',
    'create' => 'posts.create',
    'store' => 'posts.store',
    'show' => 'posts.show',
]);

// Ruta para el home después del login
Route::get('/home', function () {
    return redirect()->route('posts.index');
});
