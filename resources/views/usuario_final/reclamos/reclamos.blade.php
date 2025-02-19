@extends('usuario_final.reclamos.base')

@push('js')
<script src="{{ asset('assets/js/reclamos.js') }}?v={{ time() }}"></script>
@endpush

@section('usuario_final')

<section class="section">

    <div class="container mt-5">

        <!---->
        <div class="row mt-5">
            <div class="col-12">

                <div class="card" id="sample-login">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <!---INCIIO DEL FORMULARIO DE RECLAMOS---->
                    <form method="post" action="{{ route('reclamos-sugerencias.store') }}">
                        @csrf

                        <div class="card-header">
                            <h4>Registro de Reclamos o Sugerencias</h4>
                        </div>

                        <div class="card-body pb-0">

                            <div class="row">

                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label for="defaultSelect">{{ __('Dependencia') }}</label>

                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-user-cog"></i></span>

                                            <select class="form-control" id="dependencia_id" name="dependencia_id">
                                                <option value="">Seleccione una dependencia</option>
                                                @foreach ($dependencias as $dependencia)
                                                    <option value="{{ $dependencia->id }}"
                                                        data-circuito="{{ $dependencia->nombre_circuito }}"
                                                        data-subcircuito="{{ $dependencia->nombre_sub_circuito }}">
                                                        {{ $dependencia->parroquia }} 
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="defaultSelect">{{ __('Tipo') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-user-cog"></i></span>
                                            <select class="form-select form-control" name="tipo" id="tipo">

                                                <option value="" selected disabled>Selecciona:</option>

                                                <option value="reclamo">Reclamo</option>
                                                <option value="sugerencia">Sugerencia</option>

                                            </select>


                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label>{{ __('Circuito') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                        class="fas fa-user-cog"></i></span>
                                            </div>
                                            <input type="text" id="nombre_circuito" name="nombre_circuito"
                                                class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="detalle" class="form-label">{{ __('Detalle') }}</label>
                                        <textarea rows="3" oninput="this.value = this.value.toUpperCase();" id="detalle" class="form-control"
                                            name="detalle" required></textarea>
                                    </div>

                                </div>

                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label>{{ __('Sub Circuito') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                        class="fas fa-user-cog"></i></span>
                                            </div>
                                            <input type="text" id="nombre_sub_circuito" name="nombre_sub_circuito"
                                                class="form-control" readonly>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-header">
                                    <h4>Datos del Reclamante</h4>
                                </div>

                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>{{ __('Nombres') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>
                                            <input type="text" oninput="this.value = this.value.toUpperCase();"
                                                class="form-control" id="nombres" name="nombres"
                                                placeholder="Digita tus nombres" required>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>{{ __('Apellidos') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="apellidos" name="apellidos"
                                                oninput="this.value = this.value.toUpperCase();" class="form-control"
                                                placeholder="Digita tus apellidos" required>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>{{ __('Contacto') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" id="contacto"
                                                name="contacto" maxlength="10"
                                                onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                                                placeholder="Digita un contacto" required>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>


                        <div class="card-footer pt-">

                            <button type="submit" class="btn btn-primary">Enviar Reclamo</button>

                        </div>
                    </form>


                </div>

            </div>
        </div>


        @include('components.footer.footer')
    </div>

</section>


@endsection