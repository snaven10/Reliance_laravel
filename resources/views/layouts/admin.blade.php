<!DOCTYPE html>
<html lang="es">
    <head>
        <!--Import Google Icon Font-->
        <link href="{{ asset('css/icon.css') }}" rel="stylesheet">
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
                <nav class="navbar blue darken-4">
                    <div class="nav-wrapper">
                        <span class="brand-logo center white-text">
                            @isset($title)
                                {{ $title }}
                            @else
                                Reliance
                            @endisset
                        </span>
                        <ul class="right hide-on-med-and-down">
                            <li>
                                <a data-target="modal1" class="btn modal-trigger" href="#modal1"><i class="material-icons">add_shopping_cart</i></a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Cerrar sesion
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
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
                <a class="white-text" class="waves-effect" href="{{ route('admin.home') }}">
                    <i class="material-icons white-text">home</i>
                    Home
                </a>
            </li>
            @can('user.index')
                <li>
                    <a class="white-text" class="waves-effect" href="{{ route('user.index') }}">
                        <i class="material-icons white-text">group</i>
                        User
                    </a>
                </li>
            @endcan

            @can('role.index')
                <li>
                    <a class="white-text" class="waves-effect" href="{{ route('role.index') }}">
                        <i class="material-icons white-text">group</i>
                        role
                    </a>
                </li>
            @endcan

            @can('permission.index')
                <li>
                    <a class="white-text" class="waves-effect" href="{{ route('permission.index') }}">
                        <i class="material-icons white-text">group</i>
                        permission
                    </a>
                </li>
            @endcan

            @can('branch.index')
                <li>
                    <a class="white-text" class="waves-effect" href="{{ route('branch.index') }}">
                        <i class="material-icons white-text">location_city</i>
                        Sucursales
                    </a>
                </li>
            @endcan

            @can('supplier.index')
                <li>
                    <a class="white-text" class="waves-effect" href="{{ route('location.index') }}">
                        <i class="material-icons white-text">event_note</i>
                        Estantes
                    </a>
                </li>
            @endcan

            @can('supplier.index')
                <li>
                    <a class="white-text" class="waves-effect" href="{{ route('supplier.index') }}">
                        <i class="material-icons white-text">local_shipping</i>
                        Proveedores
                    </a>
                </li>
            @endcan
        </ul>
        <main id="app">
            @yield('content')
        </main>
        <!-- Modal Structure -->
        <div id="modal1" class="modal modales modal-fixed-footer">
            <div class="modal-content">
                <h4>Modal Header</h4>
                <p>A bunch of text</p>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>
        </div>
        <!--JavaScript-->
        <script type="text/javascript" src="{{ asset('js/vue.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/v-mask.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/axios.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const elems = document.querySelectorAll('.sidenav'),
                modal = document.querySelectorAll('.modales');
                M.AutoInit();
            });
        </script>
        @yield('scripts')
    </body>
</html>
