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
                                <h4 class="card-title">Lista de Ordenes de Trabajo</h4>
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
                                            <th>Fecha de Registro</th>
                                            
                                            <th>Estado</th>
                                            <th style="width: 10%">Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php $i=1; @endphp

                                        @foreach ($ordenes as $orden)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>
                                                    {{ $orden->fecha_generacion }}
                                                </td>
                                               
                                                <td>
                                                    <span
                                                        class="badge {{ $orden->estado == 'Finalizado' ? 'bg-success' : 'bg-warning' }}">
                                                        {{ $orden->estado }}
                                                    </span>
                                                </td>



                                                <td>

                                                    <div class="dropdown">
                                                   
                                                        <a class="dropdown-item m-3"
                                                            href="{{ route('ordenes.ver', ['ver' => $orden]) }}">
                                                            <i class="fas fa-eye text-success"></i> Detalles
                                                        </a>

                                                        @if ($orden->estado == 'Pendiente')
                                                            <form action="{{ route('ordenes.finalizar', $orden->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-success m-3">Finalizar</button>

                                                            </form>
                                                        @endif


                                                        @if (!$orden->entregaVehiculo)
                                                            <a href="{{ route('entregas.create', $orden->id) }}"
                                                                class="btn btn-success">Registrar Entrega</a>
                                                        @else
                                                            <p class="text-success">✅ Vehículo entregado el
                                                                {{ $orden->entregaVehiculo->fecha_entrega }}</p>
                                                        @endif

                                                    </div>


                                                </td>


                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- 🛠️ Formulario de Entrega del Vehículo -->




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
@endsection
