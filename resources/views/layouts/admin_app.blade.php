
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
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
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
      <span class="brand-text font-weight-bold">eMPALS Dashboard</span>
    </a>
    <div class="sidebar">
        <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="/admin" class="nav-link {{ Request::is('admin')||Request::is('admin/dashboard')? 'active':'' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
  
          <li class="nav-item">
          <a href="#" class="nav-link {{ Request::is('admin/manage-mp-reports')||Request::is('admin/validate-mp-pending')? 'active':'' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
           Missing Person
              <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/manage-mp-reports" class="nav-link {{ Request::is('admin/manage-mp-reports')? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/validate-mp-pending" class="nav-link {{ Request::is('admin/validate-mp-pending')? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validate Pending</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item ">
            <a href="#" class="nav-link {{ Request::is('admin/manage-fp-reports')||Request::is('admin/validate-fp-pending')? 'active':'' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
           Found Person
              <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/manage-fp-reports" class="nav-link {{ Request::is('admin/manage-fp-reports')? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/validate-fp-pending" class="nav-link {{ Request::is('admin/validate-fp-pending')? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validate Pending</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item ">
            <a href="/admin/manage-meet-persons" class="nav-link {{ Request::is('admin/manage-meet-persons')? 'active':'' }}">
              <i class="nav-icon fas fa-tree"></i>
              <p>
           Meet Person
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/manage-users" class="nav-link {{ Request::is('admin/manage-users')? 'active':'' }}">
            <i class="nav-icon fa fa-users" aria-hidden="true"></i>
              <p>
               User Management
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link  {{ Request::is('admin/add-police-volunteer')||Request::is('admin/manage-police-volunteer')? 'active':'' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              Police-Volunteer
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/add-police-volunteer" class="nav-link {{ Request::is('admin/add-police-volunteer')? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Police Volunteer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/manage-police-volunteer" class="nav-link {{ Request::is('admin/manage-police-volunteer')? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Police Volunteer</p>
                </a>
              </li>
            </ul>
          </li>

     
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

    @yield('content')

  @include('layouts.footer');

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