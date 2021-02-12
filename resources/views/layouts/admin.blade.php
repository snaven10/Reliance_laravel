<!DOCTYPE html>
<html lang="es">
    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="{{ asset('/css/materialize.min.css') }}" media="screen,projection" />
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        @yield('css')
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Reliance') }}</title>
    </head>
    <body class="grey lighten-4">
        <header>
                <nav class="navbar  white">
                    <div class="nav-wrapper">
                        <span class="brand-logo center grey-text text-darken-1 ">
                            @isset($title)
                                {{ $title }}
                            @else
                                Reliance
                            @endisset
                        </span>
                        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons black-text">menu</i></a>
                    </div>
                </nav>
        </header>
        <ul class="sidenav sidenav-fixed blue darken-2" id="slide-out">
            <li>
                <div class="navbar-fixed">
                    <nav class=" navbar blue darken-4">
                        <div class="nav-wrapper"><a href="#" class="brand-logo whithe-text center">
                            Reliance
                        </a>
                        </div>
                    </nav>
                </div>
            </li>
            <li>
                <a class="white-text" class="waves-effect" href="{{ route('user.index') }}">
                    <i class="material-icons white-text">group</i>
                    User
                </a>
            </li>
        </ul>
        <main id="app">
            @yield('content')
        </main>
        <!--JavaScript-->
        <script src="{{ asset('/js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jq.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/initmz.js') }}"></script>
        @yield('scripts')
    </body>
</html>