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
                <!--<div class="ms-md-auto py-2 py-md-0">
                        <a href="" class="btn btn-primary btn-round ms-auto me-2"><i class="fa fa-plus"></i>
                            Agregar
                        </a>
                    </div>-->
            </div>

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Ver Reclamos</h4>

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
                                            <th>Tipo</th>
                                            <th>Detalle</th>
                                            <th>Circuito</th>
                                            <th>Subcircuito</th>
                                            <th style="width: 10%">Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @php $i=1; @endphp

                                        @foreach ($resuge as $sur)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>
                                                    {{ $sur->tipo }}
                                                </td>

                                                <td>
                                                    {{ $sur->detalle }}
                                                </td>

                                                <td>
                                                    {{ $sur->circuito }}
                                                </td>

                                                <td>
                                                    {{ $sur->sub_circuito }}
                                                </td>

                                                <td>
                                                    <div class="form-button-action">

                                                        <!--<a class="dropdown-item" href="">
                                                                <i class="bi bi-download dropdown-item-icon text-primary"></i> Descargar Pedido
                                                            </a>-->

                                                        <a href="{{ route('reclamos.decargar', $sur->id) }}" data-bs-toggle="tooltip" title="Descargar Reporte"
                                                            class="btn btn-link btn-primary btn-lg"
                                                            data-original-title="Edit Task">
                                                            <i class="fas fa-file-pdf"></i>
                                                        </a>

                                                    </div>
                                                </td>
                                            </tr>

                                            <!--MODAL PARA ELIMINAR DEPENDENCIAS--->
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
@endsection
