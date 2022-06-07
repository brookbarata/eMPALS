@extends('layouts.police_volunteer_app')

@section('content')
    

    <div class="container">
    <h3 class="text-center fw-bold">eMPALS STATISTICS</h3>
    <hr> 
        <!-- Info boxes -->
        @if(session('success'))
     <p class="alert alert-success"> {{ session('success') }} </p>
       @endif
     <div class="row">
       <p style="letter-spacing:2px" class="text-dark fw-bold  h4 text-center"> Ethiopian Missing Person Announcement and Locating System (<span class="text-primary" >eMPALS</span>) Encompasses </p>
       <hr> 
       <div class="col-sm-3 mt-5 card">
            <p class="text-center"> <span class="display-1  fw-bold text-success" > {{$user}}</span><span class="display-4  fw-bold text-danger" > +</span></p>
            <h3 class ="text-center text-info fw-bold">Registered Users</h3>
       </div> 
        <div class="col-sm-3 mt-5 card"> 
            <p class="text-center"> <span class="display-1  fw-bold text-success" > {{$police}}</span><span class="display-4  fw-bold text-danger" > +</span></p>
            <h3 class ="text-center fw-bold">Police/Volunteers</h3>       
       </div>
       <div class="col-sm-3 mt-5 card"> <a href="/police_volunteer/list-of-missing-person" style="text-decoration:none;">
            <p class="text-center"> <span class="display-1  fw-bold text-success" > {{$missing}}</span><span class="display-4  fw-bold text-danger" > +</span></p>
            <h3 class ="text-center fw-bold text-danger">Missing Reports</h3> </a>
      </div>
      <div class="col-sm-3 mt-5 card"> <a href="/police_volunteer/list-of-found-person" style="text-decoration:none;">
            <p class="text-center"> <span class="display-1  fw-bold text-success" > {{$found}}</span><span class="display-4  fw-bold text-danger" > +</span></p>
            <h3 class ="text-center fw-bold text-primary">Found Reports</h3>   </a>        
       </div>
    </div>
     

      </div><!--/. container-fluid -->



@endsection