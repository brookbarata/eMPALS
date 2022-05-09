@extends('layouts.police_volunteer_app')

@section('content')

<div class="container"> 
  
   <h3 class="text-center fw-bold">Locate Found Person</h3>
  
    <div class="row  row-cols-sm-1 row-cols-md-2 g-3">
 <div class=" col-md-8">
                 @if(session('success'))
                    <p class="alert alert-success "> {{ session('success') }} </p>
                @endif

    <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/police_volunteer/report-found">Locate found person</a></li>
              <li class="breadcrumb-item active">Information when found</li>
            </ol>
          </div><!-- /.col -->
       </div>


      <form method="POST" action="{{ route('info_police_found_date.store') }}">
         @csrf
      <div class="row row-cols-sm-1 mt-1 ">
            <div class="col">
                <h4 class="fw-bold">Information About Last Time Found Person Seen</h4>
            </div>
        </div>
            <div class="row row-cols-1 row-cols-sm-2 g-3">
                <div class="col">
                <label class="form-control-label fw-bold" >Found Date</label>
                <input type="date" class="form-control" required name="date">
                </div>
                <div class="col">
                <label class="form-control-label fw-bold" >Found Address</label>
                <input type="text" class="form-control" required name="city" placeholder="City from were the person found">
                </div>
                <div class="col">
                <label class="form-control-label fw-bold" >Found Address</label>
                <input type="text" class="form-control" required name="sub_city" placeholder="Sub_city from were the person found">
                </div>
                <div class="col">
                <label class="form-control-label fw-bold" >Skin Color </label>
                <input type="text" class="form-control" required name="skin_color" placeholder="Skin Color of the person found">
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 g-3 mt-1">
                <div class="col">
                <label class="form-control-label fw-bold" >Style and Color of Clothe</label>
                <textarea type="text" class="form-control" required name="clothe" placeholder="Clothe found person wear last time before lost..."></textarea>
                </div>
                <div class="col">
                <label class="form-control-label fw-bold" >Type and Color of Spectacle</label>
                <textarea type="text" class="form-control" name="glass" placeholder="If found person has glass (Optional)"></textarea>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 g-3 mt-1">
                <div class="col">
                <label class="form-control-label fw-bold" >Type and Color of Shoes</label>
                <textarea type="text" class="form-control" required name="shoes" placeholder="Shoes found person wear last time before lost..."></textarea>
                </div>
                <div class="col">
                <label class="form-control-label fw-bold" >Health Condition</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="health_condition" id="ckNo" value="normal" onclick="ShowHideDiv()">
                    <label class="form-check-label " for="gridRadios1">Is Normal</label>
             </div>
              <div class="form-check">
                     <input class="form-check-input" type="radio" name="health_condition" id="chkYes" value="medical_problem" onclick="ShowHideDiv()">
                     <label class="form-check-label " for="gridRadios2">Has Medical Problem</label>
               </div>                
            </div>
            </div>
             <div class="row row-cols-1 row-cols-sm-2 g-3 mt-1">
                <div class="col"id="dvMedicalProblem" style="display: none">
                <label class="form-control-label fw-bold" >Medical Problem(s)</label>
                <textarea type="text" class="form-control" name="medical_problem" placeholder="Medical problems of found person here..."></textarea>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-1 mt-1 ">
            <div class="col">
            <button type="submit" class="btn btn-dark px-2 py-1">Submit</button>
        </div>
        </div>
     </form>
</div>


   <div class ="col-md-4">
                        <h5 class="text-center bg-dark rounded p-2 text-white">Your Suggestions Here...</h5>
                        <div  class=" bg-light rounded card-body">
                              Oh, Noops! You don't have any Suggestions.
                      </div>
                </div>
            </div>
</div>

        <script type="text/javascript">
            function ShowHideDiv() {
                var chkYes = document.getElementById("chkYes");
                var dvMedicalProblem = document.getElementById("dvMedicalProblem");
                dvMedicalProblem.style.display = chkYes.checked ? "block" : "none";
            }
        </script>

@endsection