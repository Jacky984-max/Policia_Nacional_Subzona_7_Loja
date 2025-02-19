<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mantenimiento;
use App\Models\OrdenTrabajo;
use App\Models\Personal_policial;
use App\Models\SolicitudMantenimiento;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class MantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

        $mantenimientos = Mantenimiento::with(['vehiculo', 'solicitud'])->get();

        return view('admin.recepcion_solicitudes.mostrar', compact('mantenimientos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
        $recepcion = SolicitudMantenimiento::findOrFail($id);

        // Obtener el kilometraje desde la solicitud
        $kilometraje = $recepcion->kilometraje;

        // 
        if ($recepcion->estado !== 'EN PROCESO') {
            
            return redirect()->route('mantenimiento.index')->with('error', 'Esta solicitud aún no está en proceso.');
        }

        // Obtener el vehículo relacionado con la solicitud
        $vehiculo = Vehiculo::findOrFail($recepcion->flotavehicular_id);

        return view('admin.recepcion_solicitudes.create', compact('recepcion', 'vehiculo', 'kilometraje'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        //
        $request->validate([

            'fecha_ingreso' => 'required|date',
            'kilometraje' => 'required|numeric',
            'asunto' => 'required|string',
            'detalle' => 'required|string',
            'estado' => 'required|in:COMPLETADO',
            'tipo_mantenimiento' => 'required|string|in:Mantenimiento 1,Mantenimiento 2,Mantenimiento 3', // Validación correcta
            'subtotal' => 'required|numeric',
            'iva' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        
        $solicitud = SolicitudMantenimiento::findOrFail($id);

        $vehiculo = Vehiculo::where('id', $solicitud->vehiculo_id)->first();

        if ($solicitud->estado !== 'EN PROCESO') {
            return redirect()->back()->with('error', 'La solicitud debe estar en proceso');
        }

        // Crear registro en la tabla mantenimientos
        Mantenimiento::create([
            'solicitud_id' => $solicitud->id,
            'fecha_ingreso' => $request->fecha_ingreso,
            'kilometraje' => $request->kilometraje,
            'tipo_vehiculo' => $request->tipo_vehiculo ?? $vehiculo->tipo_vehiculo,
            'placa' => $request->placa ?? $vehiculo->placa,
            'marca' => $request->marca ?? $vehiculo->marca,
            'modelo' => $request->modelo ?? $vehiculo->modelo,
            'asunto' => $request->asunto,
            'detalle' => $request->detalle,
            'estado' => $request->estado,
            'tipo_mantenimiento' => $request->tipo_mantenimiento,
            'subtotal' => $request->subtotal,
            'iva' => $request->iva,
            'total' => $request->total,

        ]);

        // ✅ Si el mantenimiento se registra con estado "Finalizado", la solicitud pasa a "COMPLETADO"
        if ($request->estado == 'COMPLETADO') {
            $solicitud->estado = 'COMPLETADO';
            $solicitud->save();
        }

        return redirect()->route('mantenimiento.index')->with('success', 'Mantenimiento registrado correctamente.');
    }


    public function calcularCosto(Request $request)
    {
        $tipo = $request->tipo_mantenimiento;
        $subtotal = 0;

        if ($tipo === "Mantenimiento 1") $subtotal = 43.59;
        if ($tipo === "Mantenimiento 2") $subtotal = 60.00;
        if ($tipo === "Mantenimiento 3") $subtotal = 180.00;

        $iva = $subtotal * 0.12;
        $total = $subtotal + $iva;

        return response()->json([
            'subtotal' => number_format($subtotal, 2, '.', ''),
            'iva' => number_format($iva, 2, '.', ''),
            'total' => number_format($total, 2, '.', '')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mantenimiento $mante)
    {
        //
        return view('admin.mantenimiento_vehicular.detalles', ['mante' => $mante]);
    }
    public function verOrden(OrdenTrabajo $ver)
    {
        //

        return view('admin.mantenimiento_vehicular.ver_ordenes', ['ver' => $ver]);
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

    //

    public function Vista_Orden()
    {
        //

        $ordenes = OrdenTrabajo::with('mantenimiento')->get();

        return view('admin.mantenimiento_vehicular.ordenes_index', compact('ordenes'));
    }

    public function generarOrdenTrabajo($mantenimiento_id)
    {
        $mantenimiento = Mantenimiento::findOrFail($mantenimiento_id);

        if (OrdenTrabajo::where('mantenimiento_id', $mantenimiento_id)->exists()) {
            return redirect()->back()->with('error', 'Ya existe una orden de trabajo para este mantenimiento.');
        }

        // Crear la orden de trabajo
        OrdenTrabajo::create([
            'mantenimiento_id' => $mantenimiento->id,
          
            'fecha_generacion' => now(),
            'detalle_mantenimiento' => "Trabajo realizado en el vehículo: " . $mantenimiento->placa,
        
            'estado' => 'Pendiente',
        ]);

        return redirect()->route('ordenes.index')->with('success', 'Orden de trabajo generada correctamente.');
    }

    public function finalizar($id)
    {
        $orden = OrdenTrabajo::findOrFail($id);
        $orden->estado = 'Finalizado';
        $orden->save();

        return redirect()->route('ordenes.index')->with('success', 'Orden de trabajo finalizada.');
    }

    public function descargarPDF($id)
    {
        $orden = OrdenTrabajo::findOrFail($id);

        $pdf = PDF::loadView('admin.mantenimiento_vehicular.ordenes', compact('orden'));

        return $pdf->download('Orden_Trabajo_' . $orden->id . '.pdf');
    }

    public function imprimir($id)
    {
        $orden = OrdenTrabajo::findOrFail($id);

        return view('admin.mantenimiento_vehicular.ordenes_pdf', compact('orden'));
    }

    //



    //

    public function CrearEntrega($id)
    {
        $orden = Mantenimiento::findOrFail($id);

        $policiales = Personal_policial::all();

        return view('admin.mantenimiento_vehicular.entrega_vehiculo', compact('orden', 'policiales'));
    }

    public function entregarVehiculo(Request $request, $id)
    {
        $request->validate([
            'fecha_entrega' => 'required|date',
            'personal_entrego_id' => 'required|exists:personal_policials,id',
            'personal_recibio_id' => 'required|exists:personal_policials,id',
            'kilometraje_actual' => 'required|integer',
            'observaciones_entrega' => 'nullable|string',
        ]);

        $orden = OrdenTrabajo::findOrFail($id);

        // Calcular el próximo mantenimiento
        $proximo_mantenimiento = ($orden->mantenimiento->vehiculo->tipo == 'Motocicleta')
            ? $request->kilometraje_actual + 2000
            : $request->kilometraje_actual + 5000;

        // Registrar la entrega
        $orden->update([
            'fecha_entrega' => $request->fecha_entrega,
            'personal_entrego_id' => $request->personal_entrego_id,
            'personal_recibio_id' => $request->personal_recibio_id,
            'kilometraje_actual' => $request->kilometraje_actual,
            'kilometraje_proximo_mantenimiento' => $proximo_mantenimiento,
            'observaciones_entrega' => $request->observaciones_entrega,
        ]);

        return redirect()->route('ordenes.index')->with('success', 'Entrega registrada correctamente.');
    }

   
}
