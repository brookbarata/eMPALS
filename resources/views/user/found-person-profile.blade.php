@extends('layouts.app')

@section('content')

<div class="container-fluid "> 

    <div class="row  row-cols-sm-1 row-cols-md-2 g-3">
        <div class=" col-md-12">
        <section style="background-color: #eee;">
            <div class="container py-3">
                <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 py-3 mb-2">
                    <ol class="breadcrumb mb-0 px-2">
                        <li class="breadcrumb-item"><a href="/user/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="/user/list-of-found-person">List of Found Persons</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Found Person Profile</li>
                    </ol>
                    </nav>
                </div>
                </div>
                

                <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-2">
                    <div class="card-body text-center">
                        <img src="{{ asset($profile->photo) }}" alt="{{$profile->fname}} {{$profile->mname}}"
                        class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-2 fw-bold text-danger">{{$profile->fname}} {{$profile->mname}} {{$profile->lname}}</h5>
                        <p class="text-muted mb-1"><span class="fw-bold">Found Since:</span> {{date('M D Y', strtotime($profile->info_found_date->date))}}</p>
                        <p class="text-muted mb-4"><span class="fw-bold">I Find him/her:</span> {{$profile->info_found_date->city}} , {{$profile->info_found_date->sub_city}}</p>
                        <div class="d-flex justify-content-center mb-2">
                        <a href="{{ route('user-respond-found.show', $profile->id)  }}"> <button type="button" class="btn btn-primary">Respond</button></a>
                        <a href="{{ $profile->photo }}"> <button type="button" class="btn btn-outline-primary ms-1">See Photo </button></a>
                        </div>
                        <div class="p-1">
                                <!-- Facebook -->
                               <a href="" class="px-1"> <i class="fab fa-facebook-f"></i></a>
                                <!-- Telegram -->
                                <a href="" class="px-1"> <i class="fab fa-telegram"></i></a>
                                <!-- Twitter -->
                                <a href="" class="px-1"><i class="fab fa-twitter"></i></a>
                                <!-- Instagram -->
                                <a href="" class="px-1"><i class="fab fa-instagram"></i></a>
                                <!-- Mail -->
                                <a href="mailto:brook.barata@gmail.com?subject=Missing%Person&amp;body=Hello%20eMPALS"class="px-1"> <i class="fas fa-envelope"></i></a>
                                <!-- Whatsapp -->
                                <a href="" class="px-1"><i class="fab fa-whatsapp"></i></a>
                     </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Full Name</p>
                        </div>
                        <div class="col-sm-9">
                        <p class="text-muted mb-0">{{$profile->fname}} {{$profile->mname}} {{$profile->lname}} </p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Age when found</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{$profile->age}}</p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Gender</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{$profile->gender}}</p>
                        </div>
                        </div>
                        <hr>
                        <div class="row ">
                        <div class="col-sm-3">
                            <p class="mb-0">Brith Place</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{$profile->brith_place}}</p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Height</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{$profile->height}}</p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Weight</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{$profile->weight}}</p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Address</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{$profile->region}}, {{$profile->city}}, {{$profile->sub_city}}</p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Special Description</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{$profile->special_description}}</p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Circumstaces</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{$profile->fname}} was found at the {{$profile->info_found_date->city}} in {{$profile->info_found_date->sub_city}},
                                  on {{date('M D Y', strtotime($profile->info_found_date->date))}}. I found {{$profile->fname}} who is missing and is not contact with family since this time. 
                                 Anyone who knows {{$profile->fname}} is urged to contact us through social links or by responding us. </p>
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
