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
                        <div class="card-title">Editar Flota Vehicular</div>
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
                        <form method="post" action="{{ route('flota_vehicular.update', ['flota_vehicular' => $flove->id]) }}">
                            @csrf

                            <div class="row">

                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label for="email2">{{ __('Tipo de Vehículo') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="tipo_vehiculo"
                                                id="tipo_vehiculo" 
                                                aria-label="Username" aria-describedby="basic-addon1" value="{{ old('tipo_vehiculo', $flove->tipo_vehiculo) }}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Marca') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-envelope"></i></span>
                                            <input type="text" class="form-control" name="marca" id="marca"
                                                 aria-label="Email" value="{{ old('marca', $flove->marca) }}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Kilometraje') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="kilometraje"
                                                id="kilometraje" 
                                                aria-label="Username" aria-describedby="basic-addon1" value="{{ old('kilometraje', $flove->kilometraje) }}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Capacidad de Pasajeros') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="capacidad_pasajeros"
                                                id="capacidad_pasajeros" 
                                                aria-label="Username" aria-describedby="basic-addon1" value="{{ old('capacidad_pasajeros', $flove->capacidad_pasajeros) }}" />
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6 col-lg-4">


                                    <div class="form-group">
                                        <label for="email2">{{ __('Placa') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="placa" id="placa"
                                                 aria-label="Username"
                                                aria-describedby="basic-addon1" value="{{ old('placa', $flove->placa) }}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">{{ __('Modelo') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-unlock"></i></span>
                                            <input type="text" class="form-control" name="modelo" id="modelo"
                                            value="{{ old('modelo', $flove->modelo) }}" />
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Cilindraje') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="cilindraje"
                                                id="cilindraje" 
                                                aria-label="Username" aria-describedby="basic-addon1" value="{{ old('cilindraje', $flove->cilindraje) }}"  />
                                        </div>
                                    </div>

                                   


                                </div>

                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label for="email2">{{ __('Chasis') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="chasis" id="chasis"
                                                 aria-label="Username"
                                                aria-describedby="basic-addon1" value="{{ old('chasis', $flove->chasis) }}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Motor') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="motor" id="motor"
                                                 aria-label="Username"
                                                aria-describedby="basic-addon1" value="{{ old('motor', $flove->motor) }}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Capacidad de Carga') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="capacidad_carga"
                                                id="capacidad_carga" 
                                                aria-label="Username" aria-describedby="basic-addon1" value="{{ old('capacidad_carga', $flove->capacidad_carga) }}"  />
                                        </div>
                                    </div>


                                </div>

                                <div class="card-action">
                                    <input type="hidden" name="hidden_id" value="{{ $flove->id }}">
                                    <button type="submit" class="btn btn-secondary">Actualizar Flota Vehicular</button>
                                </div>

                            </div>

                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection