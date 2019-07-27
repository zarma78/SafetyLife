<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>MakersCamp</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <!--  Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">


    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
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
    <div class="sidebar" data-color="azure" data-image="assets/img/sidebar-5.jpg">

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
                <li class="active">
                    <a href="{{ route('user') }}">
                        <i class="pe-7s-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li>
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
                    <a class="navbar-brand" href="#">Profil</a>
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
                    <div class="col-md-8">
                        <div class="card">
                        
                            <div class="header">
                                <h4 class="title">Modification de Profil</h4>
                            </div>
                            <div class="content">

                                <form action="{{ route('update_users') }}" method="POST" >
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label> Nom </label>
                                                <input  type="text" class="form-control" disabled placeholder="Nom" value={{ Auth::user()->last_name }}>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> Prénom </label>
                                                <input type="text" class="form-control" disabled placeholder="Prénom" value={{ Auth::user()->first_name }}>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> Sexe </label>
                                                <input type="text" class="form-control" disabled placeholder="Sexe" value={{ Auth::user()->sexe }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date de Naissance</label>
                                                <input type="datetime" class="form-control" disabled placeholder="Date" value={{ Auth::user()->age }}>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">E-Mail</label>
                                                <input type="email" class="form-control" disabled placeholder="E-Mail" value={{ Auth::user()->email }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Adresse </label>
                                                <input type="text" class="form-control" placeholder="Adresse" value={{ Auth::user()->address }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Pays</label>
                                                <input type="text" class="form-control" placeholder="Pays" value={{ Auth::user()->pays }}>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Ville</label>
                                                <input type="text" class="form-control" placeholder="Ville" value={{ Auth::user()->ville }}>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Code Postale</label>
                                                <input type="number" class="form-control" placeholder="Code Postale" value={{ Auth::user()->code_postal }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description médicale</label>
                                                <textarea rows="10" class="form-control" disabled placeholder="Description écrite par le médecin/hôpital" value=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="{{ asset('sidebar-5.jpg') }}" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="{{ asset('face-0.jpg') }}" alt="..."/>

                                      <h4 class="title">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}<br />
                                         <small> ID : {{ Auth::user()->id }} "</small>
                                         <hr>
                                      </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> "C'est un petit test <br> Pour dire que j'étais un médecin <br> Avec beaucoup de patients"
                                </p>
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

<!--   Core JS Files   -->
        <script src="{{ asset('js/jquery.3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!--  Charts Plugin -->
        <script src="{{ asset('js/chartist.min.js') }}"></script>

<!--  Notifications Plugin    -->
        <script src="{{ asset('js/bootstrap-notify.js') }}"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
        <script src="{{ asset('js/light-bootstrap-dashboard.js') }}"></script>

</body>


</html>
