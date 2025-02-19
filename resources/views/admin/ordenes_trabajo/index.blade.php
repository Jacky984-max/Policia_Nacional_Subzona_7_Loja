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
                                            <th>Fecha</th>
                                            <th>Detalle</th>
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
                                                    
                                                    <p class="fw-semibold mb-1"><span class="m-1"><i
                                                        class="fas fa-calendar-alt"></i></span>{{ \Carbon\Carbon::parse($orden->fecha_generacion)->format('d-m-Y') }}
                                                    </p>
                                                     <p class="fw-semibold mb-0"><span class="m-1"><i
                                                        class="far fa-clock"></i></span>{{ \Carbon\Carbon::parse($orden->fecha_generacion)->format('H:i') }}
                                            </p>
                                                </td>

                                                <td> {{ $orden->detalle_mantenimiento }}</td>
                                                
                                                <td>
                                                    <span
                                                        class="badge {{ $orden->estado == 'Finalizado' ? 'bg-success' : 'bg-warning' }}">
                                                        {{ $orden->estado }}
                                                    </span>
                                                </td>

                                                <td>

                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-label-dark dropdown-toggle"
                                                            type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            Acciones
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item"
                                                                href="{{ route('ordenes.pdf', $orden->id) }}">Descargar
                                                                PDF</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('ordenes.imprimir', $orden->id) }}">Imprimir</a>

                                                            @if ($orden->estado == 'Pendiente')
                                                                <form action="{{ route('ordenes.finalizar', $orden->id) }}"
                                                                    method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="btn btn-sm btn-success m-3">Finalizar</button>
                                                                        
                                                                </form>
                                                            @endif
                                                        </div>


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

@endsection
