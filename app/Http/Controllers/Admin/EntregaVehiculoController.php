<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EntregaVehiculo;
use App\Models\OrdenTrabajo;
use App\Models\Personal_policial;
use Illuminate\Http\Request;

class EntregaVehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.mantenimiento_vehicular.lista_entrega_vehiculos');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($orden_trabajo_id)
    {
        //
        $orden = OrdenTrabajo::findOrFail($orden_trabajo_id);
     
        if ($orden->entregaVehiculo) {
            return redirect()->route('ordenes.index')->with('error', 'La entrega de este vehículo ya fue registrada.');
        }

        $policiales = Personal_policial::all();
        return view('admin.mantenimiento_vehicular.entrega_vehiculo', compact('orden', 'policiales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $orden_trabajo_id)
    {
        //
        $request->validate([
            'fecha_entrega' => 'required|date',
            
            'personal_recibio_id' => 'required|exists:personal_policials,id',
            'kilometraje_actual' => 'required|integer',
            'observaciones' => 'nullable|string',
        ]);

        $orden = OrdenTrabajo::findOrFail($orden_trabajo_id);
   

        EntregaVehiculo::create([
            'orden_trabajo_id' => $orden->id,
            'fecha_entrega' => $request->fecha_entrega,
            'personal_recibio_id' => $request->personal_recibio_id,
            'kilometraje_actual' => $request->kilometraje_actual,
            'observaciones' => $request->observaciones,
        ]);
        return redirect()->route('ordenes.index')->with('success', 'Entrega registrada correctamente.');
    
    }

    /**
     * Display the specified resource.
     */

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
