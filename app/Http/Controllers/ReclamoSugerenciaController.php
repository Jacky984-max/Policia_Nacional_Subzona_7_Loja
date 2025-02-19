<?php

namespace App\Http\Controllers;

use App\Models\Dependencia;
use App\Models\ReclamoSugerencia;
use Illuminate\Http\Request;

class ReclamoSugerenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $dependencias = Dependencia::all();

        return view('usuario_final.reclamos.reclamos', compact('dependencias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'dependencia_id' => 'required|exists:dependencias,id',
            'nombre_circuito' => 'required|string',
            'nombre_sub_circuito' => 'required|string',
        ]);

        ReclamoSugerencia::create($request->all());

        return redirect()->route('welcome')->with('success', 'Reclamo Enviado con Éxito');


    }

    public function getCircuitoSubcircuito($id)
    {
        $dependencia = Dependencia::findOrFail($id);
        return response()->json([
            'nombre_circuito' => $dependencia->circuito,
            'nombre_sub_circuito' => $dependencia->subcircuito,
        ]);
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
