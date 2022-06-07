@extends('layouts.app')

@section('content')

<div class="container-fluid"> 
  <div class="row mx-0 mb-1">
           <div class="d-grid col-sm-3 mx-auto">
           <nav aria-label="breadcrumb" class="bg-light">
                    <ol class="breadcrumb my-1 px-0">
                        <li class="breadcrumb-item"><a href="/user/filter-out">Filter-Out</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Filter-Out Results</li>
                    </ol>
                    </nav>
            </div>
    </div>
    <div class="row">
        <div class="col-sm-9 mx-auto">
    
        <div class="card">
            <div style="letter-spacing:0.1em;" class="fw-bold card-header h3 p-0 alert alert-light rounded my-1 text-center ">
                   Here Your Results of Filter-Out
            </div>
            <p class="text-center alert alert-warning py-0 px-1 mx-1">Please respond us if you know these persons, we want to meet them with their parents.</p>
       
        </div>    
        <div class="container">
        @if(count($results) > 0)
                   <?php
                    $colcount = count($results);
                    $i = 1;
                  ?>
                    <div>
                    <div class="row text-center">
                        @foreach($results as $item)
                        @if($i == $colcount)
                        <div class='md-4  col end'>
                                  <img src="{{ asset($item->photo) }}" height="160" width="160" class="img " />
                            <br>
                            <h5 class ="fw-bold text-danger">{{$item->fname}} {{$item->mname}} {{$item->lname}}</h5>
                            <h6>{{$item->age}} yrs Old</h6>
                            <div class="btn-group">
                            <a href="{{ route('user-list-of-found-person.show', $item)  }}"><button class="py-0 px-2 btn btn-sm btn-danger">View</button></a>
                            <a href="{{ route('user-respond-found.show', $item)  }}"><button class="mx-1 py-0 px-2 btn btn-sm btn-outline-secondary">Respond</button></a>
                            </div>
                        @else
                        <div class='md-4  col end'>
                                  <img src="{{ asset($item->photo) }}" height="160" width="160" class="img " />
                            <br>
                            <h5 class ="fw-bold text-danger">{{$item->fname}} {{$item->mname}} {{$item->lname}}</h5>
                            <h6>{{$item->age}} yrs Old</h6>
                            <div class="btn-group">
                            <a href="{{ route('user-list-of-found-person.show', $item)  }}"><button class="py-0 px-2 btn btn-sm btn-danger">View</button></a>
                            <a href="{{ route('user-respond-found.show', $item)  }}"><button class="mx-1 py-0 px-2 btn btn-sm btn-outline-secondary">Respond</button></a>
                            </div>
                       @endif
                            @if($i % 4 == 0)
                        </div>
                        </div>
                        <hr>
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
                    <p>No Persons to Display</p>
                </div>
                </div>              
              @endif
                <div class="card-footer py-1 my-1">
                    {{ $results->links()}}
                </div>
                </div>
        </div>
    </div>
 </div> 
 </div>
@endsection
