<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DiceGold') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('theme/css/bootstrap-dark.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{ asset('theme/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ asset('theme/css/app-dark.min.css') }}" id="app-style" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/app.css') }}" id="app-style" rel="stylesheet" type="text/css"/>
    <script src="//{{ request()->getHost() }}:{{env('LARAVEL_ECHO_PORT')}}/socket.io/socket.io.js"></script>
    <script>
        window.laravel_echo_port='{{env("LARAVEL_ECHO_PORT")}}';
        @auth
            window.api_token = '{{\Illuminate\Support\Facades\Auth::user()->api_token}}';
        @endauth

    </script>

</head>
<body data-topbar="dark" class="dark" data-layout="horizontal">

<div id="layout-wrapper">
    <div id="app">
    </div>

<!-- Scripts -->
    <script src="{{ asset('js/bootstrap.js')}}"></script>
    <script src="{{ asset('js/app.js')}}"></script>
    <script src="{{ asset('theme/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('theme/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('theme/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('theme/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('theme/libs/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset('theme/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ asset('theme/js/app.js') }}"></script>
</div>
</body>
</html>

