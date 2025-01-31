<!DOCTYPE html>
<html lang="en">


<!-- auth-register.html  21 Nov 2019 04:05:01 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Registro</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('new/assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('new/assets/bundles/jquery-selectric/selectric.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('new/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('new/assets/css/components.css') }} ">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('new/assets/css/custom.css') }} ">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('new/assets/img/favicon.ico') }}' />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Create una Cuenta</h4>
                            </div>
                            <div class="card-body">

                                <form method="POST" action="{{ route('register') }}" class="js-validate needs-validation" novalidate>
                                    @csrf

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="frist_name">Nombres</label>
                                            <input id="name" type="text" class="form-control" name="name"
                                                placeholder="Digita tus nombres" :value="old('name')" required
                                                autofocus>
                                        </div>
                                        <!--<div class="form-group col-6">
                      <label for="last_name">Last Name</label>
                      <input id="last_name" type="text" class="form-control" name="last_name">
                    </div>-->
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Correo</label>
                                        <input id="email" type="email" placeholder="Digita un correo"
                                            class="form-control" name="email" :value="old('email')" required>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Contraseña</label>
                                            <input id="password" type="password" class="form-control pwstrength"
                                                placeholder="Digita una contraseña" data-indicator="pwindicator"
                                                name="password" required>
                                            <!--<div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>-->
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password2" class="d-block">Confirmar Contraseña</label>
                                            <input id="password_confirmation" type="password" class="form-control"
                                                placeholder="Confirmar Contraseña" name="password_confirmation" required>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            REGISTRATE
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="mb-4 text-muted text-center">
                                ¿Ya estás registrado? <a href="{{ route('login') }}">Iniciar Sesión</a>
                            </div>
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
    <script src="{{ asset('new/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ asset('new/assets/bundles/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('new/assets/js/page/auth-register.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('new/assets/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('new/assets/js/custom.js') }}"></script>
</body>



</html>
