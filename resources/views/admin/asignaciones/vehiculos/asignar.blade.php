@extends('admin.sistema')


@section('admin')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Forms</h3>
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
                        <div class="card-title">Asignación de Vehículos a Subcircuitos</div>
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
                        <form method="post" action="{{ route('asignar-vehiculo.store') }}">
                            @csrf

                            <div class="row">

                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label for="defaultSelect">{{ __('Vehículos') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-user-cog"></i></span>
                                            <select class="form-select form-control" name="vehiculo_id"
                                                id="vehiculo_id">
                                                <option value="" selected disabled>Selecciona:</option>

                                                @foreach ($flota_vehi as $vehiculo)
                                                    <option value="{{ $vehiculo->id }}">
                                                        {{ $vehiculo->placa }} - {{ $vehiculo->marca }}
                                                        {{ $vehiculo->modelo }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('vehiculo_id')
                                                <small class="text-danger">{{ '*' . $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                </div>

                                <div class="col-md-6 col-lg-4">


                                    <div class="form-group">
                                        <label for="defaultSelect">{{ __('Dependencia') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-user-cog"></i></span>
                                            <select class="form-select form-control" name="dependencia_id"
                                                id="dependencia_id">

                                                <option value="" selected disabled>Selecciona:</option>
                                                @foreach ($dependencias as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nombre_sub_circuito }} -
                                                        {{ $item->provincia }}
                                                    </option>
                                                @endforeach


                                            </select>

                                            @error('dependencias_id')
                                                <small class="text-danger">{{ '*' . $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                </div>

                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label for="email2">{{ __('Fecha de Asignación') }}</label>

                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input readonly type="date" name="fecha_asignacion" id="fecha_asignacion"
                                                class="form-control" value="<?php echo date('Y-m-d'); ?>">

                                                <?php

                                                use Carbon\Carbon;
        
                                                $fecha_asignacion = Carbon::now()->toDateTimeString();
                                                ?>

                                            <input type="hidden" name="fecha_asignacion" value="{{$fecha_asignacion}}">

                                        </div>

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
                                        <textarea oninput="this.value = this.value.toUpperCase();" class="form-control" id="observacion" name="observacion"
                                            rows="3" required></textarea>

                                    </div>
                                </div>

                                <div class="card-action">
                                    <button type="submit" class="btn btn-secondary">Confimar Asignación</button>
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