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
                        <div class="card-title">Añadir Vehículos</div>
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
                        <form method="post" action="{{ route('flota_vehicular.store') }}">
                            @csrf

                            <div class="row">

                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label for="email2">{{ __('Placa') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input oninput="this.value = this.value.toUpperCase();" type="text" class="form-control" name="placa" id="placa"
                                                placeholder="Digita la placa" aria-label="Username"
                                                aria-describedby="basic-addon1" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">{{ __('Modelo') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-unlock"></i></span>
                                            <input oninput="this.value = this.value.toUpperCase();" type="text" class="form-control" name="modelo" id="modelo"
                                                placeholder="Digita el modelo del vehículo" required />
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Kilometraje') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="kilometraje"
                                                id="kilometraje" placeholder="Digita el kilometraje"
                                                aria-label="Username" aria-describedby="basic-addon1" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Capacidad de Pasajeros') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="capacidad_pasajeros"
                                                id="capacidad_pasajeros" placeholder="Digita la capacidad de pasajeros"
                                                aria-label="Username" aria-describedby="basic-addon1" required />
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label for="email2">{{ __('Tipo de Vehículo') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input oninput="this.value = this.value.toUpperCase();" type="text" class="form-control" name="tipo_vehiculo"
                                                id="tipo_vehiculo" placeholder="Digita el tipo de vehículo"
                                                aria-label="Username" aria-describedby="basic-addon1" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Chasis') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input oninput="this.value = this.value.toUpperCase();" type="text" class="form-control" name="chasis" id="chasis"
                                                placeholder="Digita el Chasis" aria-label="Username"
                                                aria-describedby="basic-addon1" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Cilindraje') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="cilindraje"
                                                id="cilindraje" placeholder="Digita el cilindraje"
                                                aria-label="Username" aria-describedby="basic-addon1" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="defaultSelect">{{ __('Responsable del Vehículo') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-user-cog"></i></span>
                                            <select class="form-select form-control" name="personal_id" id="personal_id">

                                                <option value="" selected disabled>Selecciona:</option>

                                                @foreach ($personal as $item)
                                            
                                                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                                                @endforeach

                                            </select>

                                            @error('personal_id')
                                                <small class="text-danger">{{ '*' . $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                </div>

                                <div class="col-md-6 col-lg-4">


                                    <div class="form-group">
                                        <label for="email2">{{ __('Marca') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-envelope"></i></span>
                                            <input oninput="this.value = this.value.toUpperCase();" type="text" class="form-control" name="marca" id="marca"
                                                placeholder="Digita la marca del vehículo" aria-label="Email"
                                                required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Motor') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input oninput="this.value = this.value.toUpperCase();" type="text" class="form-control" name="motor" id="motor"
                                                placeholder="Digita el motor del vehículo" aria-label="Username"
                                                aria-describedby="basic-addon1" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Capacidad de Carga') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="capacidad_carga"
                                                id="capacidad_carga" placeholder="Digita la capacidad de carga"
                                                aria-label="Username" aria-describedby="basic-addon1" required />
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