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
                <!--<a href="" class="btn btn-primary btn-round ms-auto me-2"><i
                                    class="fa fa-plus"></i>
                                Agregar
                            </a>-->
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
                        <div class="table-responsive" style="overflow-x: auto; max-width: 100%;">


                            <table id="basic-datatables" class="display table table-striped table-hover"
                                style="table-layout: auto; width: 100%;"
                                data-hs-datatables-options='{
                                     "paging": true,
                                      "searching": true,
                                      "ordering": true,
                                      "info": true
                                  }'>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Vehículo</th>
                                        <th>Descripción del Problema</th>
                                        <th>Fecha y Hora de Solicitud</th>
                                        <th>Estado</th>
                                        @if (Auth::user()->rolesPermitidos === '3')
                                            <th style="width: 10%">Acciones</th>
                                        @endif

                                    </tr>
                                </thead>

                                <tbody>
                                    @php $i=1; @endphp

                                    @foreach ($soli as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->vehiculo->placa }}</td>
                                            <td>{{ $item->descripcion }}</td>
                                            <td>
                                                <p class="fw-semibold mb-1"><span class="m-1"><i
                                                            class="fas fa-calendar-alt"></i></span>{{ \Carbon\Carbon::parse($item->fecha_hora)->format('d-m-Y') }}
                                                </p>
                                                <p class="fw-semibold mb-0"><span class="m-1"><i
                                                            class="far fa-clock"></i></span>{{ \Carbon\Carbon::parse($item->fecha_hora)->format('H:i') }}
                                                </p>
                                            </td>
                                            <td>
                                                @if ($item->estado == 'PENDIENTE')
                                                    <span
                                                        class="badge bg-danger btn-round ms-auto fw-semibold">Pendiente</span>
                                                @elseif($item->estado == 'EN PROCESO')
                                                    <span class="badge bg-secondary btn-round ms-auto fw-semibold">En
                                                        Proceso</span>
                                                @elseif($item->estado == 'COMPLETADO')
                                                    <span
                                                        class="badge bg-success btn-round ms-auto fw-semibold">Completado</span>
                                                @endif
                                            </td>

                                            <td>
                                                @if (in_array(Auth::user()->id, [1, 3, 4]) && $item->estado == 'PENDIENTE')
                                                    @if ($item->estado == 'PENDIENTE')
                                                        <form action="{{ route('solicitudes.confirmar', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-warning text-white fw-semibold">Confirmar
                                                                Solicitud</button>
                                                        </form>
                                                    @endif

                                                   
                                                @endif


                                                @if (in_array(Auth::user()->id, [1, 3, 4]) && $item->estado == 'EN PROCESO')
                                                    <a href="{{ route('mantenimientos.registro', $item->id) }}"
                                                        class="btn btn-primary">Registrar Mantenimiento</a>
                                                @endif
                                            </td>

                                           
                                        </tr>

                                        <!--MODAL PARA ELIMINAR LA FLOTA VEHICULAR--->
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
    $(document).ready(function() {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
            pageLength: 5,
            initComplete: function() {
                this.api()
                    .columns()
                    .every(function() {
                        var column = this;
                        var select = $(
                                '<select class="form-select"><option value=""></option></select>'
                            )
                            .appendTo($(column.footer()).empty())
                            .on("change", function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column
                                    .search(val ? "^" + val + "$" : "", true, false)
                                    .draw();
                            });

                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function(d, j) {
                                select.append(
                                    '<option value="' + d + '">' + d + "</option>"
                                );
                            });
                    });
            },
        });

        // Add Row
        $("#add-row").DataTable({
            pageLength: 5,
        });

        var action =
            '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function() {
            $("#add-row")
                .dataTable()
                .fnAddData([
                    $("#addName").val(),
                    $("#addPosition").val(),
                    $("#addOffice").val(),
                    action,
                ]);
            $("#addRowModal").modal("hide");
        });
    });
</script>

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

<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
            scrollX: true, // Activa el desplazamiento horizontal
            responsive: true // Hace la tabla adaptativa
        });
    });
</script>

@endsection