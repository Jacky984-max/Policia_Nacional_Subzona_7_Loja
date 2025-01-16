<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFlotaVehicularRequest;
use App\Models\FlotaVehicular;
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
        return view('admin.flota_vehicular.create');
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
