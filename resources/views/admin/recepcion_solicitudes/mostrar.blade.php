@extends('admin.sistema')

@push('css')
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@section('admin')
    @include('layouts.partials.alert')

    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>

                </div>

                <div class="ms-md-auto py-2 py-md-0">

                </div>
            </div>

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Lista de Mantenimientos</h4>
                                <a href="{{ route('reportes.mantenimientos') }}"
                                    class="btn btn-label-success ms-auto btn-round me-4">
                                    <span class="btn-label">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    Descargar Reporte
                                </a>
                            </div>
                        </div>
                        <div class="card-body">

                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}

                                </div>
                            @endif

                            <!----INICIO DE LA TABLA--->
                            <div class="table-responsive" style="overflow-x: auto; max-width: 100%;">
                                <table id="basic-datatables" class="display table table-striped table-hover"
                                    style="table-layout: auto; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Fecha de Ingreso</th>
                                            <th>Vehiculo o Placa</th>
                                            <th>Asunto</th>
                                            <!--<th>Responsable del Mantenimiento</th>-->
                                            <th>Estado</th>
                                            <th style="width: 10%">Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php $i=1; @endphp

                                        @foreach ($mantenimientos as $mantenimiento)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>
                                                    <p class="fw-semibold mb-1"><span class="m-1"><i
                                                                class="fas fa-calendar-alt"></i></span>{{ \Carbon\Carbon::parse($mantenimiento->fecha_ingreso)->format('d-m-Y') }}
                                                    </p>
                                                    <p class="fw-semibold mb-0"><span class="m-1"><i
                                                                class="far fa-clock"></i></span>{{ \Carbon\Carbon::parse($mantenimiento->fecha_ingreso)->format('H:i') }}
                                                    </p>
                                                </td>
                                                <td>
                                                    {{ $mantenimiento->placa }}
                                                </td>

                                                <td>
                                                    {{ $mantenimiento->asunto }}
                                                </td>

                                                <td>
                                                    @if ($mantenimiento->estado == 'COMPLETADO')
                                                        <span class="badge bg-success">COMPLETADO</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <!--<div class="form-button-action">
                                                                    

                                                                    @if (!$mantenimiento->ordenTrabajo)
    <a href="{{ route('ordenes.generar', $mantenimiento->id) }}"
                                                                            class="btn btn-sm btn-success">
                                                                            Generar Orden
                                                                        </a>
@else
    <span class="badge bg-primary">Orden Generada</span>
    @endif

                                                                   

                                                                </div>-->

                                                    <a class="dropdown-item m-3"
                                                        href="{{ route('mantenimientos.show', ['mante' => $mantenimiento]) }}">
                                                        <i class="fas fa-eye text-success"></i> Detalles
                                                    </a>

                                                </td>

                                            </tr>

                                            <!--MODAL PARA ELIMINAR LA FLOTA VEHICULAR--->
                                            <div class="modal fade" id="createAKIKeyModal-" tabindex="-1"
                                                aria-labelledby="createAKIKeyModalLabel" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <!-- Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="createAKIKeyModalLabel">Mensaje de
                                                                confirmación</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <!-- End Header -->

                                                        <!-- Body -->
                                                        <div class="modal-body">
                                                            <!-- Form -->
                                                            ¿Seguro que quieres eliminar este Mantenimiento?

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cerrar</button>
                                                            <form action="" method="get">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-danger">Confirmar</button>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
