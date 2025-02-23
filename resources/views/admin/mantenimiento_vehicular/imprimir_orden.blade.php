<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Ordenes de Trabajo</title>

    <!--STYLESHEET-->
    <!--=================================================-->
    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('final\css\bootstrap.min.css') }}" rel="stylesheet">
    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('final\css\nifty.min.css') }}" rel="stylesheet">
    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="{{ asset('final\css\demo\nifty-demo-icons.min.css') }}" rel="stylesheet">
    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="{{ asset('final\plugins\pace\pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('final\plugins\pace\pace.min.js') }}"></script>
    <!--Demo [ DEMONSTRATION ]-->
    <link href="{{ asset('final\css\demo\nifty-demo.min.css') }}" rel="stylesheet">

</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg print-content">

        <div class="boxed">

            <div id="content-container col-lg-8 mb-5 mb-lg-0">
                <div id="page-head">
                </div>

                <div id="page-content">

                    <div class="panel">
                        <div class="panel-body">
                            <div class="invoice-masthead">
                                <div class="invoice-text">
                                    <h3 class="h1 text-uppercase text-thin mar-no text-primary">ORDEN DE TRABAJO-FLOTA POLICIAL</h3>
                                    <strong class="text-right">Sub - Zona7 Loja</strong><br>
                                </div>
                                <div class="invoice-brand" style="white-space:nowrap">
                                    <div class="invoice-logo">
                                        <img width="60" src="{{ asset('assets/img/logo.png') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="invoice-bill row">
                                <div class="col-sm-6 text-xs-center">
                                    <address>
                                       
                                       
                                    </address>
                                </div>
                                <div class="col-sm-6 text-xs-center">
                                    <table class="invoice-details">
                                        <tbody>
                                            <tr>
                                                <td class="text-main text-bold">Orden de Trabajo #</td>
                                                <td class="text-right text-info text-bold">{{ $orden->id }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-main text-bold">Estado</td>
                                                <td class="text-right"><span
                                                        class="badge badge-success">{{ $orden->estado }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-main text-bold">Fecha</td>
                                                <td class="text-right">{{ $orden->created_at->format('d/m/Y') }}</td>
                                            </tr>

                                            <tr>
                                                <td class="text-main text-bold">Creado Por</td>
                                                <td class="text-right">{{ strtoupper(auth()->user()->name) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <hr class="new-section-sm bord-no">

                            <div class="row">
                                <div class="col-lg-12 table-responsive">
                                    <table class="table table-bordered invoice-summary">
                                        <thead>
                                            <tr class="bg-trans-dark">
                                                <!--<th class="text-uppercase">Description</th>-->
                                                <th class="min-col text-center text-uppercase">Descripción</th>
                                                <th class="min-col text-center text-uppercase">Fecha de Ingreso</th>
                                             
                                                <th class="min-col text-center text-uppercase">Datos del Vehículo</th>
                                                <th class="min-col text-center text-uppercase">Tipo de Vehículo</th>
                                                <th class="min-col text-center text-uppercase">Tipo de Mantenimiento</th>
                                                <th class="min-col text-right text-uppercase">Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <strong>{{ $orden->asunto }}</strong>

                                                </td>
                                                <td class="text-center">
                                                    <p class="fw-semibold mb-1"><span class="m-1"><i
                                                                class="fas fa-calendar-alt"></i></span>{{ \Carbon\Carbon::parse($orden->fecha_ingreso)->format('d-m-Y') }}
                                                    </p>
                                                    <p class="fw-semibold mb-0"><span class="m-1"><i
                                                                class="far fa-clock"></i></span>{{ \Carbon\Carbon::parse($orden->fecha_ingreso)->format('H:i') }}
                                                    </p>
                                                </td>
                                              
                                                <td class="text-center">
                                                    Placa: {{ $orden->placa }} <br>
                                                    Marca: {{ $orden->marca }} <br>
                                                    Modelo: {{ $orden->modelo }}

                                                </td>
                                                <td class="text-center">{{ $orden->tipo_vehiculo }}</td>
                                                <td class="text-center">{{ $orden->tipo_mantenimiento }}</td>
                                                <td class="text-right">${{ $orden->subtotal }}</td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="clearfix">
                                <table class="table invoice-total">
                                    <tbody>
                                        <tr>
                                            <td><strong>Sub Total :</strong></td>
                                            <td>${{ $orden->subtotal }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>IVA :</strong></td>
                                            <td>${{ $orden->iva }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>TOTAL:</strong></td>
                                            <td class="text-bold h4">${{ $orden->total }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="text-right no-print m-4">
                                <a href="javascript:window.print()" class="btn btn-primary"><i
                                        class="demo-pli-printer icon-lg "></i>Imprimir Orden</a>
                                <!--<a href="#" class="btn btn-primary">Confirm Payment</a>-->
                            </div>

                            <hr class="new-section-sm bord-no">

                            <div class="well well-sm">
                                <p class="text-bold text-main text-uppercase">Gracias por Generar la Orden de Trabajo</p>
                                <p>Nos vemos Pronto. <strong
                                        class="text-main"></strong></p>
                            </div>
                        </div>
                    </div>




                </div>


            </div>

        </div>

        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>

    </div>


    <!--JAVASCRIPT-->

    <!--jQuery [ REQUIRED ]-->
    <script src="{{ asset('final\js\jquery.min.js') }}"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="{{ asset('final\js\bootstrap.min.js') }}"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="{{ asset('js\nifty.min.js') }}"></script>

    <!--=================================================-->

    <!--Demo script [ DEMONSTRATION ]-->
    <script src="{{ asset('final\js\demo\nifty-demo.min.js') }}"></script>

</body>

</html>
