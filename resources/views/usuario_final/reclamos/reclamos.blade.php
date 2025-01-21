<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Reclamos / Sugerencias</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('new/assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('new/assets/bundles/bootstrap-social/bootstrap-social.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('new/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('new/assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('new/assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
    
    <div class="loader"></div>
  
    <div id="app">

        <section class="section">

            <div class="container mt-5">

                <!---->
                <div class="row mt-5">
                    <div class="col-12">
                        <!--<div class="card">
                          <div class="card-header">
                                <h4>All Posts</h4>
                            </div>


                        </div>-->



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

                            <form method="post" action="{{ route('reclamos-sugerencias.store') }}">
                                @csrf

                                <div class="card-header">
                                    <h4>Registro de Reclamos o Sugerencias</h4>
                                </div>
                                <div class="card-body pb-0">

                                    <div class="row">

                                        <div class="col-md-6 col-lg-4">

                                            <!--<div class="form-group">
                                                <label>{{ __('Circuito') }}</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-envelope"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" id="circuito"
                                                        name="circuito" placeholder="Digita el Circuito" required>
                                                </div>
                                            </div>-->

                                            <div class="form-group">
                                                <label for="defaultSelect">{{ __('Circuito') }}</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fas fa-user-cog"></i></span>
                                                    <select class="form-select form-control" name="circuito" id="circuito">
                                                   
                                                        <option value="" selected disabled>Selecciona:</option>
                                                       
                                                        <option value="yangana">Yangana</option>
                                                        <option value="chontacruz">Chontacruz</option>
                                                        <option value="el tambo">El Tambo</option>
                                                        <option value="celi roman">CELI ROMAN</option>
                                                        <option value="taquil">TAQUIL</option>
                                                        <option value="tebaida">TEBAIDA</option>
                                                        <option value="zamora huayco">ZAMORA HUAYCO</option>
                                                        <option value="iv centenerio">IV CENTENARIO</option>
                                                        <option value="san pedro de la bendita">SAN PEDRO DE LA BENDITA</option>
                                                      
                                                       
                                                    </select>

                                                   
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>{{ __('Nombres') }}</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-envelope"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" id="nombres"
                                                        name="nombres" placeholder="Digita tus nombres" required>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6 col-lg-4">
                                            <!--<div class="form-group">
                                                <label>{{ __('Subcircuito') }}</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-envelope"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" id="sub_circuito"
                                                        name="sub_circuito" placeholder="Digita el Subcircuito"
                                                        required>
                                                </div>
                                            </div>-->

                                            <div class="form-group">
                                                <label for="defaultSelect">{{ __('Subcircuito') }}</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fas fa-user-cog"></i></span>
                                                    <select class="form-select form-control" name="sub_circuito"
                                                        id="sub_circuito">

                                                        <option value="" selected disabled>Selecciona:</option>
                                                      
                                                            <option value="yangana 1">Yangana 1</option>
                                                            <option value="chontacruz 1">Chontacruz 1</option>
                                                            <option value="el tambo 1">El Tambo 1</option>
                                                            <option value="celi roman 1">CELI ROMAN 1</option>
                                                            <option value="taquil 1">TAQUIL 1</option>
                                                            <option value="tebaida 1">TEBAIDA 1</option>
                                                            <option value="zamora huayco 1">ZAMORA HUAYCO 1</option>
                                                            <option value="iv centenerio 1">IV CENTENARIO 1</option>
                                                            <option value="san pedro de la bendita 1">SAN PEDRO DE LA BENDITA 1</option>

                                                    </select>


                                                    
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>{{ __('Apellidos') }}</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-envelope"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" id="apellidos" name="apellidos"
                                                        class="form-control" placeholder="Digita tus apellidos"
                                                        required>
                                                </div>
                                            </div>

                                            <!--<div class="form-group">
                                                <label>{{ __('Category') }}</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-envelope"></i>
                                                        </div>
                                                    </div>
                                                    <select class="form-control selectric">
                                                        <option>Tech</option>
                                                        <option>News</option>
                                                        <option>Political</option>
                                                    </select>
                                                </div>
                                            </div>-->

                                        </div>

                                        <div class="col-md-6 col-lg-4">

                                            <!--<div class="form-group">
                                                <label>{{ __('Tipo:') }}</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-envelope"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" id="tipo"
                                                        name="tipo" placeholder="Digita si es reclamo o sugerencia"
                                                        required>
                                                </div>
                                            </div>-->

                                            <div class="form-group">
                                                <label for="defaultSelect">{{ __('Tipo') }}</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fas fa-user-cog"></i></span>
                                                    <select class="form-select form-control" name="tipo"
                                                        id="tipo">

                                                        <option value="" selected disabled>Selecciona:</option>
                                                      
                                                            <option value="reclamo">Reclamo</option>
                                                            <option value="sugerencia">Sugerencia</option>
                                                           
                                                    </select>


                                                    
                                                </div>
                                            </div>

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

                                <div class="card-body pb-0">

                                    <div class="input-group">
                                        <label>{{ __('Detalle') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>
                                            <textarea class="form-control" id="detalle" name="detalle" required></textarea>

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

      

    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('new/assets/js/app.min.js') }}"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="{{ asset('new/assets/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('new/assets/js/custom.js') }}"></script>

   
  


</body>


</html>
