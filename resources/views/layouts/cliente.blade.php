<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Reliance | Group</title>
    <!-- Scripts -->
    <!--script src="{{ asset('js/app.js') }}"></script-->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body>
    <nav class="navbar grey darken-4">
        <div class="nav-wrapper">
            @isset($title)
                <a href="#" class="brand-logo center">{{ $title }}</a>
            @endisset
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="#" data-target="slide-out" class="sidenav-trigger" style="display:block;"><i
                            class="material-icons">menu</i></a></li>
            </ul>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        Cerrar sesion
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <ul id="slide-out" class="sidenav">
        <h3 class="center-align" style="color:#006064;">Reliance</h3>
        <li><a href="{{ route('admin.index') }}"><i class="material-icons">home</i>Inicio</a></li>
        <li><a href="{{ route('user.index') }}"><i class="material-icons">account_circle</i>User</a></li>
        <li>
            <div class="divider"></div>
        </li>
        <li><a class="subheader">Sugerencias</a></li>
        <li><a class="waves-effect" href="#!">Productos sugeridos</a></li>
    </ul>
    <div class="main">
        @yield('content')
    </div>
    <script src="{{ asset('js/vue.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });

    </script>
    @yield('scripts')
</body>

</html>
