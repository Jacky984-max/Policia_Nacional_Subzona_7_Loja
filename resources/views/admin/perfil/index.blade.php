@extends('admin.sistema')

@section('admin')
    <div class="container">
        <div class="page-inner">
            <div class="row">

                <!----->

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detalles de mi Perfil</h4>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <ul class="list-unstyled list-py-2 text-dark mb-0">

                                    <li class="pt-4 pb-2"> <strong>DATOS PERSONALES:</strong></li>
                                    <li><i class="fas fa-check-square text-success"></i> {{ Auth::user()->name }}
                                        {{ Auth::user()->last_name }}</li>

                                   
                                    <li class="pt-4 pb-2"> <strong>CONTACTO:</strong></li>
                                    <li><i class="fas fa-check-square text-success"></i> {{ old('email', $user->email) }}
                                    </li>

                                    @if (Auth::user()->hasRole('policia') && Auth::user()->personalPolicial)
                                        <!--<li class="pt-4 pb-2"><span class="card-subtitle">Código Personal</span></li>-->
                                       
                                        <li class="pt-4 pb-2"> <strong>CÓDIGO PERSONAL:</strong></li>
                                        <li><i class="fas fa-check-square text-success"></i>
                                            {{ Auth::user()->personalPolicial->codigo_personal }}</p>
                                        </li>
                                    @endif







                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
