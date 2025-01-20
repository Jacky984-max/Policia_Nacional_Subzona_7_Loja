<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateDependenciaRequest;
use App\Models\Dependencia;
use Illuminate\Http\Request;


class DependenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $depe1 = Dependencia::all();

        return view('admin.dependencias.index', compact('depe1'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.dependencias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $dependencias = new Dependencia($request->input());

        $dependencias->saveOrFail();

        return redirect()->route('dependencia.index')->with('success', 'dependencia registrada con éxito');
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

        $depe_po = Dependencia::findOrFail($id);

        return view('admin.dependencias.edit', compact('depe_po'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDependenciaRequest $request, Dependencia $denciapoli)
    {
        //
        $denciapoli = Dependencia::find($request->hidden_id);

        $denciapoli->provincia = $request->provincia;
        $denciapoli->cod_distrito = $request->cod_distrito;
        $denciapoli->cod_circuito = $request->cod_circuito;
        $denciapoli->cod_sub_circuito = $request->cod_sub_circuito;
        $denciapoli->numero_distrito = $request->numero_distrito;
        $denciapoli->nombre_distrito = $request->nombre_distrito;
        $denciapoli->nombre_circuito = $request->nombre_circuito;
        $denciapoli->nombre_sub_circuito = $request->nombre_sub_circuito;
        $denciapoli->parroquia = $request->parroquia;
        $denciapoli->numero_circuito = $request->numero_circuito;
        $denciapoli->numero_sub_circuito = $request->numero_sub_circuito;
        $denciapoli->save();

        return redirect()->route('dependencia.index')->with('success', 'Dependencia Actualizada con Éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Dependencia::findOrFail($id)->delete();

        return redirect()->route('dependencia.index')->with('eliminar', 'dependencia eliminada');

    }
}
