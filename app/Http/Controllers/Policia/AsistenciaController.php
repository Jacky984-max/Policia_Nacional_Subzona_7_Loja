<?php

namespace App\Http\Controllers\Policia;

use App\Http\Controllers\Controller;
use App\Models\Personal_policial;
use App\Models\RegistroAsistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $user = Auth::user();

        $rolesPermitidos = [1, 3, 4];

        if (in_array($user->id, $rolesPermitidos)) {
            // 🔥 Admins y Técnicos ven todas las asistencias
            $asistencias = RegistroAsistencia::all();
        } else {
            // 🔥 Policías solo ven sus propias asistencias
            $asistencias = RegistroAsistencia::where('personal_policial_id', $user->personalPolicial->id ?? 0)->get();
        }

        return view('policia_UI.listar_asistencia', compact('asistencias'));
    }

    public function registrarAsistencia(Request $request)
    {
        $request->validate([
            'codigo_personal' => 'required|string|exists:personal_policials,codigo_personal',
        ]);

        $policia = Personal_policial::where('codigo_personal', $request->codigo_personal)->first();

        if (!$policia) {
            return redirect()->back()->with('error', 'Código no válido.');
        }

        $registro = RegistroAsistencia::where('personal_policial_id', $policia->id)
            ->whereDate('fecha', now()->toDateString())
            ->first();

        if (!$registro) {
            RegistroAsistencia::create([
                'personal_policial_id' => $policia->id,
                'fecha' => now()->toDateString(),
                'hora_entrada' => now()->toTimeString(),
                //'estado' => 'Presente'
            ]);
            return redirect()->route('asistencia.index')->with('success', 'Entrada registrada correctamente.');
        } elseif (!$registro->hora_salida) {
            $registro->update(['hora_salida' => now()->toTimeString()]);
            return redirect()->route('asistencia.index')->with('success', 'Salida registrada correctamente.');
        }

        return redirect()->back()->with('error', 'Ya registraste tu entrada y salida hoy.');
    }

    public function historial()
    {
        $rolesPermitidos = [1, 3, 4]; // Admin, Técnico 1 y Técnico 2
        $user = Auth::user();

        if (!in_array($user->id, $rolesPermitidos)) {
            return redirect()->route('asistencia.index')->with('error', 'No tienes permisos para acceder a este módulo.');
        }

        $asistencias = RegistroAsistencia::with('personalPolicial')->orderBy('fecha', 'desc')->get();
        return view('admin.asistencias.mostrar_registro_asistencias', compact('asistencias'));
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
}
