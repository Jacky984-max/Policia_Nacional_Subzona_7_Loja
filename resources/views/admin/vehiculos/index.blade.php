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
                <a href="{{ route('flota_vehicular.create')}}" class="btn btn-primary btn-round ms-auto me-2"><i
                        class="fa fa-plus"></i>
                    Agregar Vehículo
                </a>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Listar Flota Vehicular</h4>
                            <a href="{{ route('reportes.vehiculos') }}" class="btn btn-label-success ms-auto btn-round me-4">
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
                                        <th>Placa</th>
                                        <th>Tipo de Vehículo</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Chasis</th>
                                        <th>Motor</th>
                                        <th>Kilometraje</th>
                                        <th>Cilindraje</th>
                                        <th>Capacidad Carga</th>
                                        <th>Estado</th>
                                        <th style="width: 10%">Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php $i=1; @endphp

                                    @foreach ($flota as $vehi)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $vehi->placa }}</td>
                                            <td>{{ $vehi->tipo_vehiculo }}</td>
                                            <td>{{ $vehi->marca }}</td>
                                            <td>{{ $vehi->modelo }}</td>
                                            <td>{{ $vehi->chasis }}</td>
                                            <td>{{ $vehi->motor }}</td>
                                            <td>{{ $vehi->kilometraje }}</td>
                                            <td>{{ $vehi->cilindraje }}</td>
                                            <td>{{ $vehi->capacidad_carga }}</td>
                                            <td>
                                               
                                                <div class="badge badge-shadow"
                                                    style="background-color: {{ $vehi->estado_asignacion === 'Asignado' ? '#28a745' : '#dc3545' }}; color: white;">
                                                    {{ $vehi->estado_asignacion }}
                                                </div>

                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('flota_vehicular.edit', $vehi->id) }}"
                                                        data-bs-toggle="tooltip" title="Editar"
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <a data-bs-toggle="modal" title="Eliminar"
                                                        data-bs-target="#createAKIKeyModal-{{ $vehi->id }}"
                                                        class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                 

                                                </div>
                                            </td>
                                        </tr>

                                        <!--MODAL PARA ELIMINAR LA FLOTA VEHICULAR--->
                                        <div class="modal fade" id="createAKIKeyModal-{{ $vehi->id }}"
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
                                                        ¿Seguro que quieres eliminar esta flota vehicular?

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cerrar</button>
                                                        <form action="{{ route('flota_vehicular.delete', $vehi->id) }}"
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


@if (session('eliminar') == 'flota vehicular eliminada')
    <script>
        Swal.fire(
            'Eliminado!',
            'Flota Vehicular Eliminada con Éxito',
            'success'
        )
    </script>
@endif

@endsection