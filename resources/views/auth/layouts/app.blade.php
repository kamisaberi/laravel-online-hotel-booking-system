<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
    {{--<link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">--}}

    <!-- Styles -->
        {{--        <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}


        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="description"
              content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
        <meta name="keywords"
              content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
        <title>Login Page | Materialize - Material Design Admin Template</title>
        <!-- Favicons-->
        <link rel="icon" href="{{asset('images/favicon/favicon-32x32.png')}}" sizes="32x32">
        <!-- Favicons-->
        <link rel="apple-touch-icon-precomposed" href="{{asset('images/favicon/apple-touch-icon-152x152.png')}}">
        <!-- For iPhone -->
        <meta name="msapplication-TileColor" content="#00bcd4">
        <meta name="msapplication-TileImage" content="{{asset('images/favicon/mstile-144x144.png')}}">
        <!-- For Windows Phone -->
        <!-- CORE CSS-->
        <link href="{{asset('css/themes/fixed-menu/materialize.css')}}" type="text/css" rel="stylesheet">
        <link href="{{asset('css/themes/fixed-menu/materialize-rtl.css')}}" type="text/css" rel="stylesheet">
        <link href="{{asset('css/themes/fixed-menu/style.css')}}" type="text/css" rel="stylesheet">
        <link href="{{asset('css/themes/fixed-menu/style-rtl.css')}}" type="text/css" rel="stylesheet">
        <!-- Custome CSS-->
        <link href="{{asset('css/custom/custom.css')}}" type="text/css" rel="stylesheet">
        <link href="{{asset('css/layouts/page-center.css')}}" type="text/css" rel="stylesheet">
        <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
        <link href="{{asset('vendors/perfect-scrollbar/perfect-scrollbar.css')}}" type="text/css" rel="stylesheet">


    </head>
    <body>
        <div id="app">
            {{--<nav class="navbar navbar-expand-md navbar-light navbar-laravel">--}}
                {{--<div class="container">--}}
                    {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                        {{--{{ config('app.name', 'Laravel') }}--}}
                    {{--</a>--}}
                    {{--<button class="navbar-toggler" type="button" data-toggle="collapse"--}}
                            {{--data-target="#navbarSupportedContent"--}}
                            {{--aria-controls="navbarSupportedContent" aria-expanded="false"--}}
                            {{--aria-label="{{ __('Toggle navigation') }}">--}}
                        {{--<span class="navbar-toggler-icon"></span>--}}
                    {{--</button>--}}

                    {{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
                        {{--<!-- Left Side Of Navbar -->--}}
                        {{--<ul class="navbar-nav mr-auto">--}}

                        {{--</ul>--}}

                        {{--<!-- Right Side Of Navbar -->--}}
                        {{--<ul class="navbar-nav ml-auto">--}}
                            {{--<!-- Authentication Links -->--}}
                            {{--@guest--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                            {{--</li>--}}
                            {{--@if (Route::has('register'))--}}
                                {{--<li class="nav-item">--}}
                                    {{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                                {{--</li>--}}
                            {{--@endif--}}
                            {{--@else--}}
                                {{--<li class="nav-item dropdown">--}}
                                    {{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"--}}
                                       {{--data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
                                        {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                                    {{--</a>--}}

                                    {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                                        {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
                                           {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                            {{--{{ __('Logout') }}--}}
                                        {{--</a>--}}

                                        {{--<form id="logout-form" action="{{ route('logout') }}" method="POST"--}}
                                              {{--style="display: none;">--}}
                                            {{--@csrf--}}
                                        {{--</form>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                                {{--@endguest--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</nav>--}}

            <main class="py-4">
                @yield('content')
            </main>
        </div>


        <script type="text/javascript" src="{{asset('vendors/jquery-3.2.1.min.js')}}"></script>
        <!--materialize js-->
        <script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
        <!--scrollbar-->
        <script type="text/javascript" src="{{asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
        <!--plugins.js - Some Specific JS codes for Plugin Settings-->
        <script type="text/javascript" src="{{asset('js/plugins.js')}}"></script>
        <!--custom-script.js - Add your own theme custom JS-->
        <script type="text/javascript" src="{{asset('js/custom-script.js')}}"></script>


    </body>
</html>
