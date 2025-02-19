<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dependencia;
use App\Models\Mantenimiento;
use App\Models\Personal_policial;
use App\Models\SolicitudMantenimiento;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $graficoData = json_encode([
            'labels' => ['Usuarios', 'Personal', 'Mantenimientos', 'Solicitudes'],
            'cantidad' => [
                User::count(), 
                Personal_policial::count(), 
                Mantenimiento::count(), 
                SolicitudMantenimiento::count()
            ],
            'colores' => ['blue', 'green', 'red', 'orange']
        ]);

        return view('admin.Reportes.mostrar_reportes', compact('graficoData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function generarPDF()
    {
        $mantenimientos = Mantenimiento::all();
        $pdf = PDF::loadView('admin.Reportes.reportes_gerencia', compact('mantenimientos'));
        return $pdf->download('reporte_gerencia.pdf');
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function personal()
    {
        $personal = Personal_policial::all();
        $pdf = PDF::loadView('admin.personal_policial.reportes', compact('personal'));
        return $pdf->download('reporte_personal.pdf');
    }

    public function usuarios()
    {
        $usuarios = User::with('roles')->get();
        $pdf = PDF::loadView('admin.usuarios.reportes_usuarios', compact('usuarios'));
        return $pdf->download('reporte_usuarios.pdf');
    }

     // 📌 Reporte de Mantenimientos
     public function mantenimientos()
     {
         $mantenimientos = Mantenimiento::all();
         $pdf = PDF::loadView('admin.mantenimiento_vehicular.reporte_mantenimiento', compact('mantenimientos'));
         return $pdf->download('reporte_mantenimientos.pdf');
     }

      // 📌 Reporte de Solicitudes de Mantenimiento
    public function solicitudes()
    {
        $solicitudes = SolicitudMantenimiento::all();
        $pdf = PDF::loadView('admin.mantenimiento_vehicular.reportes_solicitudes', compact('solicitudes'));
        return $pdf->download('reporte_solicitudes.pdf');
    }

    public function dependencias()
    {
        $dependencias = Dependencia::all();
        $pdf = PDF::loadView('admin.dependencias.reportes_dependencias', compact('dependencias'));
        return $pdf->download('reporte_dependencias.pdf');
    }

    public function vehiculos()
    {
        $vehiculos = Vehiculo::all();
        $pdf = PDF::loadView('admin.flota_vehicular.reportes_vehiculos', compact('vehiculos'));
        return $pdf->download('reporte_vehiculos.pdf');
    }
}
