@extends('layouts.police_volunteer_app')

@section('content')

<div class="container-fluid"> 
   @if(session('success'))
     <p class="alert alert-success"> {{ session('success') }} </p>
   @endif
            <form class="d-grid gap-2 col-sm-6 mx-auto mb-3">
                    <div class="d-flex">
                        <input class="form-control me-2 rounded" type="search" placeholder="Who you are looking for?"  aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </div>
            </form>
    <div class="row">
        <div class="col-sm-8">
       
  <section  class=" d-flex align-items-center bg-white py-4 mb-2">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">

    <img src="{{ asset('images/logo-mpals.png')}}" height="325" width="325"   alt="" class="img-fluid img img-responsive m-4">

          <h2>Welcome to <span class="text-primary fw-bold" >eMPALS</span></h2>
      <p>Ethiopian Electronic Missing Person Announcement and Locating System.</p>
      <div class="d-flex gap-4 col-sm-8">
      <a class="text-center btn btn-primary btn-lg btn-md-4 mx-3  fw-bold border-white" href="/police_volunteer/list-of-missing-person"> Missing Person List >>></a>
      <a class="text-center btn btn-primary btn-lg btn-md-4 mx-auto  fw-bold border-white " href="/police_volunteer/list-of-found-person"> Found Person List >>></a>
      </div>
    </div>
  </section>
  </div>
  <div class="col-sm-4">
  <main class="px-3 card card-body ">
  <h1> <span class= "d-grid fw-bold p-1 text-center text-gray border-white  rounded m-1"> Ethiopian eMPALS </span></h1>
                    <p class="lead text-center"> eMPALS, Inc. is a domestic non-profit corporation. We are comprised of a team of private investigators and citizens who selflessly dedicate themselves to investigating and locating missing persons, recover human trafficking victims, and advocate for missing indigenous persons.  It makes no difference the age of the loved one or how long they have been missing. We strive to offer support to the families who are going through this difficult time.
                    <a href="#" class="btn btn-sm btn-secondary  border-white bg-black">Learn more...</a>
                    </p>
                </main>
  </div>
 </div>
@endsection
