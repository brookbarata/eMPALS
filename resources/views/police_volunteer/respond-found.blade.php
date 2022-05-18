@extends('layouts.police_volunteer_app')

@section('content')

<div class="container"> 
  <div class="row  mb-1">
           <div class="d-grid col-sm-3 mx-2">
           <nav aria-label="breadcrumb" class="bg-light">
                    <ol class="breadcrumb my-1 px-0">
                        <li class="breadcrumb-item"><a href="/police_volunteer/index">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Respond to {{$profile->fname}}</li>
                    </ol>
                    </nav>
            </div>  
 </div> 


 <div class="container mt-1">
<form class="form-card">   
     @csrf
      <div class="row row-cols-sm-1 mt-1 ">
            <div class="col">
                <h4 class="fw-bold">Respond us, if you have any Information about <span class="text-danger">{{$profile->fname}}</span></h4>
            </div>
        </div>
            <div class="row row-cols-1 row-cols-sm-2 g-3">
                <div class="col">
                <label class="form-control-label fw-bold" >Date ( when did you find <span class="text-danger">{{$profile->fname}}?</span> )</label>
                <input type="date" class="form-control" required name="date">
                </div>
                <div class="col">
                <label class="form-control-label fw-bold" >Address ( where did you find <span class="text-danger">{{$profile->fname}}?</span> )</label>
                <input type="text" class="form-control" required name="city" placeholder="City from were the person found">
                </div>
                <div class="col">
                <label class="form-control-label fw-bold" >Address 2 (optional) </label>
                <input type="text" class="form-control" required name="sub_city" placeholder="Sub city from were the person found">
                </div>
                <div class="col">
                <label class="form-control-label fw-bold" >Cricumstanses ( how you find <span class="text-danger">{{$profile->fname}}?</span> )</label>
                <textarea type="text" class="form-control" required name="circumstances" placeholder="Circumstances..."></textarea>
                </div>
                </div><div class="row row-cols-1 row-cols-sm-1 mt-1 ">
                    <div class="col">
                <button type="submit" class="btn btn-dark px-2 py-1">Respond</button>
            </div>
     </form>

</div>
</div>

@endsection