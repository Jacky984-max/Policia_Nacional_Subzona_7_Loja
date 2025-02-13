@extends('admin.sistema')

@push('css')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
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
                        <div class="card-title">Añadir Solicitud de Mantenimiento </div>
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
                        <form method="post" action="{{ route('solicitud.store') }}">
                            @csrf

                            <div class="row">

                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label for="defaultSelect">{{ __('Identificación del Vehículo') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-user-cog"></i></span>
                                            <select class="form-select form-control" name="flotavehicular_id"
                                                id="flotavehicular_id">

                                                <option value="" selected disabled>Seleccionar placa:</option>
                                                @foreach ($solicitud as $item)
                                                    <option value="{{ $item->id }}">{{ $item->placa }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!--<div class="form-group">
                                        <label for="defaultSelect">{{ __('Solicitante') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-user-cog"></i></span>
                                            <select class="form-select form-control" name="solicitante"
                                                id="solicitante">

                                                <option value="" selected disabled>Seleccionar:</option>
                                                <option value="{{ Auth::user()->id }}">
                                                    {{ Auth::user()->name }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>-->

                                    <div class="mb-3">
                                        <label class="form-label">Policia:</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->personalPolicial->nombre }}" disabled>
                                    </div>

                                </div>

                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label for="fecha_ingreso" class="form-label">{{ __('Fecha y Hora') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-user-cog"></i></span>
                                            <input type="datetime-local" class="form-control" id="fecha_hora"
                                                name="fecha_hora" value="<?php echo date('Y-m-d'); ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>{{ __('Observaciones Adicionales') }}</label>
                                        <div class="input-group mb-3">
                                            <textarea oninput="this.value = this.value.toUpperCase();" class="form-control" id="observacion" name="observacion"
                                                rows="3" required></textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label for="email2">{{ __('Kilometraje Actual') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="kilometraje"
                                                id="kilometraje" placeholder="Digita el kilometraje actual"
                                                aria-label="Username" aria-describedby="basic-addon1" required />
                                        </div>
                                    </div>

                                </div>

                                <div class="card-action">
                                    <button type="submit" class="btn btn-secondary">Enviar Solicitud</button>
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