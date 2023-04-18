<!doctype html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
{{--    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">--}}

    <!-- Scripts -->
    @vite(['resources/assets/back/sass/app.scss', 'resources/assets/back/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm bg-primary text-white">
            <div class="container">
                <a style="color:white;" class="navbar-brand" href="{{ url('/') }}">
                    فیلم نت - مدیریت
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a style="color:white;" class="nav-link"
                                       href="{{ route('login') }}">{{ __('ورود') }}</a>
                                </li>
                            @endif

                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#"
                                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                   v-pre>
                                    {{ Auth::user()->name .' '. Auth::user()->l_name  }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" style="color: white"
                                     aria-labelledby="navbarDropdown">
                                    @can("admin-access")
                                        <a class="dropdown-item" href="{{url("/admin/dashboard")}}">
                                            <i class="fa fa-home"></i>
                                            {{ __('صفحه اصلی') }}
                                        </a>
                                    @endcan
                                    @can("user-access")
                                        <a class="dropdown-item" href="{{url("user/home")}}">
                                            <i class="fa fa-home"></i>
                                            {{ __('صفحه اصلی') }}
                                        </a>
                                    @endcan
                                    <a class="dropdown-item" href="{{ route('login') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off"></i>
                                        {{ __('خروج') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
