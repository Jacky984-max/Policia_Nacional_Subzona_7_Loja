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
        //
        //$mantenimientos = Mantenimiento::with(['vehiculo', 'responsable'])->get();

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

        // 🔥 Obtener el kilometraje desde la solicitud
        $kilometraje = $recepcion->kilometraje;

        // 🔥 Verificar que la solicitud está en estado "Confirmada"
        if ($recepcion->estado !== 'EN PROCESO') {
            //abort(403, 'La solicitud debe estar confirmada para registrar mantenimiento.');
            return redirect()->route('mantenimiento.index')->with('error', 'Esta solicitud aún no está en proceso.');
        }

        // 🔥 Obtener el vehículo relacionado con la solicitud
        $vehiculo = Vehiculo::findOrFail($recepcion->flotavehicular_id);

        // 🔥 Obtener el responsable del vehículo (policía)
        //$responsable = Personal_policial::find($vehiculo->personal_id);

        // 🔥 Obtener el policía responsable del vehículo
        // $responsable = $vehiculo->personalPolicial; // 👈 Aquí obtenemos el responsable del vehículo


        return view('admin.recepcion_solicitudes.create', compact('recepcion', 'vehiculo', 'kilometraje'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        //
        $request->validate([

            //'vehiculo_id' => 'required|exists:vehiculos,id', // ✅ Asegura que existe en la BD
            'fecha_ingreso' => 'required|date',
            'kilometraje' => 'required|numeric',
            'asunto' => 'required|string',
            'detalle' => 'required|string',
            'estado' => 'required|in:COMPLETADO',
            //'tipo_mantenimiento' => 'required',
            'tipo_mantenimiento' => 'required|string|in:Mantenimiento 1,Mantenimiento 2,Mantenimiento 3', // 🔥 Validación correcta
            'subtotal' => 'required|numeric',
            'iva' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        // 🔥 Calcular costos según el tipo de mantenimiento
        /*switch ($request->tipo_mantenimiento) {
            case 'Mantenimiento 1':
                $subtotal = 43.59;
                break;
            case 'Mantenimiento 2':
                $subtotal = 60.00;
                break;
            case 'Mantenimiento 3':
                $subtotal = 180.00;
                break;
            default:
                $subtotal = 0;
        }

        // Calcular IVA y Total
        $iva = $subtotal * 0.12;
        $total = $subtotal + $iva;*/



        $solicitud = SolicitudMantenimiento::findOrFail($id);

        $vehiculo = Vehiculo::where('id', $solicitud->vehiculo_id)->first();

        //$responsable = Personal_policial::where('id', $solicitud->personal_id)->first();



        /*if (!$vehiculo) {
            return redirect()->route('mantenimiento.index')->with('error', 'El vehículo asociado no existe.');
        }*/

        if ($solicitud->estado !== 'EN PROCESO') {
            return redirect()->back()->with('error', 'La solicitud debe estar en proceso');
        }


        // Crear registro en la tabla mantenimientos
        Mantenimiento::create([
            'solicitud_id' => $solicitud->id,
            //'vehiculo_id' => $solicitud->vehiculo_id,
            //'responsable_id' => $solicitud->solicitante_id,
            //'tecnico_id' => Auth::id(), // Técnico que está registrando el mantenimiento
            //'responsable_id' => Auth::id(),

            'fecha_ingreso' => $request->fecha_ingreso,
            'kilometraje' => $request->kilometraje,
            //'tipo_vehiculo' => $request->tipo_vehiculo,
            'tipo_vehiculo' => $request->tipo_vehiculo ?? $vehiculo->tipo_vehiculo,
            'placa' => $request->placa ?? $vehiculo->placa,
            //'marca' => $request->marca,
            'marca' => $request->marca ?? $vehiculo->marca,
            //'modelo' => $request->modelo,
            'modelo' => $request->modelo ?? $vehiculo->modelo,
            //'nombre_responsable' => $request->nombre_responsable,
            'asunto' => $request->asunto,
            'detalle' => $request->detalle,

            //'responsable_vehiculo' => $pers ? "{$pers->nombre}" : 'No asignado',
            'estado' => $request->estado,
            'tipo_mantenimiento' => $request->tipo_mantenimiento,
            'subtotal' => $request->subtotal,
            'iva' => $request->iva,
            'total' => $request->total,

            //'subtotal' => $subtotal,
            //'iva' => $iva,
            //'total' => $total,

        ]);

        // Cambiar el estado de la solicitud a "En proceso" o "Finalizado"

        //$solicitud->estado = $request->estado;
        //$solicitud->save();

        // ✅ Si el mantenimiento se registra con estado "Finalizado", la solicitud pasa a "COMPLETADO"
        if ($request->estado == 'COMPLETADO') {
            $solicitud->estado = 'COMPLETADO';
            $solicitud->save();
        }

        return redirect()->route('mantenimiento.index')->with('success', 'Mantenimiento registrado correctamente.');
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

        // Verificar si ya existe una orden para este mantenimiento
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
        //$orden = OrdenTrabajo::findOrFail($id);
        //$pdf = Pdf::loadView('admin.ordenes_trabajo.ordenes_pdf', compact('orden'));
        //return $pdf->download('Orden_Trabajo_' . $orden->id . '.pdf');

        $orden = OrdenTrabajo::findOrFail($id);

        // Cargar la vista y pasar los datos del pedido
        $pdf = PDF::loadView('admin.mantenimiento_vehicular.ordenes', compact('orden'));

        // Descargar el PDF con el nombre "pedido-id.pdf"
        return $pdf->download('Orden_Trabajo_' . $orden->id . '.pdf');
    }

    public function imprimir($id)
    {
        $orden = OrdenTrabajo::findOrFail($id);

        //$pdf = Pdf::loadView('admin.ordenes_trabajo.ordenes_pdf', compact('orden'));

        //return $pdf->stream('Orden_Trabajo_' . $orden->id . '.pdf');

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

        // 🔥 Calcular el próximo mantenimiento
        $proximo_mantenimiento = ($orden->mantenimiento->vehiculo->tipo == 'Motocicleta')
            ? $request->kilometraje_actual + 2000
            : $request->kilometraje_actual + 5000;

        // 🔥 Registrar la entrega
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
