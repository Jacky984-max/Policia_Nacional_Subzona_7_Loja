<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login</title>
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
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                            <div class="card-body">

                                <form method="POST" action="{{ route('login') }}" class="js-validate needs-validation"
                                    novalidate>

                                    @csrf

                                    <div class="form-group">
                                        <label for="email">Correo</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            placeholder="Digita tu Correo" :value="old('email')" tabindex="1"
                                            required autofocus>
                                        <div class="invalid-feedback">
                                            Por favor complete su correo electrónico.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Contraseña</label>
                                            <div class="float-right">
                                                <!--<a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a>-->
                                            </div>
                                        </div>
                                        <input id="password" type="password" placeholder="Digita tu contraseña"
                                            class="form-control" name="password" tabindex="2" required>
                                        <div class="invalid-feedback">
                                            Por favor complete su contraseña.
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Iniciar Sesión
                                        </button>
                                    </div>
                                </form>


                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            ¿No tienes una cuenta? <a href="{{ route('register') }}">Registrate en Línea</a>
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
