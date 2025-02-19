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
                        <div class="card-title">Entregar Vehiculo</div>
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
                        <form method="post" action="{{ route('entregas.store', $orden->id) }}">
                            @csrf

                            <div class="row">

                                <div class="col-md-6 col-lg-4">

                              
                                    <div class="form-group">
                                        <label for="fecha_ingreso" class="form-label">Fecha de Entrega</label>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><i
                                            class="fa fa-user"></i></span>
                                            <input type="date" class="form-control" name="fecha_entrega" value="{{ now()->toDateString() }}" required>
                                        </div>
                                       
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">{{ __('Observaciones') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                                    <textarea rows="3" oninput="this.value = this.value.toUpperCase();" id="observaciones" class="form-control"
                                                    name="observaciones" required></textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label class="form-label">Policía que Recibe</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                class="fa fa-user"></i></span>
                                            <select name="personal_recibio_id" class="form-control" required>
                                            @foreach($policiales as $p)
                                                <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                        
                                    </div>

                                </div>

                                <div class="col-md-6 col-lg-4">

                                    <div class="form-group">
                                        <label for="email2">{{ __('Kilometraje Actual') }}</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                            <input type="number" class="form-control" name="kilometraje_actual" required>
                                           
                                        </div>
                                    </div>

                                </div>

                                <div class="card-action">
                                    <button type="submit" class="btn btn-secondary">Registrar Entrega</button>
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
