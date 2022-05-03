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
                <a class="navbar-brand fw-bold" href="{{ url('/police_volunteer/index') }}">
                    {{ config('app.name', 'MPALS') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('police_volunteer/index') ? 'active':'' }} " aria-current="page" href="/police_volunteer/index">Home</a>
                        </li>
                        <li class="nav-item   ">
                           <a class="nav-link {{ Request::is('police_volunteer/report-missing') ? 'active':'' }}" href="{{ url('/police_volunteer/report-missing') }}">Report Missing Person</a>
                        </li>
                        <li class="nav-item   ">
                           <a class="nav-link {{ Request::is('report-found') ? 'active':'' }}" href="{{ url('/report-found') }}">Locate Found Person</a>
                        </li>
                        <li class="nav-item   ">
                           <a class="nav-link {{ Request::is('filter-out') ? 'active':'' }}" href="/filter-out">Filter Out</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/statistics">Statistics</a>
                        </li>
                        <li class="nav-item dropdown  ">
                            <a class="nav-link dropdown-toggle {{ Request::is('contact') ? 'active':'' }}" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">More</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Help</a></li>
                            <li><a class="dropdown-item" href="#">Contact Us</a></li>
                            <li><a class="dropdown-item" href="#">My Reports</a></li>
                        </ul>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    @if(Auth::guard('police_volunteer')->check())
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('police_volunteer.logout') }}">
                                      Logout
                                    </a>
                                </div>
                        </li>
                    </ul>
                    @endif
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('layouts.footer');
</body>
</html>
