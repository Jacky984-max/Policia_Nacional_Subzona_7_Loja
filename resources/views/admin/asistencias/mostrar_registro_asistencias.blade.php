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
                            <h4 class="card-title">Historial de Entradas y Salidas del Personal</h4>

                            <a href="{{ route('reportes.asistencias')}}"
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
                                        <th>Policía</th>
                                        <th>Código</th>
                                        <th>Fecha</th>
                                        <th>Hora de Entrada</th>
                                        <th>Hora de Salida</th>
                                      
                                        <th style="width: 10%">Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @php $i=1; @endphp

                                    @foreach($asistencias as $asistencia)

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

                                           
                                          
                                            <td>
                                               
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