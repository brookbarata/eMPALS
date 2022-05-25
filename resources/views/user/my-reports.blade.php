@extends('layouts.app')

@section('content')

<div class="container"> 
  <div class="row  mb-1">
           <div class="d-grid col-sm-3 mx-2">
           <nav aria-label="breadcrumb" class="bg-light">
                    <ol class="breadcrumb my-1 px-0">
                        <li class="breadcrumb-item"><a href="/user/home">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Reports</li>
                    </ol>
                    </nav>
            </div>  
 </div> 
<div class="container mt-1">
    @if(session('success'))
        <p class="alert alert-success "> {{ session('success') }} </p>
    @endif
    <hr>
  <h2>Your <span class="fw-bold text-danger">Missing</span> Person Reports</h2>
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
        <th>Add, Edit, Delete</th>
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
        <td>
          <ul class="list-inline sm-12 m-0">
                  <li class="list-inline-item">
                     <a href="/user/report-missing"> <button class="btn btn-primary btn-sm rounded-1" type="button" data-toggle="tooltip" data-placement="top" title="Add"><i class="fa fa-table"></i></button></a>
                  </li>
                  <li class="list-inline-item">
                  <a href="{{ route('list-of-missing-person.edit', $item)}}"> <button class="btn btn-success btn-sm rounded-1" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
                  </li>
                  <li class="list-inline-item">
                  <form method="POST" action="{{ route('list-of-missing-person.destroy', $item)}}"  onsubmit= "return confirm('Delete?')"> 
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
  <p class=" px-5 text-danger">Oh, Noops! You don't have any found person reports.</p>
  </div>
  @endif

  <h2>Your <span class="fw-bold text-success">Found</span> Person Reports</h2>
  @if(count($found_report) > 0) 
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
        <th>Add, Edit, Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $i = 1;
     ?>
    @foreach ($found_report as $item )      
      <tr>
      
        <td>{{$i}}</td>
        <td>{{$item->fname}}</td>
        <td>{{$item->mname}}</td>
        <td>{{$item->age}}</td>
        <td>{{$item->gender}}</td>
        <td>{{$item->region}}</td>
        <td>{{$item->city}}, {{$item->sub_city}} </td>
        <td>
          <ul class="list-inline m-0">
                  <li class="list-inline-item">
                     <a href="/user/report-found"> <button class="btn btn-primary btn-sm rounded-1" type="button" data-toggle="tooltip" data-placement="top" title="Add"><i class="fa fa-table"></i></button></a>
                  </li>
                  <li class="list-inline-item">
                     <a href="{{ route('list-of-found-person.edit', $item)}}"> <button class="btn btn-success btn-sm rounded-1" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
                  </li>
                  <li class="list-inline-item">
                  <form method="POST" action="{{ route('list-of-found-person.destroy', $item)}}"  onsubmit= "return confirm('Delete?')"> 
                      @csrf  
                      @method('DELETE')
                     <button  class="btn btn-danger btn-sm rounded-1" type="submit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                 </form>                  </li>
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
    <p class=" px-5 text-danger">Oh, Noops! You don't have any found person reports.</p>
  </div>
  @endif
</div>

@endsection
