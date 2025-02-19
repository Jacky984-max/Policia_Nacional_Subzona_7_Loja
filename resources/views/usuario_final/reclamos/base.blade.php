<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->

<head>
    <meta charset="UTF-8" name="csrf-token" content="{{ csrf_token() }}">
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

        @yield('usuario_final')

        @stack('js')

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
