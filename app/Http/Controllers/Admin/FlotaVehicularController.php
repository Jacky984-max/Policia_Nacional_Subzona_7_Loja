<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFlotaVehicularRequest;
use App\Http\Requests\UpdateFlotaRequest;
use App\Models\FlotaVehicular;
use App\Models\Personal_policial;
use Illuminate\Http\Request;

class FlotaVehicularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $flota = FlotaVehicular::all();

        return view('admin.flota_vehicular.index', compact('flota'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $personal = Personal_policial::all();

        return view('admin.flota_vehicular.create', compact('personal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFlotaVehicularRequest $request)
    {
        //
        $vehicular = FlotaVehicular::create($request->validated() + [

            'tipo_vehiculo'=> $request->tipo_vehiculo, 
            'marca' => $request->marca, 
            'kilometraje' => $request->kilometraje,
            'capacidad_pasajeros'=> $request->capacidad_pasajeros, 
            'placa'=> $request->placa, 
            'modelo'=> $request->modelo, 
            'cilindraje'=> $request->cilindraje, 
            'chasis'=> $request->chasis, 
            'motor'=> $request->motor, 
            'capacidad_carga'=> $request->capacidad_carga,
            'personal_id' => $request->personal_id,

        ]);

        $vehicular ->saveOrFail();

        return redirect()->route('flota_vehicular.index')->with('success', 'flota vehicular registrada');



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
        $flove = FlotaVehicular::findOrFail($id);

        return view('admin.flota_vehicular.edit', compact('flove'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update (UpdateFlotaRequest $request, FlotaVehicular $vehi_flo)
    {
        //
        $vehi_flo = FlotaVehicular::find($request->hidden_id);

        
        $vehi_flo->tipo_vehiculo = $request->tipo_vehiculo;
        $vehi_flo->marca = $request->marca;
        $vehi_flo->kilometraje = $request->kilometraje;
        $vehi_flo->capacidad_pasajeros = $request->capacidad_pasajeros;
        $vehi_flo->placa = $request->placa;
        $vehi_flo->modelo = $request->modelo;
        $vehi_flo->cilindraje = $request->cilindraje;
        $vehi_flo->chasis = $request->chasis;
        $vehi_flo->motor = $request->motor;
        $vehi_flo->capacidad_carga = $request->capacidad_carga;
        $vehi_flo->save();

        return redirect()->route('flota_vehicular.index')->with('success', 'Flota Policial Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        FlotaVehicular::findOrFail($id)->delete();

        return redirect()->route('flota_vehicular.index')->with('eliminar', 'flota vehicular eliminada');
    }
}
