@extends('layouts.police_volunteer_app')

@section('content')
    
   <div class="container mt-5"> 

   <h3 class="text-center fw-bold">Help</h3>
    <hr>
    <hr>

@endsection











@if(count($results) > 0)
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
                            <h5 class ="fw-bold text-danger">{{$item->fname}} {{$item->mname}}</h5>
                            <h6>{{$item->fname}} {{$item->mname}}</h6>
                            <div class="btn-group">
                            <a href="{{ route('list-of-missing-person.show', $item)  }}"><button class="py-0 px-1 btn btn-sm btn-outline-secondary">View</button></a>
                            <a href="#"><button class="py-0 px-1 btn btn-sm btn-outline-secondary">Respond</button></a>
                            </div>
                        @else
                            <div class='md-4  col  rounded' >
                                  <img src="{{ asset($item->photo) }}" height="170" width="170" class="img " />
                            <br>
                            <h5 class ="fw-bold text-danger">{{$item->fname}}  {{$item->mname}}</h4>
                            <h6>{{$item->fname}}  {{$item->mname}}</h6>
                            <div class="btn-group mt-0">
                            <a href=" {{ route('list-of-missing-person.show', $item)  }}"><button class="py-0 px-1 btn btn-sm btn-outline-secondary">View</button></a>
                            <a href="#"><button class="py-0 px-1 btn btn-sm btn-outline-secondary">Respond</button></a>
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
                    <p>No Persons to Display</p>
                </div>
                </div>              
              @endif
                <div class="card-footer py-1 my-1">
                    {{ $results->links()}}
                </div>
                </div>
                      </div>