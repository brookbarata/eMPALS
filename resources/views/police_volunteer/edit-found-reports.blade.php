@extends('layouts.police_volunteer_app')

@section('content')
    
<div class="container">  
<h3 class="text-center fw-bold">Edit Found Person</h3>

    <div class="row  row-cols-sm-1 row-cols-md-2 g-3">
                <div class=" col-md-8">
                @if(session('danger'))
                    <p class="alert alert-danger "> {{ session('danger') }} </p>
                @endif   
                <div class="alert alert-warning p-2" role="alert">
                   Please edit with some valid inputs, Thank you!
                    </div>
      <form method="POST" action="{{ route('list-of-found-person.update', $found_report) }}" enctype="multipart/form-data">
         @csrf
         @method('PUT')
        <div class="row row-cols-sm-1 mt-1 ">
            <div class="col">
                <h4 class="fw-bold">Edit Basic Information About Found Person</h4>
            </div>
        </div>
            <div class="row row-cols-1 row-cols-sm-2 g-3">
                <div class="col">
                <input type="text" class="form-control" name="fname" required placeholder="First name" value="{{ ( $found_report->fname) }}">
                </div>
                <div class="col">
                <input type="text" class="form-control" name="mname" required placeholder="Middle name" value="{{ ( $found_report->mname) }}">
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2  g-3 mt-1">
                <div class="col">
                <input type="text" class="form-control" name="lname" required placeholder="Last name" value="{{ ( $found_report->lname) }}">
                </div>
             <div class="col mt-4">
               <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"  name="gender" id="gridRadios1" value="male">
                    <label class="form-check-label fw-bold" for="gridRadios1">Male</label>
             </div>
              <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="female">
                     <label class="form-check-label fw-bold" for="gridRadios2">Female</label>
               </div>
              <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gridRadios3" value="other">
                    <label class="form-check-label fw-bold" for="gridRadios3">Other</label>
               </div>
             </div>
         </div>
         <div class="row row-cols-1 row-cols-sm-2  mt-1 g-3">
                <div class="col">
                <input type="number" class="form-control" name="age" required placeholder="Age" min=0 max=300  value="{{ ( $found_report->age) }}">
                </div>
                <div class="col">
                <input type="text" class="form-control" name="brith_place" placeholder="Brith Place (City)"  value="{{ ( $found_report->brith_place) }}">
                </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2  mt-1 g-3">
            <div class="col">
                <input type="text" class="form-control" name="nick_name" placeholder="Nick Name"  value="{{ ( $found_report->nick_name) }}" >
                </div>
            <div class="col">
                <input type="number" step="any" class="form-control" required name="height" placeholder="Height (m)" min=0 max=3  value="{{ ( $found_report->height) }}">
              </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2  mt-1 g-3">
            <div class="col"> 
                <input type="number"  step="any"  class="form-control" required name="weight" placeholder="Weight (Kg)" min=0 max=300  value="{{ ( $found_report->weight) }}">
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
                <input type="text" class="form-control" required name="city" placeholder="City"  value="{{ ( $found_report->city) }}">
                </div>
            <div class="col">
                <input type="text" class="form-control" required name="sub_city" placeholder="Sub City"  value="{{ ( $found_report->sub_city) }}">
              </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2  mt-1 g-3">
            <div class="col">
                <input type="text" class="form-control" required name="street_name" placeholder="Street"  value="{{ ( $found_report->street_name) }}">
                </div>
            <div class="col">
                <input type="number" class="form-control" required name="house_no" placeholder="House Number"  value="{{ ( $found_report->house_no) }}">
              </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2  mt-1 g-3">
            <div class="col">
                <textarea type="text" class="form-control" required name="special_description" placeholder="Special Markings -such as tattoos, birthmarks, scars, etc."  value="{{ ( $found_report->special_description) }}"></textarea>
                </div>
            <div class="col">
                <input type="file" class="form-control" accept=".jpg,.png,.gif,.webp" name="photo"  value="{{ ( $found_report->photo) }}">
                <label class="alert alert-warning p-0 px-4" for="file">!!! Upload here the most recent picture of found person.</label>  
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-1 mt-1 ">
            <div class="col">
            <button type="submit" class="btn btn-dark">Save</button>
        </div>
        </div>
    </form>
        </div> 
        <div class="col-md-1">
        </div>
                <div class ="col-md-3">
                        <h5 class="text-center bg-dark rounded p-1 text-white">How eMPALS works to find found person?</h5>
                     <div  class=" card bg-light rounded card-body" style="text-align:justify;">
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