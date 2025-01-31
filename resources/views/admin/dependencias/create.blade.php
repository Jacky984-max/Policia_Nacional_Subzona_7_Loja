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
                        <div class="card-title">Añadir Dependencias</div>
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
                        <form method="post" action="{{ route('dependencia.store') }}">
                            @csrf

                            <div class="row">

                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label for="email2">{{ __('Provincia') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="provincia" id="provincia"
                                                placeholder="Digita la provincia" aria-label="Username"
                                                aria-describedby="basic-addon1" oninput="this.value = this.value.toUpperCase();" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Código de Distrito') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-envelope"></i></span>
                                            <input type="text" class="form-control" name="cod_distrito"
                                                id="cod_distrito" placeholder="Digita el código de distrito"
                                                aria-label="Email" oninput="this.value = this.value.toUpperCase();" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email2">{{ __('Código de Circuito') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="cod_circuito" id="cod_circuito"
                                                placeholder="Digita el código de circuito" aria-label="Username"
                                                aria-describedby="basic-addon1" oninput="this.value = this.value.toUpperCase();" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Código de Subcircuito') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="cod_sub_circuito"
                                                id="cod_sub_circuito" placeholder="Digita el código de subcircuito"
                                                aria-label="Username" aria-describedby="basic-addon1" oninput="this.value = this.value.toUpperCase();" required />
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6 col-lg-4">


                                    <div class="form-group">
                                        <label for="email2">{{ __('Número de Distritos') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="numero_distrito" id="numero_distrito"
                                                placeholder="Digita el número de distritos" aria-label="Username"
                                                aria-describedby="basic-addon1" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">{{ __('Nombre del Distrito') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-unlock"></i></span>
                                            <input type="text" class="form-control" name="nombre_distrito"
                                                id="nombre_distrito" placeholder="Nombre del distrito" oninput="this.value = this.value.toUpperCase();"
                                                required />
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Nombre del Circuito') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="nombre_circuito" id="nombre_circuito"
                                                placeholder="Digita el nombre del circuito" aria-label="Username" oninput="this.value = this.value.toUpperCase();"
                                                aria-describedby="basic-addon1" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Nombre de Subcircuito') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="nombre_sub_circuito"
                                                id="nombre_sub_circuito" placeholder="Digita el nombre de subcircuito"
                                                aria-label="Username" aria-describedby="basic-addon1" oninput="this.value = this.value.toUpperCase();" required />
                                        </div>
                                    </div>


                                </div>

                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label for="email2">{{ __('Parroquia') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="parroquia"
                                                id="parroquia" placeholder="Digita la parroquia"
                                                aria-label="Username" aria-describedby="basic-addon1" oninput="this.value = this.value.toUpperCase();" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Número de Circuitos') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="numero_circuito"
                                                id="numero_circuito" placeholder="Digita el número de circuitos"
                                                aria-label="Username" aria-describedby="basic-addon1" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Número de Subcircuitos') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="numero_sub_circuito"
                                                id="numero_sub_circuito" placeholder="Digita el número de subcircuitos"
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