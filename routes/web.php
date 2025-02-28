<?php

use App\Http\Controllers\Admin\AsignacionController;
use App\Http\Controllers\Admin\AsignacionVehiculoController;
use App\Http\Controllers\Admin\DependenciaController;
use App\Http\Controllers\Admin\EntregaVehiculoController;
use App\Http\Controllers\Admin\FlotaVehicularController;
use App\Http\Controllers\Admin\MantenimientoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SalirController;
use App\Http\Controllers\Admin\PerfilController;
use App\Http\Controllers\Admin\PersonalController;
use App\Http\Controllers\Admin\ReclamoController;
use App\Http\Controllers\Admin\ReporteController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VincularPersonalController;
use App\Http\Controllers\Policia\AsistenciaController;
use App\Http\Controllers\Policia\SolicitudController;
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
        return view('admin.tablero');
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

    Route::controller(PersonalController::class)->group(function () {
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

    Route::controller(ReclamoController::class)->group(function () {
        Route::get('/ver_reclamos/index', 'Index')->name('ver_reclamos.index');
        Route::get('/reclamos/descargar_reporte/{id}', 'descargar_reportePDF')->name('reclamos.decargar');
    });

    Route::controller(AsignacionController::class)->group(function () {
        Route::get('/asignacion', 'Index')->name('asignacion.index');
        Route::get('/asignar-vehiculo/create', 'Create')->name('asignar-vehiculo.create');
        Route::post('/asignar-vehiculo/store', 'Store')->name('asignar-vehiculo.store');
        Route::get('/asignar-vehiculo/edit/{id}', 'Edit')->name('asignar-vehiculo.edit');
        Route::post('/asignar-vehiculo/update', 'Update')->name('asignar-vehiculo.update');
        Route::get('/asignar-vehiculo/delete/{id}', 'Destroy')->name('asignar-vehiculo.delete');
    });

    Route::controller(VincularPersonalController::class)->group(function () {
        Route::get('/vincular_persopnal/index', 'Index')->name('vincular_personal.index');
        Route::get('/vincular_personal/create', 'Create')->name('vincular_personal.create');
        Route::post('/vincular_personal/store', 'Store')->name('vincular_personal.store');
        Route::get('/vincular_personal/edit/{id}', 'Edit')->name('vincular_personal.edit');
        Route::post('/vincular_personal/update', 'Update')->name('vincular_personal.update');
        Route::get('/vincular_personal/eliminar/{id}', 'Destroy')->name('vincular_personal.eliminar');
    });

    Route::controller(SolicitudController::class)->group(function () {
        Route::get('solicitud/index', 'Index')->name('solicitud.index');
        Route::get('solicitud-mantenimiento', 'Create')->name('solicitud.create');
        Route::post('/solicitud-mantenimiento/store', 'Store')->name('solicitud.store');
        Route::get('/solicitud-mantenimiento/edit/{id}', 'Edit')->name('solicitud.edit');
        Route::post('/solicitud-mantenimiento/update', 'Update')->name('solicitud.update');
        Route::get('gestionar-solicitudes', 'gestionarsolicitud')->name('gestionar.solicitud');
        Route::post('/solicitudes/{id}/confirmar', 'confirmar')->name('solicitudes.confirmar');
        Route::get('/solicitud-mantenimiento/eliminar/{id}', 'Destroy')->name('solicitud.eliminar');
    });

    Route::controller(MantenimientoController::class)->group(function () {
        Route::get('/mantenimiento', 'Index')->name('mantenimiento.index');
        Route::get('/mantenimientos/registro/{id}', 'Create')->name('mantenimientos.registro');
        Route::post('/mantenimientos/guardar/{id}', 'Store')->name('mantenimientos.guardar');
        Route::get('/mantenimientos/show/{mante}', 'Show')->name('mantenimientos.show');
        //Route::get('/ordenes/detalles/{ver}', 'verOrden')->name('ordenes.ver');
        Route::get('/mantenimientos/eliminar/{id}', 'Destroy')->name('mantenimientos.eliminar');
        Route::post('/mantenimientos/calcular-costo', 'calcularCosto')->name('mantenimientos.calcular');
        
        Route::get('/orden-trabajo', 'Vista_Orden')->name('ordenes.index');
        Route::get('/orden-trabajo/generar/{mantenimiento_id}', 'generarOrdenTrabajo')->name('ordenes.generar');
        Route::put('/ordenes-trabajo/finalizar/{id}', 'finalizar')->name('ordenes.finalizar');
        
        Route::get('/ordenes-trabajo/pdf/{id}', 'descargarPDF')->name('ordenes.pdf');
        //Route::get('/ordenes-trabajo/imprimir/{id}', 'imprimir')->name('ordenes.imprimir');

        Route::get('/ordenes-trabajo/{orden}', 'imprimirOrden')->name('ordenes.imprimir');

       
    });


    Route::controller(ReporteController::class)->group(function () {
        Route::get('/reportes/personal', 'personal')->name('reportes.personal');
        Route::get('/reportes/usuarios', 'usuarios')->name('reportes.usuarios');
        Route::get('/reportes/mantenimientos', 'mantenimientos')->name('reportes.mantenimientos');
        Route::get('/reportes/solicitudes', 'solicitudes')->name('reportes.solicitudes');
        Route::get('/reportes/dependecnias', 'dependencias')->name('reportes.dependencias');
        Route::get('/reportes/vehiculos', 'vehiculos')->name('reportes.vehiculos');

        //
        Route::get('/reportes/gerencia', 'index')->name('reportes.gerencia');
        Route::get('/reportes/gerencia/pdf', 'generarPDF')->name('reportes.gerencia.pdf');
        Route::get('/reportes/asistencia', 'asistencias')->name('reportes.asistencias');

        Route::get('/reportes/consultar', 'filtrarDatos')->name('reportes.consultar');

    });

    Route::controller(EntregaVehiculoController::class)->group(function () {
        Route::get('/entregas/{id}/crear', 'create')->name('entregas.create');
        Route::post('/entregas/{id}/guardar', 'store')->name('entregas.store');

    });

    Route::controller(AsistenciaController::class)->group(function () {
        Route::get('/asistencia',  'index')->name('asistencia.index');
        Route::post('/asistencia/registrar', 'registrarAsistencia')->name('asistencia.registrar');
        Route::get('/asistencia/historial', 'historial')->name('asistencia.historial');
       
    });


});

//RUTA PARA USUARIO FINAL SIN AUTENTICACION//

Route::get('/reclamos-sugerencias', [ReclamoSugerenciaController::class, 'Index'])->name('reclamos-sugerencias.index');
Route::get('/reclamos-sugerencias/create', [ReclamoSugerenciaController::class, 'Create'])->name('reclamos-sugerencias.create');
Route::post('/reclamos-sugerencias/store', [ReclamoSugerenciaController::class, 'Store'])->name('reclamos-sugerencias.store');
Route::get('/reclamos/dependencia/{id}', [ReclamoSugerenciaController::class, 'getCircuitoSubcircuito'])->name('reclamos.dependencia');


require __DIR__ . '/auth.php';
