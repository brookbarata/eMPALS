@extends('layouts.app')

@section('content')
    
   <div class="container"> 

   <h5 class="text-center bg-dark rounded p-2 text-white">Are you Trying to "Locate Found" the <span class="fw-bold text-danger">Missing</span> Persons Below?</h5>
    <hr> 
    
                <?php
                    $colcount = count($results);
                    $i = 1;
                  ?>
                    <div>
                    <div class="row text-center">
                        @foreach($results as $item)
                        @if($i == $colcount)
                            <div class='md-4  col rounded end'>
                                  <img src="{{ asset($item->photo) }}" height="160" width="160" class="img " />
                            <br>
                            <h5 class ="fw-bold text-danger">{{$item->fname}} {{$item->mname}} {{$item->lname}}</h5>
                            <h6>{{$item->age}} yrs Old</h6>
                            <div class="btn-group">
                            <a href="{{ route('user-list-of-missing-person.show', $item)  }}"><button class="py-0 px-1 btn btn-sm btn-primary">View</button></a>
                            <a href="{{ route('user-respond-missing.show', $item)  }}"><button class="mx-1 py-0 px-1 btn btn-sm btn-outline-secondary">Respond</button></a>
                            </div>
                        @else
                            <div class='md-4 mt-1 col  rounded' >
                                  <img src="{{ asset($item->photo) }}" height="170" width="170" class="img " />
                            <br>
                            <h5 class ="fw-bold text-danger">{{$item->fname}}  {{$item->mname}} {{$item->lname}}</h4>
                            <h6>{{$item->age}} yrs Old</h6>
                            <div class="btn-group mt-0">
                            <a href=" {{ route('user-list-of-missing-person.show', $item)  }}"><button class="py-0 px-1 btn btn-sm btn-primary">View</button></a>
                            <a href="{{ route('user-respond-missing.show', $item)  }}"><button class="mx-1 py-0 px-1 btn btn-sm btn-outline-secondary">Respond</button></a>
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
                <div class="col-md-5 mx-auto mt-4 p-4">
                <a href="/user/report-with-suggestion-found"><button class="btn btn-danger btn-lg mx-5">No, Let Me Continue My Reporting...</button> </a>
                </div>
                
        
@endsection