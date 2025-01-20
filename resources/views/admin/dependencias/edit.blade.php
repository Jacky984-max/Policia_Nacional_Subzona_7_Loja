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
                        <div class="card-title">Editar Dependencias</div>
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
                        <form method="post" action="{{ route('dependencia.update', ['dependencia' => $depe_po->id]) }}">
                            @csrf

                            <div class="row">

                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label for="email2">{{ __('Provincia') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="provincia" id="provincia"
                                                 aria-label="Username"
                                                aria-describedby="basic-addon1" value="{{ old('provincia', $depe_po->provincia) }}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Código de Distrito') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-envelope"></i></span>
                                            <input type="text" class="form-control" name="cod_distrito"
                                                id="cod_distrito"
                                                aria-label="Email" value="{{ old('cod_distrito', $depe_po->cod_distrito) }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email2">{{ __('Código de Circuito') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="cod_circuito"
                                                id="cod_circuito"
                                                aria-label="Username" aria-describedby="basic-addon1" value="{{ old('cod_circuito', $depe_po->cod_circuito) }}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Código de Subcircuito') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="cod_sub_circuito"
                                                id="cod_sub_circuito"
                                                aria-label="Username" aria-describedby="basic-addon1" value="{{ old('cod_sub_circuito', $depe_po->cod_sub_circuito) }}" />
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6 col-lg-4">


                                    <div class="form-group">
                                        <label for="email2">{{ __('Número de Distritos') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="numero_distrito"
                                                id="numero_distrito" 
                                                aria-label="Username" aria-describedby="basic-addon1" value="{{ old('numero_distrito', $depe_po->numero_distrito) }}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">{{ __('Nombre del Distrito') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-unlock"></i></span>
                                            <input type="text" class="form-control" name="nombre_distrito"
                                                id="nombre_distrito"  value="{{ old('nombre_distrito', $depe_po->nombre_distrito) }}" />
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Nombre del Circuito') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="nombre_circuito"
                                                id="nombre_circuito" 
                                                aria-label="Username" aria-describedby="basic-addon1" value="{{ old('nombre_circuito', $depe_po->nombre_circuito) }}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Nombre de Subcircuito') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="nombre_sub_circuito"
                                                id="nombre_sub_circuito" 
                                                aria-label="Username" aria-describedby="basic-addon1" value="{{ old('nombre_sub_circuito', $depe_po->nombre_sub_circuito) }}" />
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
                                                id="parroquia" 
                                                aria-label="Username" aria-describedby="basic-addon1" value="{{ old('parroquia', $depe_po->parroquia) }}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Número de Circuitos') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="numero_circuito"
                                                id="numero_circuito" 
                                                aria-label="Username" aria-describedby="basic-addon1" value="{{ old('numero_circuito', $depe_po->numero_circuito) }}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Número de Subcircuitos') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="numero_sub_circuito"
                                                id="numero_sub_circuito"
                                                aria-label="Username"
                                                aria-describedby="basic-addon1" value="{{ old('numero_sub_circuito', $depe_po->numero_sub_circuito) }}" />
                                        </div>
                                    </div>





                                </div>

                                <div class="card-action">
                                    <input type="hidden" name="hidden_id" value="{{ $depe_po->id }}">
                                    <button type="submit" class="btn btn-secondary">Actualizar Dependencia</button>
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