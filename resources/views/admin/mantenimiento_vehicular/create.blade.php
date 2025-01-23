@extends('admin.sistema')

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@endpush
@section('admin')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Vista Create</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Forms</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Basic Form</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Añadir Solicitud de Mantenimiento Preventivo</div>
                    </div>

                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!---INICIO DEL FORMULARIO--->
                        <form method="post" action="{{ route('solicitud-mantenimiento.store')}}">
                            @csrf

                            <div class="row">

                                <div class="col-md-6 col-lg-4">

                                    <!--<div class="form-group">
                                        <label for="email2">{{ __('Identificación del Vehículo') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="tipo_vehiculo"
                                                id="tipo_vehiculo" placeholder="Digita tus nombres"
                                                aria-label="Username" aria-describedby="basic-addon1" required />
                                        </div>
                                    </div>-->

                                    <div class="form-group">
                                        <label for="defaultSelect">{{ __('Identificación del Vehículo') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-user-cog"></i></span>
                                            <select class="form-select form-control" name="flotavehicular_id" id="flotavehicular_id">

                                                <option value="" selected disabled>Seleccionar placa:</option>
                                                @foreach ($solicitud as $item)
                                                    <option value="{{$item->id}}">{{$item->placa}} </option>
                                                @endforeach

                                            </select>

                                           
                                        </div>
                                    </div>

                                

                                    <div class="form-group">
                                        <label for="email2">{{ __('Solicitante') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" oninput="this.value = this.value.toUpperCase();" name="solicitante" id="solicitante"
                                                placeholder="Digita el nombre del solicitante" aria-label="Username"
                                                aria-describedby="basic-addon1" required />
                                        </div>
                                    </div>

                                
                                    <div class="input-group">
                                        <label>{{ __('Observaciones') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>
                                            <textarea oninput="this.value = this.value.toUpperCase();" class="form-control" id="observacion" name="observacion" required></textarea>

                                        </div>
                                    </div>
                               

                                </div>

                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label for="defaultSelect">{{ __('Tipo de Mantenimiento') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-user-cog"></i></span>
                                            <select class="form-select form-control" name="tipo_mantenimiento"
                                                id="tipo_mantenimiento">

                                                <option value="" selected disabled>Selecciona:</option>
                                              
                                                    <option value="Preventivo">Preventivo</option>
                                                    <option value="Correctivo">Correctivo</option>
                                                   
                                            </select>


                                            
                                        </div>
                                    </div>

                                

                                    <div class="form-group">
                                        <label for="email2">{{ __('Fecha de Solicitud') }}</label>

                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                class="fa fa-user"></i></span>
                                            <input readonly type="date" name="fecha_hora" id="fecha_hora" class="form-control" value="<?php echo date("Y-m-d") ?>">
                                            <?php

                                            use Carbon\Carbon;
    
                                            $fecha_hora = Carbon::now()->toDateTimeString();
                                            ?>
                                               <input type="hidden" name="fecha_hora" value="{{$fecha_hora}}">

                                        </div>
                                      
                                    </div>

                                </div>

                                <div class="col-md-6 col-lg-4">

                                    
                                    <div class="input-group">
                                        <label>{{ __('Descripción del Problema') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>
                                            <textarea oninput="this.value = this.value.toUpperCase();" class="form-control" id="descripcion" name="descripcion" required></textarea>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Kilometraje Actual') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="kilometraje" id="kilometraje"
                                                placeholder="Digita el kilometraje actual" aria-label="Username"
                                                aria-describedby="basic-addon1" required />
                                        </div>
                                    </div>



                                </div>

                                <div class="card-action">
                                    <button type="submit" class="btn btn-secondary">Guardar</button>
                                </div>

                            </div>
                        </form>

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

@endsection