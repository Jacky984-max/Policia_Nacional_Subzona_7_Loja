@extends('admin.sistema')

@section('admin')

        
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Bienvenidos al Sistema Gestión Flota Policial</h3>
                <h6 class="op-7 mb-2">Sub-Zona 7 Loja</h6>
            </div>
            <!--<div class="ms-md-auto py-2 py-md-0">
                
            </div>-->
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <h4 class="card-title">INICIO</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('assets/img/policia-ec.jpg') }}" alt="navbar brand"
                                    class="navbar-brand text-center m-2" height="300vh" width="1100" />

                            </div>
                            <div class="col-md-6">
                                <div class="mapcontainer">
                                    <div id="world-map" class="w-100" style="height: 300px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection
