<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMantenimientoRequest;
use App\Models\FlotaVehicular;
use App\Models\Mantenimiento;
use Illuminate\Http\Request;

class MantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $mantenimiento = Mantenimiento::select('mantenimientos.id', 'tipo_mantenimiento', 'descripcion', 'solicitante', 'fecha_hora', 'observacion', 'flotavehicular_id', 'placa', 'estado')

        ->join('flota_vehiculars', 'flota_vehiculars.id', '=', 'mantenimientos.flotavehicular_id')

        ->get();

        return view('admin.mantenimiento_vehicular.index', compact('mantenimiento'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $solicitud = FlotaVehicular::all();
        return view('admin.mantenimiento_vehicular.create', compact('solicitud'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMantenimientoRequest $request)
    {
        //
        $mante_vehicular = Mantenimiento::create($request->validated() + [
            
            'tipo_mantenimiento' => $request->tipo_mantenimiento,
            'descripcion' => $request->descripcion,
            'solicitante' => $request->solicitante,
            'fecha_hora' => $request->fecha_hora,
            'kilometraje' => $request->kilometraje,
            'observacion' => $request->observacion,
            'flotavehicular_id' => $request->flotavehicular_id,
            //'estado' => $request->estado,

        ]);

        $mante_vehicular->saveOrFail();

        return redirect()->route('mantenimiento-vehicular.index')->with('success', 'Solicitud registrada');
      
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
    public function destroy($id)
    {
        //
        Mantenimiento::findOrFail($id)->delete();

        return redirect()->route('mantenimiento-vehicular.index')->with('eliminar', 'solicitud de mantenimiento eliminada');
    }
}
