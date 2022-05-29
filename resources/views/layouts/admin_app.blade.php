
<div class="container-fluid mt-5"> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>eMPALS Admin Dashboard </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset( 'backend/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset( 'backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset( 'backend/dist/css/adminlte.min.css') }}">

</head>
<body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
 <p class="fw-bold text-center text-light mt-1">eMPALS Admin Dashboard</p>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      @if(Auth::guard('admin')->check())
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}">
                                      Logout
                                    </a>
                                </div>
                        </li>
                    </ul>
                    @endif
    </ul>
  </nav>
  <!-- /.navbar -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/admin/dashboard" class="brand-link">
      <span class="brand-text font-weight-bold">Dashboard</span>
    </a>
    <div class="sidebar">
        <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/admin" class="nav-link {{ Request::is('admin')||Request::is('admin/dashboard')? 'active':'' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/manage-users" class="nav-link {{ Request::is('admin/manage-users')? 'active':'' }}">
            <i class="fas fa-user-cog" aria-hidden="true"></i>
              <p>
              &nbsp;  Manage Users
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link  {{ Request::is('admin/add-police-volunteer')||Request::is('admin/manage-police-volunteer')? 'active':'' }}">
              <i class="fas fa-user-tie"></i>
              <p>
              &nbsp;&nbsp; &nbsp; Police-Volunteer
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/add-police-volunteer" class="nav-link {{ Request::is('admin/add-police-volunteer')? 'active':'' }}">
                  <i class="fas fa-user-plus"></i>
                  <p> &nbsp; &nbsp; Add Police Volunteer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/manage-police-volunteer" class="nav-link {{ Request::is('admin/manage-police-volunteer')? 'active':'' }}">
                  <i class="fas fa-user-cog"></i>
                  <p> &nbsp;&nbsp; Manage Police/Volunteer</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item ">
            <a href="/admin/manage-found-responses" class="nav-link {{ Request::is('admin/manage-found-responses')? 'active':'' }}">
              <i class="fas fa-id-card"></i>
              <p>
              &nbsp;&nbsp;&nbsp;  Found Responses
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="/admin/manage-missing-responses" class="nav-link {{ Request::is('admin/manage-missing-responses')? 'active':'' }}">
              <i class="far fa-id-card"></i>
              <p>
              &nbsp;&nbsp;&nbsp;   Missing Responses
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="/admin/manage-fp-reports" class="nav-link {{ Request::is('admin/manage-fp-reports')? 'active':'' }}">
              <i class="fas fa-street-view"></i>
              <p>
              &nbsp;&nbsp;&nbsp; Manage Found Reports
              </p>
            </a>
          </li>

          <li class="nav-item">
          <a href="/admin/manage-mp-reports" class="nav-link {{ Request::is('admin/manage-mp-reports')? 'active':'' }}">
              <i class="fas fa-user-ninja"></i>
              <p>
              &nbsp;&nbsp;&nbsp; Manage Missing Reports
              </p>
            </a>
          </li>
     
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<div class="m-0">

    @yield('content')

  @include('layouts.footer');
</div>
  </div>
<!-- ./wrapper -->

<script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset( 'backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset( 'backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset( 'backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset( 'backend/dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset( 'backend/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset( 'backend/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset( 'backend/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset( 'backend/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset( 'backend/plugins/chart.js/Chart.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<!-- <script src="{{ asset( 'backend/dist/js/demo.js') }}"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset( 'backend/dist/js/pages/dashboard2.js') }}"></script>
</body>
</html>