<!doctype html>
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
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nhrrob-css-helper.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">

    @yield('header')
    @yield('styles')

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Features
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.permissions.index') }}">
                                    {{ __('Permissions') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.roles.index') }}">
                                    {{ __('Roles') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                    {{ __('Users') }}
                                </a>
                                
                                {{-- <a class="dropdown-item" href="{{ route('admin.products.index') }}">
                                    {{ __('Products') }}
                                </a> --}}

                                <a class="dropdown-item" href="{{ route('admin.work-types.index') }}">
                                    {{ __('Work Types') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.family-relations.index') }}">
                                    {{ __('Family Relations') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.home-ownership-statuses.index') }}">
                                    {{ __('Home Ownership Statuses') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.home-facilities.index') }}">
                                    {{ __('Home Facilities') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.credit-times.index') }}">
                                    {{ __('Credit Times') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.purpose-usages.index') }}">
                                    {{ __('Purpose Usages') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.income-sources.index') }}">
                                    {{ __('Income Sources') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.debt-guarantees.index') }}">
                                    {{ __('Debt Guarantees') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.guarantee-statuses.index') }}">
                                    {{ __('Guarantee Statuses') }}
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
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

    <script src="{{ asset('js/script.js') }}"></script>
    @stack('scripts')

</body>

</html>