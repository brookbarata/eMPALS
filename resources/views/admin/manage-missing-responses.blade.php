@extends('layouts.admin_app')

@section('content')
   

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Missing Responses</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Missing Responses</li>
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

    @if(count($responses) > 0)
    <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Manage Missing Responses </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th> ID</th>
                      <th>Relation</th>
                      <th>Address</th>
                      <th>Circumstances</th>
                      <th>Notify Response</th>
                      <th>Remove Response</th>
                    </tr>
                    </thead>
                        <?php
                          $i = 1;
                        ?>
        @foreach ($responses as $item )      
                    <tbody>
                    <tr>
        <td>{{$i}}</td>
        <td>{{$item->relation}}</td>
        <td>{{$item->address}}</td>
        <td>{{$item->circumstances}}</td>
        <td>
        <li class="list-inline-item">
          <form method="POST" action="{{ route('send-mail.show', $item)}}" onsubmit= "return confirm('Notfiy Reporter?')"> 
            @csrf  
            @method('PUT')  
        <button  class="btn badge badge-warning btn-danger btn-sm rounded-1" type="submit" data-toggle="tooltip" title="Notify Reporter">Notify Reporter...</button>
        </form>
        </li>
      </td>
        <td>
          <ul class="list-inline sm-12 m-0">
                  <li class="list-inline-item">
                  <form method="POST" action="{{ route('respond-missing.destroy', $item)}}"  onsubmit= "return confirm('Delete?')"> 
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
                <!-- /.table-responsive -->
              </div>
   @else
    <div>
    <p class=" px-5 text-danger">Oh, Noops! You don't have any MISSING RESPONSES to manage.</p>
    </div>
    @endif
    <div class="card-footer py-1 my-1">
       {{ $responses->links()}}
   </div>
            </div>
            <!-- /.card -->
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
