@extends('admin.sistema')


@section('admin')
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-round">
                        <div class="card-header">
                            <div class="card-head-row card-tools-still-right">
                                <div class="card-title">Detalles de Ordenes de Trabajo</div>
                                <div class="card-tools">
                                    <div class="dropdown">
                                        <button class="btn btn-icon btn-clean me-0" type="button" id="dropdownMenuButton"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                            <a class="dropdown-item" href="{{ route('ordenes.pdf', $ver->id) }}">Descargar
                                                PDF</a>
                                            <a class="dropdown-item" href="{{ route('ordenes.imprimir', $ver->id) }}"
                                                target="_blank" id="print-invoice-button">
                                                Imprimir</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-4">

                            <div class="row align-items-md-center gx-md-5">

                                <!-- End Col -->
                                <div class="row mb-4">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                          
                                            <div class="selectgroup w-100">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="value" value="50"
                                                        class="selectgroup-input" checked="" />
                                                    <span
                                                        class="selectgroup-button fw-semibold text-white bg-secondary">Fecha
                                                        de Registro:</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="value" value="100"
                                                        class="selectgroup-input" />
                                                    <span
                                                        class="selectgroup-button fw-semibold">{{ $ver->fecha_generacion }}</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                          
                                            <div class="selectgroup w-100">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="value" value="150"
                                                        class="selectgroup-input" />
                                                    <span
                                                        class="selectgroup-button fw-semibold text-white bg-secondary">Detalle:</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="value" value="200"
                                                        class="selectgroup-input" />
                                                    <span
                                                        class="selectgroup-button fw-semibold">{{ $ver->detalle_mantenimiento }}</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <!--TABLA RESPONSIVE-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
