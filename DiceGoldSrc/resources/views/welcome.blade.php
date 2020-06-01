<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('theme/images/favicon.ico') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('theme/css/bootstrap-dark.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('theme/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('theme/css/app-dark.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/app.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    </head>
    <body  data-topbar="dark" data-layout="horizontal">
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="{{ url('/') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset('theme/images/logo-sm-dark.png')}}" alt="" height="22">
                                </span>
                            <span class="logo-lg">
                                    <img src="{{asset('theme/images/logo-dark.png')}}" alt="" height="20">
                                </span>
                            {{ config('app.name', 'Laravel') }}
                        </a>

                        <a href="{{ url('/') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset('theme/images/logo-sm-light.png')}}" alt="" height="22">
                                </span>
                            <span class="logo-lg">
                                    <img src="{{asset('theme/images/logo-light.png')}}" alt="" height="20">
                                </span>
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
                </div>

                <div class="d-flex">

                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <a href="{{ url('/home') }}" class="button">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="button">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="button">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>

            </div>
        </header>
        <main class="py-4" id="app">
            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </main>

    </div>
        <!-- Scripts -->
        <script src="{{ asset('theme/libs/jquery/jquery.min.js') }}" defer></script>
        <script src="{{ asset('theme/libs/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
        <script src="{{ asset('theme/libs/metismenu/metisMenu.min.js') }}" defer></script>
        <script src="{{ asset('theme/libs/simplebar/simplebar.min.js') }}" defer></script>
        <script src="{{ asset('theme/libs/node-waves/waves.min.js') }}" defer></script>
        <script src="{{ asset('theme/js/app.js') }}" defer></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
