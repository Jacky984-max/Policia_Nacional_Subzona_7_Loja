<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mantenimiento;
use App\Models\OrdenTrabajo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrdenTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ordenes = OrdenTrabajo::with('mantenimiento')->get();

        return view('admin.ordenes_trabajo.index', compact('ordenes'));
    }

    /**
     * Show the form for creating a new resource.
     */
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

    public function generarOrdenTrabajo($mantenimiento_id)
    {
        $mantenimiento = Mantenimiento::findOrFail($mantenimiento_id);

        if (OrdenTrabajo::where('mantenimiento_id', $mantenimiento_id)->exists()) {
            return redirect()->back()->with('error', 'Ya existe una orden de trabajo para este mantenimiento.');
        }

        OrdenTrabajo::create([
            'mantenimiento_id' => $mantenimiento->id,
            'fecha_generacion' => now(),
            'detalle_mantenimiento' => "Trabajo realizado en el vehículo: " . $mantenimiento->placa,
            'estado' => 'Pendiente',
        ]);

        return redirect()->route('ordenes.index')->with('success', 'Orden de trabajo generada correctamente.');

    }

    public function finalizar($id)
    {
        $orden = OrdenTrabajo::findOrFail($id);
        $orden->estado = 'Finalizado';
        $orden->save();

        return redirect()->route('ordenes.index')->with('success', 'Orden de trabajo finalizada.');
    }

    public function descargarPDF($id)
    {
        $orden = OrdenTrabajo::findOrFail($id);
        $pdf = Pdf::loadView('admin.ordenes_trabajo.ordenes_pdf', compact('orden'));
        return $pdf->download('Orden_Trabajo_' . $orden->id . '.pdf');
    }

    public function imprimir($id)
    {
        $orden = OrdenTrabajo::findOrFail($id);
        $pdf = Pdf::loadView('admin.ordenes_trabajo.ordenes_pdf', compact('orden'));
        return $pdf->stream('Orden_Trabajo_' . $orden->id . '.pdf');
    }
}
