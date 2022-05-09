@extends('layouts.police_volunteer_app')

@section('content')

<div class="container-fluid "> 

    <div class="row  row-cols-sm-1 row-cols-md-2 g-3">
        <div class=" col-md-12">
        <section style="background-color: #eee;">
            <div class="container py-3">
                <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 py-3 mb-4">
                    <ol class="breadcrumb mb-0 px-2">
                         <li class="breadcrumb-item"><a href="/police_volunteer/index">Home</a></li>
                        <li class="breadcrumb-item"><a href="/police_volunteer/list-of-found-person">List of Found Persons</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Found Person Profile</li>
                    </ol>
                    </nav>
                </div>
                </div>
                
                <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="{{ asset($profile->photo) }}" alt="{{$profile->fname}} {{$profile->mname}}"
                        class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">John Smith</h5>
                        <p class="text-muted mb-1">Full Stack Developer</p>
                        <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                        <div class="d-flex justify-content-center mb-2">
                        <button type="button" class="btn btn-primary">Follow</button>
                        <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Full Name</p>
                        </div>
                        <div class="col-sm-9">
                    <p class="text-muted mb-0">{{$profile->fname}} {{$profile->mname}}</p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Found Since</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{$profile->info_found_date->date}}</p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Phone</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">(097) 234-5678</p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Mobile</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">(098) 765-4321</p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Address</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                        </div>
                        </div>
                    </div>
                    </div>
            </div>
            </div>
            </section>
        </div>
    </div>

</div>
@endsection
