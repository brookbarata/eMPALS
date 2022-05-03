@extends('layouts.admin_app')

@section('content')


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-bold">eMPALS Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="/admin" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
    
    
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-copy"></i>
              <p>
           Missing Person
              <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/manage_mp_reports" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/validate_mp_pending" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validate Pending</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-copy"></i>
              <p>
           Found Person
              <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/manage_fp_reports" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/validate_fp_pending" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validate Pending</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item ">
            <a href="/admin/manage_meet_persons" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
           Meet Person
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/manage_users" class="nav-link">
              <i class="nav-icon fa fa-users" aria-hidden="true"></i>
              <p>
               User Management
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link  ">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              Police-Volunteer
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/add_police_volunteer" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Police Volunteer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/manage_police_volunteer" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Police Volunteer</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="/admin/statistics" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Statistics
              </p>
            </a>
          </li>
     
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Validate MP Pending Requests</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Validate Pending Requests</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  <section>
    <div class="container">
    <div class="row justify-content-center">
  
    <h1>Validate MP Pending</h1>

    </div>
   </div>
  </section>





    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->

@endsection
