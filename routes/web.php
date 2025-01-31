<?php

use App\Http\Controllers\Admin\DependenciaController;
use App\Http\Controllers\Admin\FlotaVehicularController;
use App\Http\Controllers\Admin\MantenimientoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SalirController;
use App\Http\Controllers\Admin\PerfilController;
use App\Http\Controllers\Admin\PersonalController;
use App\Http\Controllers\Admin\ReclamoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VincularPersonalController;
use App\Http\Controllers\ReclamoSugerenciaController;

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
})->name('welcome');

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
        Route::get('/personal/edit/{id}', 'Edit')->name('personal_policial.edit');
        Route::post('/personal/update', 'Update')->name('personal_policial.update');
        Route::get('/personal/eliminar/{id}', 'Destroy')->name('personal_policial.eliminar');

    });

    Route::controller(DependenciaController::class)->group(function () {
        Route::get('/dependencia/index', 'Index')->name('dependencia.index');
        Route::get('/dependencia/create', 'Create')->name('dependencia.create');
        Route::post('/dependencia/store', 'Store')->name('dependencia.store');
        Route::get('/dependencia/edit/{id}', 'Edit')->name('dependencia.edit');
        Route::post('/dependencia/update', 'Update')->name('dependencia.update');
        Route::get('/dependencia/delete/{id}', 'Destroy')->name('dependencia.delete');

    });

    Route::controller(FlotaVehicularController::class)->group(function () {
        Route::get('/flota_vehicular/index', 'Index')->name('flota_vehicular.index');
        Route::get('/flota_vehicular/create', 'Create')->name('flota_vehicular.create');
        Route::post('/flota_vehicular/store', 'Store')->name('flota_vehicular.store');
        Route::get('/flota_vehicular/edit/{id}', 'Edit')->name('flota_vehicular.edit');
        Route::post('/flota_vehicular/update', 'Update')->name('flota_vehicular.update');
        Route::get('/flota_vehicular/delete/{id}', 'Destroy')->name('flota_vehicular.delete');

    });

    Route::controller(ReclamoController::class)->group(function() {
        Route::get('/ver_reclamos/index', 'Index')->name('ver_reclamos.index');
        Route::get('/reclamos/descargar_reporte/{id}', 'descargar_reportePDF')->name('reclamos.decargar');


    });

    Route::controller(MantenimientoController::class)->group(function(){
        Route::get('/mantenimiento-vehicular', 'Index')->name('mantenimiento-vehicular.index');            
        Route::get('/solicitud-mantenimiento', 'Create')->name('solicitud-mantenimiento.create');
        Route::post('/solicitud-mantenimiento/store', 'Store')->name('solicitud-mantenimiento.store');
        Route::get('/solicitud-mantenimiento/edit/{id}', 'Edit')->name('solicitud-mantenimiento.edit');
        Route::post('/solicitud-mantenimiento/update', 'Update')->name('solicitud-mantenimiento.update');
        Route::get('/solicitud-mantenimiento/delete/{id}', 'Destroy')->name('solicitud-mantenimiento.delete');

    });

    Route::controller(VincularPersonalController::class)->group(function(){
        Route::get('/vincular_persopnal/index', 'Index')->name('vincular_personal.index');
        Route::get('/vincular_personal/create', 'Create')->name('vincular_personal.create');
        Route::post('/vincular_personal/store', 'Store')->name('vincular_personal.store');
        Route::get('/vincular_personal/edit/{id}', 'Edit')->name('vincular_personal.edit');
        Route::post('/vincular_personal/update', 'Update')->name('vincular_personal.update');
        Route::get('/vincular_personal/eliminar/{id}', 'Destroy')->name('vincular_personal.eliminar');

    });




    







});

//RUTA PARA USUARIO FINAL SIN AUTENTICACION//

Route::get('/reclamos-sugerencias', [ReclamoSugerenciaController::class, 'Index'])->name('reclamos-sugerencias.index');
Route::get('/reclamos-sugerencias/create', [ReclamoSugerenciaController::class, 'Create'])->name('reclamos-sugerencias.create');

Route::post('/reclamos-sugerencias/store', [ReclamoSugerenciaController::class, 'Store'])->name('reclamos-sugerencias.store');

require __DIR__.'/auth.php';
