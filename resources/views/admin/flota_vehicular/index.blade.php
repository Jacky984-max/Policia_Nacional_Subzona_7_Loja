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
                <a href="{{ route('flota_vehicular.create') }}" class="btn btn-primary btn-round ms-auto me-2"><i
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
                            <h4 class="card-title">Listar Flota Vehicular</h4>

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
                                        <th>Tipo de Vehiculo</th>
                                        <th>Placa</th>
                                        <th>Chasis </th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Motor</th>
                                        <th style="width: 10%">Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @php $i=1; @endphp

                                    @foreach ($flota as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>

                                            <td>
                                                {{ $item->tipo_vehiculo }}
                                            </td>

                                            <td>
                                                {{ $item->placa }}
                                            </td>
                                            <td>
                                                {{ $item->chasis }}
                                            </td>
                                            <td>
                                                {{ $item->marca }}
                                            </td>
                                            <td>
                                                {{ $item->modelo }}
                                            </td>
                                            <td>
                                                {{ $item->motor }}
                                            </td>


                                            <td>
                                                <div class="form-button-action">
                                                    
                                                    <a href="{{ route('flota_vehicular.edit', $item->id ) }}" data-bs-toggle="tooltip" title="Editar"
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="button" data-bs-toggle="tooltip" title=""
                                                        class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
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