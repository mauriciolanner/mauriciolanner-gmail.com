<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('images/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        Painel de Controle - Nordeste
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/css/paper-dashboard.css?v=2.0.0')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('admin/demo/demo.css')}}" rel="stylesheet" />
    <script src="{{asset('admin/js/core/jquery.min.js')}}"></script>
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="logo text-center">
                <a href="/"><img src="{{asset('images/logo.png')}}" height="50px"></a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="{{ Request::is('painel') ? 'active' : '' }}">
                        <a href="/painel">
                            <i class="nc-icon nc-bank"></i>
                            <p>Painel inicial</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('painel/voos') ? 'active' : '' }}">
                        <a href="/painel/voos">
                            <i class="nc-icon nc-layout-11"></i>
                            <p>Voos</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('painel/viagens') ? 'active' : '' }}">
                        <a href="/painel/viagens">
                            <i class="nc-icon nc-send"></i>
                            <p>Viagens</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('painel/frota') ? 'active' : '' }}">
                        <a href="/painel/frota">
                            <i class="nc-icon nc-send"></i>
                            <p>Frota</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('painel/airport') ? 'active' : '' }}">
                        <a href="/painel/airport">
                            <i class="nc-icon nc-globe"></i>
                            <p>Aeroportos</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('/') ? 'active' : '' }}">
                        <a href="#">
                            <i class="nc-icon nc-tap-01"></i>
                            <p>Reclamações</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#">Painel de Controle</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                Olá {{ Auth::user()->name }}
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item btn-rotate dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com"
                                    id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="nc-icon nc-settings-gear-65"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- contedo aqui -->

            <div class="content">
                <div class="col-md-12">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                        </button>
                        <span>
                            {{ session('success') }}</span>
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                        </button>
                        <span>
                            {{ session('error') }}</span>
                    </div>
                    @endif
                </div>

                @yield('content')
            </div>
            <footer class="footer footer-black  footer-white ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="credits ml-auto">
                            <span class="copyright">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>, Nordeste Linhas Aereas
                            </span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- modal deconfirmação -->
    <div class="modal fade" id="confirme" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div id="title">
                        <h5>Confirmar</h5>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Desistir</button>
                    <div id="link"></div>
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{asset('admin/js/core/popper.min.js')}}"></script>
    <script src="{{asset('admin/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="{{asset('admin/js/plugins/chartjs.min.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{asset('admin/js/plugins/bootstrap-notify.js')}}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('admin/js/paper-dashboard.min.js?v=2.0.0')}}" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{asset('admin/demo/demo.js')}}"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script>
        //mascaras de input
        $('.reais').mask('#.##0,00', {reverse: true});
        //fim das mascaras
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });

        //modal de confirmações
        $('#confirme').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Botão que acionou o modal
        var link = button.data('link')
        var title = button.data('title')
        var modal = $(this)
        modal.find('#title').html(`<h5 class="modal-title">` + title + `</h5>`)
        modal.find('#link').html(`<a href="`+ link + `" type="button" class="btn btn-primary">Confirmar</a>`)
        })
        //fim
    </script>
</body>

</html>