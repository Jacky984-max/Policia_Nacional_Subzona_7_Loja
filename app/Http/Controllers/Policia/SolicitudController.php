<?php

namespace App\Http\Controllers\Policia;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMantenimientoRequest;
use App\Models\Personal_policial;
use App\Models\SolicitudMantenimiento;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitudController extends Controller
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
         
            $mantenimiento = SolicitudMantenimiento::where('estado', 'EN PROCESO')->get();
        } else {
          
            $mantenimiento = SolicitudMantenimiento::where('solicitante', $user->id)->get();
        }

        return view('policia_UI.ver_solicitud', compact('mantenimiento'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $solicitud = Vehiculo::all();

        $personal = Personal_policial::all();

        return view('policia_UI.registrar_solicitud', compact('solicitud', 'personal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMantenimientoRequest $request)
    {
        //
        $mante_vehicular = SolicitudMantenimiento::create($request->validated() + [

            'tipo_mantenimiento' => $request->tipo_mantenimiento,
            'descripcion' => $request->descripcion,
            'fecha_hora' => $request->fecha_hora,
            'kilometraje' => $request->kilometraje,
            'observacion' => $request->observacion,
            'flotavehicular_id' => $request->flotavehicular_id,
            'solicitante' => Auth::id(),

        ]);

        $mante_vehicular->saveOrFail();

        return redirect()->route('solicitud.index')->with('success', 'Solicitud registrada');
    }

    public function gestionarsolicitud(){

        $user = Auth::user();

        $rolesPermitidos = [1, 3, 4];

        if (in_array($user->id, $rolesPermitidos)) {

            $soli = SolicitudMantenimiento::all();
        } else {
        
            $soli = SolicitudMantenimiento::where('solicitante', $user->id)->get();
        }

        return view('admin.mantenimiento_vehicular.index', compact('soli'));


    }

    public function confirmar($id){

        $user = Auth::user();

        $rolesPermitidos = [1, 3, 4];

        if (!in_array($user->id, $rolesPermitidos)) {
            return redirect()->back()->with('error', 'No tienes permiso para confirmar esta solicitud.');
        }

        $soli = SolicitudMantenimiento::findOrFail($id);

        if ($soli->estado !== 'PENDIENTE') {
            return redirect()->back()->with('error', 'Solo se pueden confirmar solicitudes en estado Pendiente.');
        }

        $soli->estado = 'EN PROCESO';
        $soli->save();

        return redirect()->route('gestionar.solicitud')->with('success', 'Solicitud confirmada.');

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
