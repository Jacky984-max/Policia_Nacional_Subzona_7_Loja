@extends('admin.sistema')


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

                                <!--<button onclick="window.print()" class="btn btn-primary btn-round">Imprimir</button>-->

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="graficoUsuarios"></canvas>
                            </div>


                        </div>
                    </div>
                </div>

                <!--<div class="col-md-6">
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
                                <canvas id="multipleBarChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>



        </div>


    </div>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!--<script>
        const ctxUsuarios = document.getElementById('graficoUsuarios').getContext('2d');
        new Chart(ctxUsuarios, {
            type: 'bar',
            data: {
                labels: ['Usuarios', 'Personal', 'Mantenimientos', 'Solicitudes'],
                datasets: [{
                    label: 'Cantidad',
                    data: [{{ $totalUsuarios }}, {{ $totalPersonal }}, {{ $totalMantenimientos }},
                        {{ $totalSolicitudes }}
                    ],
                    backgroundColor: ['blue', 'green', 'red', 'orange']
                }]
            }
        });
    </script>-->


    <script>
         var myBarChart = new Chart(graficoUsuarios, {
            type: "bar",
            data: {
               
                labels: ['Usuarios', 'Personal', 'Mantenimientos', 'Solicitudes'],
                datasets: [{
                    label: 'Cantidad',
                    data: [{{ $totalUsuarios }}, {{ $totalPersonal }}, {{ $totalMantenimientos }},
                        {{ $totalSolicitudes }}
                    ],
                    backgroundColor: ['blue', 'green', 'red', 'orange']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                        },
                    }, ],
                },
            },
        });
    </script>
@endsection
