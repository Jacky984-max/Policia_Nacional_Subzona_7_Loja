<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAsignarVehiculoRequest;
use App\Models\AsignacionVehiculo;
use App\Models\Dependencia;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class AsignacionVehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $vehiculos = Vehiculo::where('estado_asignacion', 'No asignado')->get();

        $depen = Dependencia::all();

        $asignacion = AsignacionVehiculo::all();

        return view('admin.asignaciones.vehiculos.mostrar', compact('vehiculos', 'depen', 'asignacion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $flota_vehi = Vehiculo::all();

        $dependencias = Dependencia::all();

        return view('admin.asignaciones.vehiculos.asignar', compact('flota_vehi', 'dependencias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'dependencia_id' => 'required|exists:dependencias,id',
            'observacion' => 'nullable|string',
        ]);

        AsignacionVehiculo::create([
            'vehiculo_id' => $request->vehiculo_id,
            'dependencia_id' => $request->dependencia_id,
            'observacion' => $request->observacion,
        ]);

        $vehiculo = Vehiculo::find($request->vehiculo_id);
        $vehiculo->estado_asignacion = 'Asignado';
        $vehiculo->save();

        return redirect()->route('asignacion.index')->with('success', 'Vehículo asignado correctamente.');
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
    public function edit($id)
    {
        //
        $vehi_edit = AsignacionVehiculo::findOrFail($id);

        return view('admin.asignaciones.vehiculos.editar', compact('vehi_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAsignarVehiculoRequest $request, AsignacionVehiculo $asig_vehi)
    {
        //

        $asig_vehi = AsignacionVehiculo::find($request->hidden_id);

        $asig_vehi->observacion = $request->observacion;
        $asig_vehi->fecha_asignacion = $request->fecha_asignacion;
        $asig_vehi->save();

        return redirect()->route('asignacion.index')->with('success', 'el vehiculo asignado fue Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        AsignacionVehiculo::findOrFail($id)->delete();

        return redirect()->route('asignacion.index')->with('eliminar', 'el vehiculo asignado ha sido eliminado');
    }
}
