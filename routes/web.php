<?php

use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('principal');
});

//Ruta para mostrar vista Register
Route::get('/register', [RegisterController::class,'index'])->name("register");

//Ruta para enviar datos al servidor del registro
Route::post('/register', [RegisterController::class,'store']);

//Ruta para vista del muro de perfil del usuario autenticado
Route::get('/muro',[PostController::class, 'index'])->name("posts.index");

//Ruta para vista del login y obtener los datos
Route::get('/login',[LoginController::class, 'index'])->name("login");

//Ruta para la validacion de login y envio de datos
Route::post('/login', [LoginController::class, 'store']);

//Ruta para cerrar la sesión
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

//Ruta para el formulario de post para la publicación 
Route::get('/post/create',[PostController::class, 'create'])->name('post.create');

Route::post('/imagenes', [ImagenController::class,'store'])->name('imagenes.store');

//Ruta para almacenar las imagenes
Route::post('/posts', [PostController::class, 'store'])->name('post.store');

//Ruta para vista del muro de perfil de usuario autenticado
Route::get('/{user:username}',[PostController::class, 'index'])->name("posts.index");