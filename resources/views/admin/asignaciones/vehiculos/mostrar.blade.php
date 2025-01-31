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
                <a href="{{ route('asignar-vehiculo.create') }}" class="btn btn-primary btn-round ms-auto me-2"><i
                        class="fa fa-plus"></i>
                    Asignar a Subcircuito
                </a>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Lista de Vehículos Asignados a un Subcircuito</h4>

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
                                        <th>Subcircuito</th>
                                        <th>Fecha de Asignación</th>
                                        <th>Observación</th>
                                        <th style="width: 10%">Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php $i=1; @endphp

                                    @foreach ($asignacion as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->vehiculo->placa }}</td>
                                            <td>{{ $item->dependencia->nombre_sub_circuito }}</td>
                                            <td>

                                                <p class="fw-semibold mb-1"><span class="m-1"><i
                                                            class="fas fa-calendar-alt"></i></span>{{ \Carbon\Carbon::parse($item->fecha_asignacion)->format('d-m-Y') }}
                                                </p>
                                                <p class="fw-semibold mb-0"><span class="m-1"><i
                                                            class="far fa-clock"></i></span>{{ \Carbon\Carbon::parse($item->fecha_asignacion)->format('H:i') }}
                                                </p>

                                            </td>
                                            <td>{{ $item->observacion }}</td>
                                           
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('asignar-vehiculo.edit', $item->id) }}" data-bs-toggle="tooltip" title="Editar"
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <a data-bs-toggle="modal" title="Eliminar"
                                                        data-bs-target="#createAKIKeyModal-{{ $item->id }}"
                                                        class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>

                                        <!--MODAL PARA ELIMINAR LA FLOTA VEHICULAR--->
                                        <div class="modal fade" id="createAKIKeyModal-{{ $item->id }}"
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
                                                        ¿Seguro que quieres eliminar la asignacion de este vehiculo a subcircuito?

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cerrar</button>
                                                        <form
                                                            action="{{ route('asignar-vehiculo.delete', $item->id) }}"
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


<script>
    $(document).ready(function() {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
            pageLength: 3,
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
            pageLength: 3,
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
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
            scrollX: true, // Activa el desplazamiento horizontal
            responsive: true // Hace la tabla adaptativa
        });
    });
</script>

@if (session('eliminar') == 'el vehiculo asignado ha sido eliminado')
<script>
Swal.fire(
    'Eliminado!',
    'Vehiculo Asignado es Eliminado con Éxito',
    'success'
)
</script>
@endif

@endsection