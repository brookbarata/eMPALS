@extends('layouts.admin_app')

@section('content')
   
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage <span class="fw-bold text-danger">Missing</span> Persons</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Missing Persons</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  <section>
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-sm-12">
    @if(session('success'))
        <p class="alert alert-success "> {{ session('success') }} </p>
    @endif
   </div>
    <hr>
  @if(count($missing_report) > 0)
  <div class="table-responsive">
  <table class="table">
    <thead class="table-dark">
      <tr>
        <th>No</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Region</th>
        <th>Address</th>
        <th>Validate Pending Requests</th>
        <th>Notify Nearby Police/Volunteers</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $i = 1;
     ?>
    @foreach ($missing_report as $item )      
      <tr>
        <td>{{$i}}</td>
        <td>{{$item->fname}}</td>
        <td>{{$item->mname}}</td>
        <td>{{$item->age}}</td>
        <td>{{$item->gender}}</td>
        <td>{{$item->region}}</td>
        <td>{{$item->city}}, {{$item->sub_city}} </td>
        @if( $item->confirmed == 1)
          <td><button  class="btn badge badge-success btn-success btn-sm rounded-1" type="submit" data-toggle="tooltip" title="Valid">Validated</button></td>
        @else 
        <td>
        <form method="POST" action="{{ route('manage-missing-person.update', $item)}}" onsubmit= "return confirm('Validate?')"> 
            @csrf  
            @method('PUT')  
        <button  class="btn badge badge-warning btn-danger btn-sm rounded-1" type="submit" data-toggle="tooltip" title="Validate Pending Requests">Pending...</button>
        </form>
        </td>   
       @endif

        @if( $item->notified == 0)
        <td>
        <form method="POST" action="{{ route('send-missing-mail.update', $item)}}" onsubmit= "return confirm('Notfiy Nearby Police/Volunteers?')"> 
            @csrf  
            @method('PUT')  
        <button  class="btn badge badge-warning btn-danger btn-sm rounded-1" type="submit" data-toggle="tooltip" title="Notify Nearby Police or Volunteer">Notify Nearby...</button>
        </form>
        </td>        
        @else 
        <td><button  class="btn badge badge-success btn-success btn-sm rounded-1" type="submit" data-toggle="tooltip" title="Notified">Notified</button></td>
        @endif
        <td>
          <ul class="list-inline sm-12 m-0">
                  <li class="list-inline-item">
                  <form method="POST" action="{{ route('manage-missing-person.destroy', $item)}}"  onsubmit= "return confirm('Delete?')"> 
                      @csrf  
                      @method('DELETE')
                     <button  class="btn btn-danger btn-sm rounded-1" type="submit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                 </form>
                  </li>
            </ul>
       </td>
     </tr>
      <?php
        $i++;
     ?>
     @endforeach 
    </tbody>
  </table>
  </div>
  @else
  <div>
  <p class=" px-5 text-danger">Oh, Noops! You don't have any PENDING missing person reports to manage.</p>
  </div>
  @endif
  </div>
  <div class="card-footer py-1 my-1">
       {{ $missing_report->links() }}
   </div>
    </div>
   </div>
  </section>

  </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>

@endsection
