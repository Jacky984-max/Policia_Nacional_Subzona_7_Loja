<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mantenimiento;
use App\Models\SolicitudMantenimiento;
use Illuminate\Http\Request;

class MantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $mantenimientos = Mantenimiento::with(['vehiculo', 'solicitud'])->get();

        return view('admin.recepcion_solicitudes.mostrar', compact('mantenimientos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
        $recepcion = SolicitudMantenimiento::findOrFail($id);

        if ($recepcion->estado !== 'EN PROCESO') {
    
            return redirect()->route('mantenimiento.index')->with('error', 'Esta solicitud aún no está en proceso.');
        }

        return view('admin.recepcion_solicitudes.create', compact('recepcion'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        //
        $request->validate([

            'fecha_ingreso' => 'required|date',
            'kilometraje' => 'required|numeric',
            'asunto' => 'required|string',
            'detalle' => 'required|string',
            'estado' => 'required|in:COMPLETADO',
        ]);

        $solicitud = SolicitudMantenimiento::findOrFail($id);

        if ($solicitud->estado !== 'EN PROCESO') {
            return redirect()->back()->with('error', 'La solicitud debe estar en proceso');
        }

        Mantenimiento::create([
            'solicitud_id' => $solicitud->id,
            'fecha_ingreso' => $request->fecha_ingreso,
            'kilometraje' => $request->kilometraje,
            'tipo_vehiculo' => $request->tipo_vehiculo,
            'placa' => $request->placa,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'asunto' => $request->asunto,
            'detalle' => $request->detalle,
            'estado' => $request->estado,
        ]);

        if ($request->estado == 'COMPLETADO') {
            $solicitud->estado = 'COMPLETADO';
            $solicitud->save();
        }

        return redirect()->route('mantenimiento.index')->with('success', 'Mantenimiento registrado correctamente.');

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
}
