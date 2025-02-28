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
                    <form action="{{ route('asistencia.registrar') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Código Personal</label>
                            <input type="text" name="codigo_personal" class="form-control"
                                placeholder="Ingresa tu código personal" required>
                        </div>
                        <button type="submit" class="btn btn-label-success btn-round">Registrar Entrada/Salida</button>
                    </form>


                </div>
            </div>

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Registro de Asistencias</h4>

                                <!--<a href=""
                                class="btn btn-label-success ms-auto btn-round me-4">
                                <span class="btn-label">
                                    <i class="fa fa-pencil"></i>
                                </span>
                                Descargar Reporte
                            </a>-->

                                <!--<form action="" method="POST" class=" ms-auto me-4">
                                    @csrf
                                    <button type="submit" class="btn btn-label-success btn-round">Registrar Entrada</button>
                                </form>
                            
                                <form action="" method="POST" class="me-4">
                                    @csrf
                                    <button type="submit" class="btn btn-label-success btn-round">Registrar Salida</button>
                                </form>-->




                            </div>
                        </div>
                        <div class="card-body">

                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}

                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif



                            <!----INICIO DE LA TABLA--->
                            <div class="table-responsive">

                                <table id="add-row" class="display table table-striped table-hover">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Policía</th>
                                            <th>Código Personal</th>
                                            <th>Fecha</th>
                                            <th>Hora de Entrada</th>
                                            <th>Hora de Salida</th>
                                        
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @php $i=1; @endphp

                                        @foreach ($asistencias as $asistencia)
                                            <tr>
                                                <td>{{ $i++ }}</td>

                                                <td>
                                                    {{ $asistencia->personalPolicial->nombre ?? 'No asignado' }}
                                                </td>

                                                <td>
                                                    {{ $asistencia->personalPolicial->codigo_personal ?? 'No asignado' }}
                                                </td>

                                                <td>
                                                    {{ $asistencia->fecha }}
                                                </td>

                                                <td>
                                                    {{ $asistencia->hora_entrada ?? 'Sin registro' }}

                                                </td>

                                                <td>
                                                    {{ $asistencia->hora_salida ?? 'Sin registro' }}
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