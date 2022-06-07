@extends('layouts.app')

@section('content')

<div class="container"> 
  <div class="row  mb-1">
           <div class="d-grid col-sm-3 mx-2">
           <nav aria-label="breadcrumb" class="bg-light">
                    <ol class="breadcrumb my-1 px-0">
                        <li class="breadcrumb-item"><a href="/user/home">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Respond to {{$profile->fname}}</li>
                    </ol>
                    </nav>
            </div>  
 </div> 


 <div class="container mt-1">


 <div class="row  row-cols-sm-1 row-cols-md-2 g-3">
                <div class=" col-md-8">
                @if(session('danger'))
                    <p class="alert alert-danger "> {{ session('danger') }} </p>
                @endif
</div>
</div>


 <form method="POST" action="{{ route('user-respond-missing.store') }}" enctype="multipart/form-data" class="form-card">   
     @csrf
      <div class="row row-cols-sm-1 mt-1 ">
            <div class="col">
                <h4 class="fw-bold">Respond us, if you have any Information about <span class="text-danger">{{$profile->fname}}</span>.</h4>
            </div>
        </div>
            <div class="row row-cols-1 row-cols-sm-2 g-3">
                <div class="col">
                <label class="form-control-label fw-bold" >What is your Relation with <span class="text-danger">{{$profile->fname}}</span>?</label>
                <input type="relation" class="form-control" required name="relation" placeholder="Your Relation i.e Aunty, Father... ">
                </div>
                <div class="col">
                <label class="form-control-label fw-bold" >Where did you know <span class="text-danger">{{$profile->fname}}</span>?</label>
                <input type="text" class="form-control" required name="address" placeholder="Address">
                </div>
                <div class="col">
                <label class="form-control-label fw-bold " >Cricumstances about <span class="text-danger">{{$profile->fname}}</span>?</label>
                <textarea style="height:300px;" type="text" class="form-control" required name="circumstances" placeholder="Messages Here..."></textarea>
                </div>
                <div class="col">
                <input type="hidden"  name="police_id" hidden value="{{$profile->police_id}}">
                <input type="hidden"  name="missing_id" hidden value="{{$profile->id}}">   
            </div>
                </div><div class="row row-cols-1 row-cols-sm-1 mt-1 ">
                    <div class="col">
                <button type="submit" class="btn btn-dark px-2 py-1">Respond</button>
            </div>
     </form>

</div>
</div>

@endsection