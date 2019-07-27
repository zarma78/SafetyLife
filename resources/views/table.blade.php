<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>MakersCamp</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!--  Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">


    <link href="{{ asset('animate.min.css') }}" rel="stylesheet">
    <!-- Animation library for notifications   -->


    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('css/light-bootstrap-dashboard.css') }}" rel="stylesheet">


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/pe-icon-7-stroke.css') }}" rel="stylesheet">

</head>
<body>

    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">
    
        <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="{{ route('home') }}" class="simple-text">
                        MakersCamp
                    </a>
                </div>

                <ul class="nav">
                    <li>
                        <a href="{{ route('home') }}">
                            <i class="pe-7s-graph"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user') }}">
                            <i class="pe-7s-user"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{ route('table') }}">
                            <i class="pe-7s-note2"></i>
                            <p>Liste des patients</p>
                        </a>
                    </li>
                    <li >
                        <a href="{{ route('maps') }}">
                            <i class="pe-7s-map-marker"></i>
                            <p>Maps</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('notifications') }}">
                            <i class="pe-7s-bell"></i>
                            <p>Notifications</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('inscription') }}">
                            <i class="pe-7s-add-user"></i>
                            <p>Création de compte</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Table Patients</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Recherche</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->first_name }}  {{ Auth::user()->last_name }}<span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">La liste des patients par ID</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Nom</th>
                                    	<th>Prénom</th>
                                    	<th>Adresse</th>
                                        <th>Ville</th>
                                    </thead>
                                    <tbody>
                                    @foreach( \App\User::all() as $user)
                                        <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->ville }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
                <div class="container-fluid">
                    <p class="copyright pull-right">
                        &copy; <script>document.write(new Date().getFullYear())</script> <a href="{{ route('dashboard') }}">Etna_group_molotk_c</a>
                    </p>
                </div>
            </footer>
    
        </div>
    </div>
    
    
    </body>
    
        <!--   Core JS Files   -->
        <script src="{{ asset('js/jquery.3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
        <!--  Charts Plugin -->
        <script src="{{ asset('js/chartist.min.js') }}"></script>
    
        <!--  Notifications Plugin    -->
        <script src="{{ asset('js/bootstrap-notify.js') }}"></script>
    
        <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
        <script src="{{ asset('js/light-bootstrap-dashboard.js') }}"></script>
    
        <script type="text/javascript">
            $(document).ready(function(){
    
                demo.initChartist();
    
                $.notify({
                    icon: 'pe-7s-gift',
                    message: "Bienvenue sur notre Dashboard <b>MakersCamp</b>"
    
                },{
                    type: 'info',
                    timer: 4000
                });
    
            });
        </script>
    
    </html>
    