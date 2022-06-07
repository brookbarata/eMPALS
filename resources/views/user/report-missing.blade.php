@extends('layouts.app')

@section('content')
    
<div class="container">  
<h3 class="text-center fw-bold">Report Missing Person</h3>

    <div class="row  row-cols-sm-1 row-cols-md-2 g-3">
                <div class=" col-md-8">
                @if(session('danger'))
                    <p class="alert alert-danger "> {{ session('danger') }} </p>
                @endif
                    <div class="alert alert-warning p-2" role="alert">
                    Please insert some valid inputs, Unless your report will be declined by the Admin. Thank you!
                    </div>
      <form method="POST" action="{{ route('user-missing-report.store') }}" enctype="multipart/form-data">
         @csrf
        <div class="row row-cols-sm-1 mt-1 ">
            <div class="col">
                <h4 class="fw-bold">Basic Information About Missing Person</h4>
            </div>
        </div>
            <div class="row row-cols-1 row-cols-sm-2 g-3">
                <div class="col">
                <input type="text" class="form-control" name="fname" required placeholder="First name">
                </div>
                <div class="col">
                <input type="text" class="form-control" name="mname" required placeholder="Middle name">
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2  g-3 mt-1">
                <div class="col">
                <input type="text" class="form-control" name="lname" required placeholder="Last name">
                </div>
             <div class="col mt-4">
               <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"  name="gender" id="gridRadios1" value="Male">
                    <label class="form-check-label fw-bold" for="gridRadios1">Male</label>
             </div>
              <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Female">
                     <label class="form-check-label fw-bold" for="gridRadios2">Female</label>
               </div>
              <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gridRadios3" value="Other">
                    <label class="form-check-label fw-bold" for="gridRadios3">Other</label>
               </div>
             </div>
         </div>
         <div class="row row-cols-1 row-cols-sm-2  mt-1 g-3">
                <div class="col">
                <input type="number" class="form-control" name="age" required placeholder="Age" min=0 max=300>
                </div>
                <div class="col">
                <input type="text" class="form-control" name="brith_place" placeholder="Brith Place (City)">
                </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2  mt-1 g-3">
            <div class="col">
                <input type="text" class="form-control" name="nick_name" placeholder="Nick Name" >
                </div>
            <div class="col">
                <input type="number" step="any" class="form-control" required name="height" placeholder="Height (m)" min=0 max=3>
              </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2  mt-1 g-3">
            <div class="col"> 
                <input type="number"  step="any"  class="form-control" required name="weight" placeholder="Weight (Kg)" min=0 max=300>
                </div>
            <div class="col">
            <select class="form-select" name="region" >
                    <option  disabled = "disabled" selected>Select Region</option>
                    <option value="South West">South West Peoples Regional State</option>
                    <option value="SNNPR">South Nation Nationalities Peoples Regional State</option>
                    <option value="Sidama">Sidama Regional State</option>
                    <option value="Tigray">Tigray Regional State</option>
                    <option value="Oromia">Oromia Regional State</option>
                    <option value="Afar">Afar Regional State</option>
                    <option value="Benishangul">Benishangul-Gumuz Regional State</option>
                    <option value="Amhara">Amhara Regional State</option>
                    <option value="Somali">Somali Regional State</option>
                    <option value="Gambela">Gambela Regional State</option>
                    <option value="Harari">Harari Regional State</option>
                    <option value="Addis Abeba">Addis Ababa City Adminstration</option>
                    <option value="Dire Dawa">Dire Dawa City Adminstration</option>
                </select>           
             </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2  mt-1 g-3">
            <div class="col">
                <input type="text" class="form-control" required name="city" placeholder="City" >
                </div>
            <div class="col">
                <input type="text" class="form-control" required name="sub_city" placeholder="Sub City">
              </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2  mt-1 g-3">
            <div class="col">
                <input type="text" class="form-control" required name="street_name" placeholder="Street" >
                </div>
            <div class="col">
                <input type="number" class="form-control" required name="house_no" placeholder="House Number">
              </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2  mt-1 g-3">
            <div class="col">
                <textarea type="text" class="form-control" required name="special_description" placeholder="Special Markings -such as tattoos, birthmarks, scars, etc." ></textarea>
                </div>
            <div class="col"> 
                <input type="file" class="form-control" accept=".jpg,.png,.gif,.webp" name="photo"id="photo" >
                <label class="alert alert-warning p-0 px-4" for="file">!!! Upload here the most recent picture of missing person.</label>  
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-1 mt-1 ">
            <div class="col">
            <button type="submit" value="Save" class="btn btn-dark">Save and Goto Next Page</button>
        </div>
        </div>
    </form>
        </div> 
        <div class="col-md-1">

        </div>
                <div class ="col-md-3">
                        <h5 class="text-center bg-dark rounded p-1 text-white">How eMPALS works to find missing person?</h5>
                        <div class="card bg-light rounded card-body" style="text-align:justify;">
                                Electronic Missing Person Announcement and Locating System (eMPALS) contains 
                                functionality to add complaints as well as view all complaints. By using these complaints, Users
                                will try to find a lost person in various areas. This System will upload complaints on the 
                                webserver to be accessed by any of the users accessing this system. In this project, eMPALS 
                                uses a filtering algorithm that presents the solution for this problem. Admin 
                                continuously updates the database and deletes unnecessary data from the reports.    
                    </div>
                </div>
            </div>
</div>
@endsection
