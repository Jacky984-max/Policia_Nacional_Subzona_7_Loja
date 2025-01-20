<?php

use App\Http\Controllers\Admin\DependenciaController;
use App\Http\Controllers\Admin\FlotaVehicularController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SalirController;
use App\Http\Controllers\Admin\PerfilController;
use App\Http\Controllers\Admin\PersonalController;
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
        Route::get('/usuarios/create', 'Create')->name('usuarios.create');
        Route::post('/usuarios/store', 'Store')->name('usuarios.store');
        Route::get('/usuarios/edit/{id}', 'Edit')->name('usuarios.edit');
        Route::post('/usuarios/update', 'Update')->name('usuarios.update');
        Route::get('/usuarios/delete/{id}', 'Destroy')->name('usuarios.delete');


    });

    Route::controller(PersonalController::class)->group(function() {
        Route::get('/personal_policial/index', 'Index')->name('personal_policial.index');
        Route::get('/personal/create', 'Create')->name('personal_policial.create');
        Route::post('/personal/store', 'Store')->name('personal_policial.store');

    });

    Route::controller(DependenciaController::class)->group(function () {
        Route::get('/dependencia/index', 'Index')->name('dependencia.index');
        Route::get('/dependencia/create', 'Create')->name('dependencia.create');
        Route::post('/dependencia/store', 'Store')->name('dependencia.store');

    });

    Route::controller(FlotaVehicularController::class)->group(function () {
        Route::get('/flota_vehicular/index', 'Index')->name('flota_vehicular.index');
        Route::get('/flota_vehicular/create', 'Create')->name('flota_vehicular.create');
        Route::post('/flota_vehicular/store', 'Store')->name('flota_vehicular.store');

    });

    







});


require __DIR__.'/auth.php';
