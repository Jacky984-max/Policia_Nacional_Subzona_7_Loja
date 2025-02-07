<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateVincularPersonalRequest;
use App\Models\AsignacionPersonal;
use App\Models\Dependencia;
use App\Models\Personal_policial;
use Illuminate\Http\Request;

class VincularPersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $personal = Personal_policial::where('estado_asignacion', 'No asignado')->get();

        $dependencia = Dependencia::all();

        $vinculacion = AsignacionPersonal::all();

        return view('admin.asignaciones.personal.mostrar_asignaciones', compact('personal', 'dependencia', 'vinculacion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $perso_policial = Personal_policial::all();

        $dependencia = Dependencia::all();

        return view('admin.asignaciones.personal.asignar', compact('perso_policial', 'dependencia'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'personal_id' => 'required|exists:personal_policials,id',
            'dependencia_id' => 'required|exists:dependencias,id',
            'observacion' => 'nullable|string',
        ]);

        AsignacionPersonal::create([
            'personal_id' => $request->personal_id,
            'dependencia_id' => $request->dependencia_id,
            'observacion' => $request->observacion,
        ]);

        $policia = Personal_policial::find($request->personal_id);
        $policia->estado_asignacion = 'Asignado';
        $policia->save();

        return redirect()->route('vincular_personal.index')->with('success', 'Vinculación realizada correctamente.');
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
        $modi = AsignacionPersonal::findOrFail($id);

        return view('admin.asignaciones.personal.editar', compact('modi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVincularPersonalRequest $request, AsignacionPersonal $vincu_poli)
    {
        //

        $vincu_poli = AsignacionPersonal::find($request->hidden_id);

        $vincu_poli->observacion = $request->observacion;
        $vincu_poli->fecha_asignacion = $request->fecha_asignacion;
        $vincu_poli->save();

        return redirect()->route('vincular_personal.index')->with('success', 'el personal asignado fue Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        AsignacionPersonal::findOrFail($id)->delete();

        return redirect()->route('vincular_personal.index')->with('eliminar', 'el personal asignado ha sido eliminado');
    }
}
