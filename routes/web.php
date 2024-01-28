<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuariosController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Ruta personalizada para redireccionar a /home después de iniciar sesión
Route::get('/', [LoginController::class, 'showLoginForm'])->name('root');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('users', 'UserController');
    Route::resource('usuarios', 'usuarios\UsuariosController');
    Route::resource('casos', 'casos\CasosController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
