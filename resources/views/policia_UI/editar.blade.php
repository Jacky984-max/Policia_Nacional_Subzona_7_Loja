@extends('admin.sistema')

@section('admin')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Vista Edit</h3>
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
                        <div class="card-title">Editar Solicitud de Mantenimiento </div>
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
                        <form method="post" action="{{ route('solicitud.update', ['soli_edit' => $soli_edit->id])}}">
                            @csrf

                            <div class="row">

                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label for="email2">{{ __('Kilometraje Actual') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="kilometraje"
                                                id="kilometraje"
                                                aria-label="Username" aria-describedby="basic-addon1" value="{{ old('kilometraje', $soli_edit->kilometraje) }}" />
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
                                            <textarea oninput="this.value = this.value.toUpperCase();" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion', $soli_edit->descripcion) }}"
                                                required>
                                            </textarea>
                                        </div>
                                    </div>
                                  
                                   
                                </div>

                                <div class="col-md-6 col-lg-4">
                                    <div class="input-group">
                                        <label>{{ __('Observaciones') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>
                                            <textarea oninput="this.value = this.value.toUpperCase();" class="form-control" id="observacion" name="observacion" value="{{ old('observacion', $soli_edit->observacion) }}">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                        

                                

                                <div class="card-action">
                                    <input type="hidden" name="hidden_id" value="{{ $soli_edit->id }}">
                                    <button type="submit" class="btn btn-secondary">Actualizar Solicitud</button>
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