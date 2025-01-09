<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SalirController;
use App\Http\Controllers\Admin\PerfilController;
use App\Http\Controllers\Admin\UserController;

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
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//RUTA PARA ROL ADMIN
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.sistema');
    })->name('dashboard');

    Route::controller(SalirController::class)->group(function () {
        Route::get('/salir', 'index')->name('salir.index');

    });

    Route::controller(PerfilController::class)->group(function () {
        Route::get('/perfil/index', 'Index')->name('perfil.index');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/usuarios/index', 'Index')->name('usuarios.index');

    });




});


require __DIR__.'/auth.php';
