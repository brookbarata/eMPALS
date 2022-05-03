@extends('layouts.for_auth')

@section('content')

    <body class="mt-5">
        <div>
        <div class="mx-5">

             <div class="card text-center">
                <div class="card-body">  
                <main class="px-3">
                    <h1> <span class= "d-grid fw-bold p-1 text-white border-white bg-black rounded m-1"> Ethiopian (eMPALS) </span><br> Electronic Missing Person <br> Announcement and Locating System</h1>
                    <p class="lead"> eMPALS, Inc. is a domestic non-profit corporation. We are comprised of a team of private investigators and citizens who selflessly dedicate themselves to investigating and locating missing persons, recover human trafficking victims, and advocate for missing indigenous persons.  It makes no difference the age of the loved one or how long they have been missing. We strive to offer support to the families who are going through this difficult time.
                    <a href="#" class="btn btn-sm btn-secondary  border-white bg-black">Learn more...</a>
                    </p>
                </main>
               <div class="d-grid gap-2 col-4 mx-auto">

            @if (Route::has('login'))
           
               
                    @auth
                        <a class="text-center btn btn-danger btn-lg  fw-bold border-white" href="/home">Back to User Home Page</a>
                        <a class="text-center btn btn-primary btn-lg  fw-bold border-white" href="/police_volunteer/index">Login as Police or Volunteer</a>
                   
           @else
               
                        <a class="text-center btn btn-primary btn-lg  fw-bold border-white"  href="{{ route('login') }}">Login</a>
                         @if (Route::has('register'))

                        <a class="text-center btn btn-primary btn-lg  fw-bold border-white"  href="{{ route('register') }}">Register</a>
                  
                         @endif
                         <a class="text-center btn btn-primary btn-lg  fw-bold border-white" href="{{ route('police_volunteer.login') }}" >Login as a Police Or Volunteer</a>
                    @endauth
               
            @endif
            
            </div>
           </div>
           </div>
        </div>
    </body>
    @endsection