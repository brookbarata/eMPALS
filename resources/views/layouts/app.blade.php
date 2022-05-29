<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'eMPALS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white fixed-top py-1 shadow-sm mx-3">
            <div class="container">
                <a class="navbar-brand fw-bold" href="{{ url('user/home') }}">
                    {{ config('app.name', 'MPALS') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('user/home')||Request::is('user/list-of-missing-person')||Request::is('user/list-of-found-person') ? 'active':'' }} " aria-current="page" href="/user/home">Home</a>
                        </li>
                        <li class="nav-item   ">
                           <a class="nav-link {{ Request::is('user/report-missing-person')||Request::is('user/report-missing')||Request::is('user/report-with-suggestion') ? 'active':'' }}" href="{{ url('/user/report-missing') }}">Report Missing Person</a>
                        </li>
                        <li class="nav-item   ">
                           <a class="nav-link {{ Request::is('user/report-found-person')||Request::is('user/report-found')||Request::is('user/report-with-suggestion-found') ? 'active':'' }}" href="{{ url('/user/report-found') }}">Locate Found Person</a>
                        </li>
                        <li class="nav-item   ">
                           <a class="nav-link {{ Request::is('user/filter-out') ? 'active':'' }}" href="{{ url('/user/filter-out') }}">Filter Out</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('user/statistics') ? 'active':'' }}" href="{{ url('/user/statistics') }}">Statistics</a>
                        </li>
                        <li class="nav-item dropdown  ">
                            <a class="nav-link dropdown-toggle {{ Request::is('user/contact-us')|| Request::is('user/my-reports') ? 'active':'' }}" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">More</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ url('/user/contact-us') }}">Contact Us</a></li>
                            <li><a class="dropdown-item" href="{{ url('/user/my-reports') }}">My Reports</a></li>
                        </ul>
                        </li>
                    </ul>

        

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   Language
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    </a>

                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 mt-5">
            @yield('content')
        </main>
    </div>
    @include('layouts.footer');
</body>
</html>
