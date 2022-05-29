@extends('layouts.admin_app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        @if(session('success'))
     <p class="alert alert-success"> {{ session('success') }} </p>
       @endif
       <div class="row">
       <p style="letter-spacing:2px" class="text-dark fw-bold  h2 text-center"> Ethiopian Missing Person Announcement and Locating System (<span class="text-primary" >eMPALS</span>) Encompasses </p>
        <div class="col-sm-3 mt-5 card"><a href="/admin/manage-users">
 <p class="text-center"> <span class="display-1  fw-bold text-success" > {{$user}}</span><span class="display-4  fw-bold text-danger" > +</span></p>
 <h3 class ="text-center text-info fw-bold">Registered Users</h3>
 </a>  </div> 
       <div class="col-sm-3 mt-5 card"> <a href="/admin/manage-police-volunteer">
        <p class="text-center"> <span class="display-1  fw-bold text-success" > {{$police}}</span><span class="display-4  fw-bold text-danger" > +</span></p>
 <h3 class ="text-center fw-bold">Police/Volunteers</h3>        </a>  </div>
        <div class="col-sm-3 mt-5 card"> <a href="/admin/manage-mp-reports">
        <p class="text-center"> <span class="display-1  fw-bold text-success" > {{$missing}}</span><span class="display-4  fw-bold text-danger" > +</span></p>
 <h3 class ="text-center fw-bold text-danger">Missing Reports</h3>
         </a>      
     </div>
        <div class="col-sm-3 mt-5 card"><a href="/admin/manage-fp-reports">
        <p class="text-center"> <span class="display-1  fw-bold text-success" > {{$found}}</span><span class="display-4  fw-bold text-danger" > +</span></p>
 <h3 class ="text-center fw-bold text-primary">Found Reports</h3>          </div>
 </a>  </div>
     

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->

@endsection
