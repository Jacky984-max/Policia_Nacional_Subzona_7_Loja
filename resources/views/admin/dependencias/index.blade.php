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
                <a href="{{ route('dependencia.create') }}" class="btn btn-primary btn-round ms-auto me-2"><i
                        class="fa fa-plus"></i>
                    Agregar
                </a>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Listar Dependencias</h4>

                            <a href="{{ route('reportes.dependencias') }}"
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
                        <div class="table-responsive">

                            <table id="add-row" class="display table table-striped table-hover">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Provincia</th>
                                        <th>Número de Distrito</th>
                                        <th>Parroquia</th>
                                        <th>Código de Distrito</th>
                                        <th>Nombre de Distrito</th>
                                        <th>Número de Distrito</th>
                                        <th>Nombre de Cicuito</th>
                                        <th style="width: 10%">Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @php $i=1; @endphp

                                    @foreach ($depe1 as $dp)

                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>
                                                {{ $dp->provincia }}
                                            </td>
                                            <td>
                                                {{ $dp->numero_distrito }}
                                            </td>
                                            <td>
                                                {{ $dp->parroquia }}
                                            </td>
                                          
                                            <td>
                                                {{ $dp->cod_distrito }}
                                            </td>
                                          
                                            <td>
                                                {{ $dp->nombre_distrito }}
                                            </td>

                                            <td>
                                                {{ $dp->numero_distrito }}
                                            </td>
                                          
                                            <td>
                                                {{ $dp->nombre_circuito }}
                                            </td>
                                           

                                          
                                            <td>
                                                <div class="form-button-action">
                                                
                                                    <a href="{{ route('dependencia.edit', $dp->id) }}" data-bs-toggle="tooltip" title="Editar"
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <a data-bs-toggle="modal" title="Eliminar" data-bs-target="#createAKIKeyModal-{{ $dp->id }}" class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </a>

                                                   
                                                </div>
                                            </td>
                                        </tr>

                                          <!--MODAL PARA ELIMINAR DEPENDENCIAS--->

                                          <div class="modal fade" id="createAKIKeyModal-{{ $dp->id }}"
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
                                                        ¿Seguro que quieres eliminar esta dependencia?

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cerrar</button>
                                                        <form action="{{ route('dependencia.delete', $dp->id) }}"
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


@if (session('eliminar') == 'dependencia eliminada')

<script>
    Swal.fire(
        'Eliminado!',
        'Dependencia Eliminada con Éxito',
        'success'
    )
</script>

@endif

@endsection