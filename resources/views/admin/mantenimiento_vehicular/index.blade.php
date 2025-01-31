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
                
                @can('solicitud-mantenimiento.create')
                      <a href="{{ route('solicitud-mantenimiento.create')}}" class="btn btn-primary btn-round ms-auto me-2"><i
                        class="fa fa-plus"></i>
                    Añadir Solicitud
                </a>
                @endcan
              
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Lista de Solicitudes de Mantenimiento Vehicular</h4>

                        </div>
                    </div>
                    <div class="card-body">

                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}

                            </div>
                        @endif

                        <!----INICIO DE LA TABLA--->
                        <div class="table-responsive">

                            <table id="add-row" class="display table table-striped table-hover">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Vehículo</th>
                                        <th>Tipo de Mantenimiento</th>
                                        <th>Descripción del Problema</th>
                                        <th>Kilometraje</th>
                                        <th>Fecha y Hora de Solicitud</th>
                                        <th>Solicitante</th>
                                        <th>Observaciones</th>
                                        <th>Estado</th>
                                        <th style="width: 10%">Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @php $i=1; @endphp

                                    @foreach ($mantenimiento as $mante)
                                        <tr>
                                            <td>{{ $i++ }}</td>

                                            <td>
                                               {{ $mante->flota->placa}}
                                            </td>
                                            <td>
                                                {{ $mante->tipo_mantenimiento }}
                                            </td>
                                            <td>
                                                {{ $mante->descripcion }}
                                            </td>
                                            <td>
                                                {{ $mante->kilometraje}}
                                            </td>
                                            <td>
                                                
                                                <p class="fw-semibold mb-1"><span class="m-1"><i class="fas fa-calendar-alt"></i></span>{{\Carbon\Carbon::parse($mante->fecha_hora)->format('d-m-Y')}}</p>
                                                <p class="fw-semibold mb-0"><span class="m-1"><i class="far fa-clock"></i></span>{{\Carbon\Carbon::parse($mante->fecha_hora)->format('H:i')}}</p>
                                            </td>
                                            <td>
                                                {{ $mante->solicitante }}
                                            </td>
                                            <td>
                                                {{ $mante->observacion}}
                                            </td>
                                            <td>
                                                <div class="badge badge-shadow"
                                                style="background-color: {{ $mante->estado === 'Pendiente' ? '#28a745' : '#dc3545' }}; color: white;">
                                                {{ $mante->estado }}
                                            </div>
                                            </td>

                                        
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="" data-bs-toggle="tooltip" title="Editar"
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    
                                                    <a data-bs-toggle="modal" title="Eliminar" data-bs-target="#createAKIKeyModal-{{ $mante->id }}" class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>

                                        <!--MODAL PARA ELIMINAR LA FLOTA VEHICULAR--->
                                        <div class="modal fade" id="createAKIKeyModal-{{ $mante->id }}"
                                            tabindex="-1" aria-labelledby="createAKIKeyModalLabel" role="dialog"
                                            aria-hidden="true">
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
                                                        ¿Seguro que quieres eliminar esta solicitud de mantenimiento vehicular?

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cerrar</button>
                                                        <form action="{{ route('solicitud-mantenimiento.delete', $mante->id)}}"
                                                            method="get">
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

<script>
    WebFont.load({
        google: {
            families: ["Public Sans:300,400,500,600,700"]
        },
        custom: {
            families: [
                "Font Awesome 5 Solid",
                "Font Awesome 5 Regular",
                "Font Awesome 5 Brands",
                "simple-line-icons",
            ],
            urls: ["../assets/css/fonts.min.css"],
        },
        active: function() {
            sessionStorage.fonts = true;
        },
    });
</script>

@if (session('eliminar') == 'solicitud de mantenimiento eliminada')

<script>
    Swal.fire(
        'Eliminado!',
        'Solicitud Eliminada con Éxito',
        'success'
    )
</script>

@endif

@endsection