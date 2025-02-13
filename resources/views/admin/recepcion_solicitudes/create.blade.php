@extends('admin.sistema')


@section('admin')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Registrar Mantenimiento</h3>
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
                        <div class="card-title">Datos del Vehículo</div>
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
                        <form method="post" action="{{ route('mantenimientos.guardar', $recepcion->id) }}">
                            @csrf

                            <div class="row">

                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label for="fecha_ingreso" class="form-label">Fecha y Hora de Ingreso</label>
                                        <input type="datetime-local" class="form-control" id="fecha_ingreso"
                                            name="fecha_ingreso" required>
                                    </div>

                                    <!--<div class="form-group">
                                        <label for="email2">{{ __('Placa') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input oninput="this.value = this.value.toUpperCase();" type="text"
                                                class="form-control" name="placa" id="placa"
                                                placeholder="Digita la placa" aria-label="Username"
                                                aria-describedby="basic-addon1" required />
                                        </div>
                                    </div>-->

                                    <div class="form-group">
                                        <label for="email2">{{ __('Placa') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="placa" value="{{ $vehiculo->placa }}" readonly />
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="asunto" class="form-label">Asunto</label>
                                        <input type="text" oninput="this.value = this.value.toUpperCase();" class="form-control" id="asunto" name="asunto"
                                            required>
                                    </div>


                                </div>


                                <div class="col-md-6 col-lg-4">


                                    <div class="form-group">
                                        <label for="email2">{{ __('Kilometraje Actual') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="kilometraje"
                                                aria-label="Username" aria-describedby="basic-addon1" value="{{ $kilometraje }}" required />
                                        </div>
                                    </div>

                                   

                                    <div class="form-group">
                                        <label for="email2">{{ __('Marca') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-envelope"></i></span>
                                            <input type="text"
                                                class="form-control"
                                                aria-label="Email" name="marca" value="{{ $vehiculo->marca }}"
                                                readonly />
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="estado" class="form-label">Estado del Mantenimiento</label>
                                        <select class="form-control" name="estado">
                                            <option value="" selected disabled>Selecciona:</option>
                                            <option value="COMPLETADO">COMPLETADO</option>
                                            <!--<option value="CANCELADO">CANCELADO</option>-->
                                        </select>
                                    </div>


                                </div>



                                <div class="col-md-6 col-lg-4">


                                    <div class="form-group">
                                        <label for="email2">{{ __('Tipo de Vehículo') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text"
                                                class="form-control"
                                                 aria-label="Username"
                                                aria-describedby="basic-addon1" name="tipo_vehiculo" value="{{ $vehiculo->tipo_vehiculo }}" readonly />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">{{ __('Modelo') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-unlock"></i></span>
                                            <input type="text"
                                                class="form-control" name="modelo" value="{{ $vehiculo->modelo }}" readonly />
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="detalle" class="form-label">Detalle</label>
                                        <textarea rows="3" oninput="this.value = this.value.toUpperCase();" class="form-control" name="detalle" required></textarea>
                                    </div>


                                </div>

                                

                             

                                <div class="card-action">

                                    <h1 class="card-title">Tipos de Mantenimiento</h1>
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


                                                <option value="Mantenimiento 1">Mantenimiento 1</option>
                                                <option value="Mantenimiento 2">Mantenimiento 2</option>
                                                <option value="Mantenimiento 3">Mantenimiento 3</option>


                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-4">

                                    <div class="mb-3">
                                        <label for="subtotal" class="form-label">Subtotal</label>
                                        <input type="text" class="form-control" name="subtotal" id="subtotal"
                                            readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="iva" class="form-label">IVA (12%)</label>
                                        <input type="text" class="form-control" name="iva" id="iva"
                                            readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="total" class="form-label">Total</label>
                                        <input type="text" class="form-control" name="total" id="total"
                                            readonly>
                                    </div>

                                </div>

                             


                                <div class="card-action">
                                    <button type="submit" class="btn btn-secondary">Guardar</button>

                                    <!--<a href=""
                                        class="btn btn-secondary">Generar Orden de Trabajo</a>-->
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

<script>
    document.querySelector('select[name="tipo_mantenimiento"]').addEventListener('change', function() {
        let tipo = this.value;
        let subtotal = 0;

        if (tipo === "Mantenimiento 1") subtotal = 43.59;
        if (tipo === "Mantenimiento 2") subtotal = 60.00;
        if (tipo === "Mantenimiento 3") subtotal = 180.00;

        let iva = subtotal * 0.12;
        let total = subtotal + iva;

        document.getElementById("subtotal").value = subtotal.toFixed(2);
        document.getElementById("iva").value = iva.toFixed(2);
        document.getElementById("total").value = total.toFixed(2);
    });
</script>

@endsection