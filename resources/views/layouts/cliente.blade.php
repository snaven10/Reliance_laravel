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
    <title>{{ config('app.name', 'e-Pymes') }}</title>
</head>

<body class="grey lighten-4">
    <header>
            <nav class=" navbar  white">
                <div class="nav-wrapper">
                    <span class="brand-logo center grey-text text-darken-1 ">
                        @isset($title)
                            {{ $title }}
                        @else
                            e-Pymes
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
                    <div class="nav-wrapper"><a href="{{ route('cliente.home') }}" class="brand-logo whithe-text center">
                        
                            e-PYMES
                    </a>
                    </div>
                </nav>
            </div>
        </li>
        @auth
        <li><a class="white-text" href="{{ route('empresas.config') }}"><i class="material-icons white-text">account_circle</i>{{ Auth::user()->name }} {{ Auth::user()->lastname }}</a></li>
        <li>
            <a class="white-text" 
                href="#!"
                onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                    <i class="material-icons white-text">input</i>
                    Cerrar Sesion
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
        @else
        <li><a class="white-text" href="{{ route('login') }}"><i class="material-icons white-text">account_circle</i>Iniciar sesion</a></li>
        @endauth
        <li>
            <div class="divider blue darken-4"></div>
        </li>
        <li><a class="white-text" class="waves-effect" href="{{ route('cliente.home') }}"><i class="material-icons white-text">card_travel</i><p>Inicio</p></a></li>
        <li><a class="white-text" class="waves-effect" href="{{ route('servicios') }}"><i class="material-icons white-text">card_travel</i><p>Servicios</p></a></li>
        @can('empresa')
            <li><a class="white-text" class="waves-effect" href="{{ route('empresa.sucursal') }}"><i class="material-icons white-text">local_mall</i><p>Ajustes</p></a></li>
            <li><a class="white-text" class="waves-effect" href="{{ route('pedidos.pedido') }}"><i class="material-icons white-text">local_shipping</i>Mis Pedidos</a></li>
        @endcan
        @can('cliente')
            <li><a class="white-text" class="waves-effect" href="{{ route('cliente.car') }}"><i class="material-icons white-text">add_shopping_cart</i>Mi Carrito</a></li>
        @endcan
        <li><a class="white-text" class="waves-effect" href="{{ route('productopremiun.premiun') }}"><i class="material-icons white-text">redeem</i>Productos Premiun</a></li>

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