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
                        <div class="card-title">Añadir Personal</div>
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
                        <form method="post" action="{{ route('personal_policial.store') }}">
                            @csrf

                            <div class="row">

                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label for="email2">Cédula</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="cedula" id="cedula"
                                                maxlength="10" placeholder="Digita tu cédula" aria-label="Username"
                                                aria-describedby="basic-addon1"
                                                onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                                                required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">Fecha de Nacimiento</label>

                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                class="fa fa-user"></i></span>
                                            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control">
                                        </div>
                                      
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">Celular</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="celular" id="celular"
                                                placeholder="Digita tu celular" maxlength="10" aria-label="Username"
                                                aria-describedby="basic-addon1" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required />
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6 col-lg-4">


                                    <div class="form-group">
                                        <label for="email2">Nombres</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="nombres" id="nombres"
                                                placeholder="Digita tu nombre" aria-label="Username"
                                                aria-describedby="basic-addon1" oninput="this.value = this.value.toUpperCase();" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">Tipo de Sangre</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-envelope"></i></span>
                                            <input type="text" class="form-control" oninput="this.value = this.value.toUpperCase();" name="tipo_sangre" id="tipo_sangre"
                                                placeholder="Digita tu Tipo de Sangre" aria-label="Email" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">Rango</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" oninput="this.value = this.value.toUpperCase();" name="rango" id="rango"
                                                placeholder="Digita tu Rango o Grado" aria-label="Username"
                                                aria-describedby="basic-addon1" required />
                                        </div>
                                    </div>


                                </div>

                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label for="email2">Apellidos</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" oninput="this.value = this.value.toUpperCase();" name="apellidos" id="apellidos"
                                                placeholder="Digita tus Apellidos" aria-label="Username"
                                                aria-describedby="basic-addon1" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Ciudad de Nacimiento</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-unlock"></i></span>
                                            <input type="text" oninput="this.value = this.value.toUpperCase();" class="form-control" name="ciudad_nacimiento" id="ciudad_nacimiento"
                                                placeholder="Digita tu Ciudad de Nacimiento" required />
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="defaultSelect">{{ __('Dependencia') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-user-cog"></i></span>
                                            <select class="form-select form-control" name="dependencia_id"
                                                id="dependencias">

                                                <option value="" selected disabled>Selecciona:</option>

                                                @foreach ($dependencias as $id => $item)
                                                    <option value="{{ $id }}">{{ $item }}</option>
                                                @endforeach

                                            </select>
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