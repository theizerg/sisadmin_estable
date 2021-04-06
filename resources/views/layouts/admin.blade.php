<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>MMM - @yield('title')</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="robots" content="noindex, nofollow">


        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/system.css') }}">
        <link rel="icon" href="{{ asset('images/logo/logo-hexagono.png') }}">
         @stack('styles')
    </head>
    <body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
        <div class="wrapper" id="body">


        <nav class="main-header navbar navbar-expand navbar-white navbar-light blue-gradient-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            

        </li>
        
        </li>
        <li class="nav-item d-none d-sm-inline-block">

        </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <div class="input-group-append">
            </div>
        </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                <li class="dropdown user user-menu" >
                    <a href="#" class="dropdown-toggle text-white" data-toggle="dropdown">
                    <!--<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
                    <span class="fa fa fa-user"></span>
                    <span class="hidden-xs">{{ Auth::user()->display_name }} </span>
                    </a>
                    <ul class="dropdown-menu text-white">
                    <li class="user-header blue darken-4">
                       <!-- <img src="{{ asset('images/user/user1-128x128.jpg') }}" class="img-circle" alt="User Image">-->
                        <i class="fa fa-user fa-5x" style="color:#fff;"></i>
                        <p>
                        {{ Auth::user()->display_name }}
                        <br>
                        {{ Auth::user()->hasrole('Administrador') ? 'Supervisor Nacional' : 'Presbítero' }}



                        </p>
                    </li>
                    <li class="user-footer">
                      <div class="float-left">
                        <a href="{{ url('user', [Auth::user()->encode_id]) }}" class="btn btn-default btn-flat">
                            <i class="fa fa-eye"></i> Datos
                        </a>
                        </div>
                          <div class="float-right">
                        <a href="logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                            <i class="fas fa-sign-out-alt"></i> Salir
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        </div>
                    </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <!-- Uncomment this line to activate the control right sidebar button
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
                -->
                </ul>
            </div>
        </ul>
    </nav>
    <!-- /.navbar -->


        <!-- Left side column. contains the logo and sidebar -->
        <aside  class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{url('/')}} " class="brand-link elevation-4">
              <img src="{{('/images/logo/logo-hexagono.png')}} "
                   alt="AdminLTE Logo"
                   class="brand-image"
                   style="opacity: .8">
              <span class="brand-text font-weight-light">SISADMIN</span>
            </a>
            @include('layouts.partials.leftmenu')
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper"><br>
            <section class="content-header">
            <h1 class="ml-3">
                @yield('page_title')
                <small>@yield('page_subtitle')</small>
            </h1>
            <ol class="breadcrumb float-sm-right">

                @show
            </ol>
            </section>



            <!-- Main content -->
            <section class="content container-fluid">
            <!--Page Content Here -->
            @yield('content')
            </section>
        </div>



        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="float-right hidden-xs">
            {{ env('APP_NAME') }}
            </div>
            <strong>Copyright &copy; 2021 <a href="#">SAPCNPE</a>.</strong> Todos los derechos reservados.
        </footer>

        <!-- Control Sidebar -->
        
        @include('layouts.partials.sidebar')
        
        </div>

        <!-- REQUIRED JS SCRIPTS -->
        <!-- jQuery -->
        <script src="{{ asset('js/moment.js') }}"></script>
        <script src="{{asset('js/app.js')}}"></script>   
        <script src="{{asset('js/system.js')}}"></script>     
        <script src="{{ asset('js/demo.js') }}"></script>

        <script>

        </script>
        @stack('scripts')

        <style>

        #sidebar{


                
                }


        #opciones{

                    background: #b71c1c;


                }


        </style>

   
    </body>
</html>
