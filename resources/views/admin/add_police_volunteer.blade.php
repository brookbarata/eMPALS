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
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
           Missing Person
              <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/manage_mp_reports" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/validate_mp_pending" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validate Pending</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
           Found Person
              <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/manage_fp_reports" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/validate_fp_pending" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validate Pending</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
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
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              Police-Volunteer
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/add_police_volunteer" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Police Volunteer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/manage_police_volunteer" class="nav-link">
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
            <h1 class="m-0">Add Police Officer/Volunteer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add Police/Volunteer</a></li>
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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register Police Officer or Volunteer') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('police_volunteer.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-end">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="region" class="col-md-4 col-form-label text-md-end">Region</label>

                            <div class="col-md-6">
                            <select name="region" id="city" type="text" class="form-select form-control @error('region') is-invalid @enderror" name="region" value="{{ old('region') }}" required autocomplete="region" >
                                <option selected>Select Region</option>
                                <option value="South West">South West Peoples Regional State</option>
                                <option value="SNNPR">South Nation Nationalities Peoples Regional State</option>
                                <option value="Sidama">Sidama Regional State</option>
                                <option value="Tigray">Tigray Regional State</option>
                                <option value="Oromia">Oromia Regional State</option>
                                <option value="Afar">Afar Regional State</option>
                                <option value="Benishangul">Benishangul-Gumuz Regional State</option>
                                <option value="Amhara">Amhara Regional State</option>
                                <option value="Somali">Somali Regional State</option>
                                <option value="Gambela">Gambela Regional State</option>
                                <option value="Harari">Harari Regional State</option>
                                <option value="Addis Abeba">Addis Ababa City Adminstration</option>
                                <option value="Dire Dawa">Dire Dawa City Adminstration</option>
                            </select> 
                                @error('region')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="city" class="col-md-4 col-form-label text-md-end">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city">

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sub_city" class="col-md-4 col-form-label text-md-end">Sub-City</label>

                            <div class="col-md-6">
                                <input id="sub_city" type="text" class="form-control @error('sub_city') is-invalid @enderror" name="sub_city" value="{{ old('sub_city') }}" required autocomplete="sub_city">

                                @error('sub_city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="police_station" class="col-md-4 col-form-label text-md-end">Police Station</label>

                            <div class="col-md-6">
                                <input id="police_station" type="text" class="form-control @error('police_station') is-invalid @enderror" name="police_station" value="{{ old('police_station') }}" required autocomplete="police_station">

                                @error('police_station')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
