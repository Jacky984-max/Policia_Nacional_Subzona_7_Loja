@extends('admin.sistema')

@push('js')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../assets/js/graficos.js"></script>
    
@endpush

@section('admin')
 
    <div class="container">
        <div class="page-inner">
            <h2>Reportes de Gestión - Gerencia</h2>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Reportes</h4>
                                <a href="{{ route('reportes.gerencia.pdf') }}"
                                    class="btn btn-label-success ms-auto btn-round me-4">
                                    <span class="btn-label">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    Descargar Reporte
                                </a>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="graficoUsuarios" data-json="{{ $graficoData }}"></canvas>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection
