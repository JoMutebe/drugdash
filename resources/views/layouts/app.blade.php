<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Laravel') }}</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
     <!-- Datatables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

    <!-- Bootstrap-->
    <link href="{{ asset('css/bootstrap/bootstrap.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('css/fa/css/font-awesome.min.css') }}" rel="stylesheet">
    
    <!-- Gentellela -->
    <link href="{{ asset('css/gentelella.css') }}" rel="stylesheet">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- Bootstrap core CSS     -->
    <link href="theme/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="theme/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="theme/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="theme/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="theme/css/themify-icons.css" rel="stylesheet">
 <!-- Scripts -->

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="/" class="simple-text">
                   {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="/">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="/healthfacilities">
                        <i class="ti-user"></i>
                        <p>Healthcenters</p>
                    </a>
                </li>
                <li>
                    <a href="/orders">
                        <i class="ti-view-list-alt"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li>
                    <a href="/issue">
                        <i class="ti-text"></i>
                        <p>Issues</p>
                    </a>
                </li>
                <li>
                    <a href="/stockitems">
                        <i class="ti-pencil-alt2"></i>
                        <p>EMS list</p>
                    </a>
                </li>
                <li>
                    <a href="/order">
                        <i class="ti-announcement"></i>
                        <p>Alerts</p>
                    </a>
                </li>
                <li>
                    <a href="/districts">
                        <i class="ti-location-arrow"></i>
                        <p>Location</p>
                    </a>
                </li>
				<li>
                    <a href="/profile">
                        <i class="ti-user"></i>
                        <p>User Account</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
									<p>Notifications</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
            <ul class="nav navbar-nav navbar-right">
			<li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="/img/user.png">{{ Auth::user()->name }}
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="javascript:;"> Profile</a></li>
                  <li>
                    <a href="javascript:;">
                      <!-- <span class="badge bg-red pull-right">50%</span> -->
                      <span>Settings</span>
                    </a>
                  </li>
                  <li><a href="javascript:;">Help</a></li>
                  <li><a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      Logout
                  </a></li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </ul>
              </li>

                </div>
            </div>
        </nav>

       <!-- page content -->
      <div class="right_col" role="main">
        @yield('content')
      </div>
      <!-- /page content -->


        <footer class="footer">
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <i>DrugDash - A drug decision support system</i> by <a href="http://www.drugdash.org">Prunes Technologies</a>
                </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="theme/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="theme/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="theme/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="theme/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="theme/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
      
     <script src="{{ asset('js/app.js') }}"></script>
    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="theme/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="theme/js/demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'ti-gift',
            	message: "WELCOME <b>{{ Auth::user()->name }}</b>"

            },{
                type: 'success',
                timer: 4000
            });

    	});
	</script>
  <script src="{{ asset('js/jquery.min.js')}}"></script> 
  <!-- Data tables-->
  <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
  <script src="{{ asset('js/bootstrap.js')}}"></script>
  <!-- Custom Theme Script -->
  <script src="{{ asset('js/gentelella.js')}}"></script>

  <!-- Highcharts-->
  <script src="{{ asset('js/highcharts.js')}}"></script>
  <!--Load dynamic scripts-->

  @stack('scripts')
</html>
