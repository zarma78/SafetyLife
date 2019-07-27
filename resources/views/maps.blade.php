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


    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <!-- Animation library for notifications   -->


    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('css/light-bootstrap-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pe-icon-7-stroke.css') }}" rel="stylesheet">
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet">
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>


</head>
<body>

    <div class="wrapper">
        <div class="sidebar" data-color="red" data-image="assets/img/sidebar-5.jpg">
    
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
                    <li>
                        <a href="{{ route('table') }}">
                            <i class="pe-7s-note2"></i>
                            <p>Liste des patients</p>
                        </a>
                    </li>
                    <li class="active">
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
                            <a class="navbar-brand" href="#">Localisation GPS</a>
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

        <div id="map">
            <!--  Google Maps -->
            <script>

                let map;
                let markersArray = [];
                function initMap() {
                    map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: 48.8139, lng: 2.3925085999999998},
                    zoom: 8
                    });
                    addMarker({lat: 48.8139, lng: 2.3925085999999998}, 'red', '94200', 'Fr4nck', 'Courtaux', '06...', 'Brandon', 'Kernin', '06....', '15 rue ...');
                    addMarker({lat: 48.81840734070504, lng: 2.3955009841919264}, 'yellow', '94', 'Fr4nck', 'TEST2', '06...', 'Brandon', 'Kernin', '06....', '15 rue ...');
                    addMarker({lat: 48.813076176134125, lng: 2.3879749894480256}, 'blue', '1', 'Fr4nck', 'TEST3', '06...', 'Brandon', 'Kernin', '06....', '15 rue ...');
                    addMarker({lat: 48.813076176134125, lng: 2.38}, 'green', '132', 'Fr4nck', 'TOBY', '06...', 'Brandon', 'Kernin', '06....', '15 rue ...');
                }
                function addMarker(latLng, color, id, prenom, nom, num, refprenom, refnom, refnum, refadresse) {
                    let url = "http://maps.google.com/mapfiles/ms/icons/";
                    url += color + "-dot.png";
                    let marker = new google.maps.Marker({
                        map: map,
                        position: latLng,
                        icon: {
                        url: url
                        }
                    });
                    
                    var contentString = '<div id="content">'+
                        '<div id="siteNotice">'+
                        '</div>'+
                        '<h2 id="firstHeading" class="firstHeading">ID : '+ id +'</h2>'+
                        '<div id="bodyContent">'+
                        '<p><b>' +
                        'PRENOM : '+ prenom +'<br>'+
                        'NOM : '+ nom +'<br>'+
                        'NUMERO : '+ num +'<br><br>'+
                        'REFERENT/E : <br>'+
                        'PRENOM : '+ refprenom +'<br>'+
                        'NOM : '+ refnom +'<br>'+
                        'NUMERO : '+ refnum +'<br>'+
                        'ADRESSE :'+ refadresse +'<br>'+    
                        '</b></p>'+
                        '</div>'+
                        '</div>';

                    var infowindow = new google.maps.InfoWindow({
                        content: contentString
                    });

                    marker.addListener('click', function() {
                    infowindow.open(map, marker);
                    });

                markersArray.push(marker);
                }
            </script>
        </div>

    </div>
</div>


</body>

        <!--   Core JS Files   -->
    <script  type="text/javascript" src="{{ asset('js/jquery.3.2.1.min.js') }}"></script>


	<!--  Charts Plugin -->
    <script type="text/javascript" src="{{ asset('js/chartist.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script type="text/javascript" src="{{ asset('js/bootstrap-notify.js') }}"></script>

    
    <!--  Google Maps Plugin    -->
    <script async defer type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbVsDD2lc1EKALTlVywJW3my_JD9owxXw&callback=initMap"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script type="text/javascript" src="{{ asset('js/light-bootstrap-dashboard.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/demo.js') }}"></script>


    <script>
        $().ready(function(){
            demo.initGoogleMaps();
            initMap();
        });
    </script>

</html>
