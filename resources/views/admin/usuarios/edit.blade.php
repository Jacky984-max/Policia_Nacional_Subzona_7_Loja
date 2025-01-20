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
                        <div class="card-title">Editar Usuarios</div>
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
                        <form method="post" action="{{ route('usuarios.update', ['usuario' => $usuario->id]) }}">
                            @csrf

                            <div class="row">

                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label for="email2">Nombre</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Digita tu nombre" aria-label="Username"
                                                aria-describedby="basic-addon1"
                                                value="{{ old('name', $usuario->name) }}" />
                                        </div>
                                    </div>

                                
                                </div>

                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label for="email2">Correo</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-envelope"></i></span>
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Digita tu correo" aria-label="Email"
                                                value="{{ old('email', $usuario->email) }}" />
                                        </div>
                                    </div>

                                    <!--<div class="form-group">
                                                                    <label for="email2">Apellido</label>
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text" id="basic-addon1"><i
                                                                                class="fa fa-user"></i></span>
                                                                        <input type="text" class="form-control" placeholder="Digita tu apellido" />
                                                                    </div>
                                                                </div>-->

                                </div>

                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-unlock"></i></span>
                                            <input type="password" class="form-control" name="password" id="password"
                                                placeholder="Digita tu Contraseña"
                                                {{ old('password', $usuario->password) }} />
                                        </div>
                                    </div>

                                </div>


                                <div class="card-action">
                                    <input type="hidden" name="hidden_id" value="{{ $usuario->id }}">
                                    <button type="submit" class="btn btn-secondary">Actualizar</button>
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