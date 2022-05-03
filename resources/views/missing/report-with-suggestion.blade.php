@extends('layouts.app')

@section('content')

<div class="container mt-5"> 
   @if(session('success'))
     <p class="alert alert-success"> {{ session('success') }} </p>
   @endif

   <h3 class="text-center fw-bold">Report Missing Person</h3>
  
    <div class="row  row-cols-sm-1 row-cols-md-2 g-3">
                <div class=" col-md-8">
                 <div class="alert alert-warning p-2" role="alert">
                    Go ahead and finsh up your report, Unless it will not be submitted!                   
                 </div>
      <form method="POST" action="{{ route('report-with-suggestion.store') }}">
         @csrf
      <div class="row row-cols-sm-1 mt-1 ">
            <div class="col">
                <h4 class="fw-bold">Information About Last Time Missing Person Seen</h4>
            </div>
        </div>
            <div class="row row-cols-1 row-cols-sm-2 g-3">
                <div class="col">
                <label class="form-control-label fw-bold" >Missing Date</label>
                <input type="date" class="form-control" name="date">
                </div>
                <div class="col">
                <label class="form-control-label fw-bold" >Missing Address</label>
                <input type="text" class="form-control" name="city" placeholder="City from were the person missing">
                </div>
                <div class="col">
                <label class="form-control-label fw-bold" >Missing Address</label>
                <input type="text" class="form-control" name="sub_city" placeholder="Sub_city from were the person missing">
                </div>
                <div class="col">
                <label class="form-control-label fw-bold" >Skin Color </label>
                <input type="text" class="form-control" name="skin_color" placeholder="Skin Color of the person missing">
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 g-3 mt-1">
                <div class="col">
                <label class="form-control-label fw-bold" >Style and Color of Clothe</label>
                <textarea type="text" class="form-control" name="clothe" placeholder="Clothe missing person wear last time before lost..."></textarea>
                </div>
                <div class="col">
                <label class="form-control-label fw-bold" >Type and Color of Spectacle</label>
                <textarea type="text" class="form-control" name="glass" placeholder="If missing person has glass (Optional)"></textarea>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 g-3 mt-1">
                <div class="col">
                <label class="form-control-label fw-bold" >Type and Color of Shoes</label>
                <textarea type="text" class="form-control" name="shoes" placeholder="Shoes missing person wear last time before lost..."></textarea>
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
                <textarea type="text" class="form-control" name="medical_problem" placeholder="Medical problems of missing person here..."></textarea>
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