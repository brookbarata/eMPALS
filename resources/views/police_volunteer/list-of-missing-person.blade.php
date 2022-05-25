@extends('layouts.police_volunteer_app')

@section('content')

<div class="container-fluid"> 
  <div class="row mx-0 mb-1">
           <div class="d-grid col-sm-3 mx-auto">
           <nav aria-label="breadcrumb" class="bg-light">
                    <ol class="breadcrumb my-1 px-0">
                        <li class="breadcrumb-item"><a href="/police_volunteer/index">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List of Missing Persons</li>
                    </ol>
                    </nav>
            </div>
            <form class="d-grid gap-2 col-sm-3 mx-auto">
                    <div class="d-flex">
                        <input class="form-control me-2 rounded" type="text" name="search" value="{{$search}}" placeholder="Search Missing Person Here..."  aria-label="Search">
                        <button class="btn btn-outline-primary">Search</button>
                    </div>
            </form>
    </div>
    <div class="row">
        <div class="col-sm-9 mx-auto">
        
        <div class="card">
            <div style="letter-spacing:0.1em;" class="fw-bold card-header h3 p-0 alert alert-light rounded my-1 text-center ">
                    List of <span class="fw-bold text-danger">Missing</span>  Person Reports
            </div>
            <p class="text-center alert alert-warning py-0 px-1 mx-1">Please respond us if you know these missing persons, we want to meet them with their parents.</p>
       
        </div>    
        <div class="container">
        @if(count($missing) > 0)
                   <?php
                    $colcount = count($missing);
                    $i = 1;
                  ?>
                    <div>
                    <div class="row text-center">
                        @foreach($missing as $item)
                        @if($i == $colcount)
                            <div class='md-4  col end'>
                                  <img src="{{ asset($item->photo) }}" height="160" width="160" class="img " />
                            <br>
                            <h5 class ="fw-bold text-danger">{{$item->fname}} {{$item->mname}} {{$item->lname}}</h5>
                            <h6>{{$item->age}} yrs Old</h6>
                            <div class="btn-group">
                            <a href="{{ route('list-of-missing-person.show', $item)  }}"><button class="py-0 px-2 btn btn-sm btn-danger">View</button></a>
                            <a href="{{ route('respond-missing.show', $item)  }}"><button class="mx-1 py-0 px-2 btn btn-sm btn-outline-secondary">Respond</button></a>
                            </div>
                        @else
                            <div class='md-4 m-2  col'>
                                  <img src="{{ asset($item->photo) }}" height="170" width="170" class="img " />
                            <br>
                            <h5 class ="fw-bold text-danger">{{$item->fname}}  {{$item->mname}} {{$item->lname}}</h4>
                            <h6>{{$item->age}} yrs Old</h6>
                            <div class="btn-group mt-0">
                            <a href=" {{ route('list-of-missing-person.show', $item)  }}"><button class="py-0 px-2 btn btn-sm btn-danger">View</button></a>
                            <a href="{{ route('respond-missing.show', $item)  }}"><button class="mx-1 py-0 px-2 btn btn-sm btn-outline-secondary">Respond</button></a>
                            </div>
                       @endif
                            @if($i % 4 == 0)
                        </div>
                        </div>
                        <div class="row text-center">
                            @else
                            </div>
                        @endif
                            <?php $i++; ?>
                        @endforeach
                    </div>
                    </div>
                @else
                <div class="container">
                <div class="row  text-center">
                    <p>No Missing Person List To Display</p>
                </div>
                </div>              
              @endif
                <div class="card-footer py-1 my-1">
                    {{ $missing->links()}}
                </div>
                </div>
        </div>
    </div>
 </div> 
 </div>
@endsection
