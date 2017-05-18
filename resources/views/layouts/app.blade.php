<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Datatables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

    <!-- Bootstrap-->
    <link href="{{ asset('css/bootstrap/bootstrap.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('css/fa/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Gentellela -->
    <link href="{{ asset('css/gentelella.css') }}" rel="stylesheet">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    
1
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

    <!-- Scripts -->



    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="/" class="site_title"><i class="fa fa-paw"></i> <span>{{ config('app.name', 'Laravel') }}</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="/img/user.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>{{ Auth::user()->name }}</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3> General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Location <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="/districts">Districts</a></li>
                    <li><a href="/counties">Counties</a></li>
                    <li><a href="/subcounties">Subcounties</a></li>
                    <li><a href="/parishes">Parishes</a></li>
                    <li><a href="/villages">Villages</a></li>
                  </ul>
                </li>
                <li><a href="/healthfacilities"><i class="fa fa-hospital-o"></i> Health Facilities</a></li>
                <li><a href="/orders"><i class="fa fa-support"></i> Orders</a></li>
                <li><a href="/issue"><i class="fa fa-laptop"></i> Issues</a></li>
                <li><a href="/stockitems"><i class="fa fa-archive"></i> EMS List</a></li>
            </div>
            <div class="menu_section">
              <h3> User Account</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-lock"></i>Administrator <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="/users">Users</a></li>
                    <li><a href="/logs">User Permissions</a></li>
                    <li><a href="/logs">Access logs</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-home"></i> My Account <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="/profile">Profile</a></li>
                    <li><a href="/counties">Change Password</a></li>
                    <li><a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a></li>

                  </ul>
                </li>
            </div>
          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>

          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

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

              <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false" title="Notifications">
                  <i class="fa fa-bell"></i>
                  <!-- <span class="badge bg-green">6</span> -->
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  <li>
                    <a>
                      <span class="image"><img src="img/user.png" alt="Profile Image" /></span>
                      <span>
                        <span>DHO</span>
                        <span class="time">2 mins ago</span>
                      </span>
                      <span class="message">
                        We have new supplies for HIV drugs.
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="img/user.png" alt="Profile Image" /></span>
                      <span>
                        <span>RDC</span>
                        <span class="time">2 hours ago</span>
                      </span>
                      <span class="message">
                        Do you guys want the budget to be improved?
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="img/user.png" alt="Profile Image" /></span>
                      <span>
                        <span>In charge</span>
                        <span class="time">3 days ago</span>
                      </span>
                      <span class="message">
                        We received our supplies for this cycle.
                      </span>
                    </a>
                  </li>

                  <li>
                    <div class="text-center">
                      <a>
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        @yield('content')
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          DrugDash - A drug decision support system by  <a href="http://prunestech.com" target="_blank">Prunes Technologies</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>
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
</body>
</html>
