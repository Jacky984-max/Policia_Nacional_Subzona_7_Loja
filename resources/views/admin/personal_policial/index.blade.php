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
                <a href="{{ route('personal_policial.create') }}" class="btn btn-primary btn-round ms-auto me-2"><i class="fa fa-plus"></i>
                    Agregar
                </a>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Listar Personal Policial</h4>

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
                                        <th>Cédula</th>
                                        <th>Nombres y Apellidos</th>
                                        <th>Tipo de Sangre</th>
                                        <th>Ciudad de Nacimiento</th>
                                        <th>Celular</th>
                                        <th>Rango</th>
                                        <th>Dependencia</th>
                                        <th>Estado</th>
                                        <th style="width: 10%">Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @php $i=1; @endphp

                                    @foreach ($personal as $pers)


                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>
                                                {{ $pers->cedula }}
                                            </td>
                                            <td>
                                                {{$pers->nombres}} {{$pers->apellidos}}
                                            </td>
                                            <td>
                                                {{ $pers->tipo_sangre }}
                                            </td>
                                            <td>
                                                {{ $pers->ciudad_nacimiento }}
                                            </td>
                                            <td>
                                                {{ $pers->celular }}
                                            </td>
                                            <td>
                                                {{ $pers->rango }}
                                            </td>

                                            <td>
                                                {{ $pers->dependencia->nombre_distrito}}

                                            </td>

                                            <td>
                                                <div class="badge badge-shadow"
                                                style="background-color: {{ $pers->estado_asignacion === 'Asignado' ? '#28a745' : '#dc3545' }}; color: white;">
                                                {{ $pers->estado_asignacion }}
                                            </div>

                                            </td>


                                            <td>
                                                <div class="form-button-action">
                                                   
                                                    <a type="button" href="{{ route('personal_policial.edit', $pers->id) }}" data-bs-toggle="tooltip" title="Editar"
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    
                                                    <a data-bs-toggle="modal" title="Eliminar" data-bs-target="#createAKIKeyModal-{{ $pers->id }}" class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                         <!--MODAL PARA ELIMINAR PERSONAL-->
                                         <div class="modal fade" id="createAKIKeyModal-{{ $pers->id }}"
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
                                                        ¿Seguro que quieres eliminar este personal policial?

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cerrar</button>
                                                        <form action="{{ route('personal_policial.eliminar', $pers->id) }}"
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

@if (session('eliminar') == 'personal eliminado')

<script>
    Swal.fire(
        'Eliminado!',
        'Personal Eliminado con Éxito',
        'success'
    )
</script>

@endif

@endsection