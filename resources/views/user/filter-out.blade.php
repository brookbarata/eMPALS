@extends('layouts.app')

@section('content')
    
   <div class="container mt"> 

   <h3 class="text-center fw-bold">Filter-<span class="text-danger fw-bold">Out</span> </h3>
    <hr>
    <div class="alert alert-info p-2" role="alert">
     Choose first from "Filter-by" selection you want to be search and fill the attribute respectively with the Filter-by Option and hit <span class="fw-bold">Filter-<span class="text-danger">Out</span></span> button.
    </div>
      <form action="{{ route('user-filter-out.store') }}" method="POST">
      @csrf
      <div class="row form-row align-items-center">
            <div class="col-md-4">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text fw-bold text-danger">Filter By</div>
                        </div>
                <select class="form-select" name="filter_by" >
                    <option  value="all" selected>All</option>
                    <option value="age">Age</option>
                    <option value="fullname">Full Name</option>
                    <option value="lastname">Only Last Name</option>
                    <option value="cityorsubcity">City or Sub-city</option>
                    <option value="special_markings">Special Markings</option>
                    <option value="date">Report Date</option>
                </select>  
            </div>
                </div>
          </div>
            <div class="row form-row align-items-center">
                <div class="col-md-4">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">First Name</div>
                        </div>
                        <input type="text" name="fname" class="form-control" id="inlineFormInputGroup" placeholder="Filter by First Name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Middle Name</div>
                        </div>
                        <input type="text" name="mname" class="form-control" id="inlineFormInputGroup" placeholder="Filter by Middle Name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Last Name</div>
                        </div>
                        <input type="text" name="lname" class="form-control" id="inlineFormInputGroup" placeholder="Filter by Last Name">
                    </div>
                </div>
            </div>
            <div class="row form-row align-items-center">
                <div class="col-md-4">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Age</div>
                        </div>
                        <input type="number" name="age" class="form-control" id="inlineFormInputGroup" placeholder="Filter by Age">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Special Markings</div>
                        </div>
                        <input type="text" name="special_desc"  class="form-control" id="inlineFormInputGroup" placeholder="Filter by Special Descriptions">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Missing/Found Date</div>
                        </div>
                        <input type="date" name="date" class="form-control" id="inlineFormInputGroup">
                    </div>
                </div>
                </div>
                <div class="row form-row align-items-center">
                <div class="col-md-4">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">City</div>
                        </div>
                        <input type="text" class="form-control" name="city" id="inlineFormInputGroup" placeholder="Filter by City">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Sub City</div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" name="sub_city" placeholder="Filter by Sub City">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"  name="is_it" id="gridRadios1" value="missing" checked>
                            <label class="form-check-label fw-bold" for="gridRadios1">Filter in Missing </label>
                    </div>
                    <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="is_it" id="gridRadios2" value="found">
                            <label class="form-check-label fw-bold" for="gridRadios2">Filter in Found </label>
                    </div>
                 </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-2 mt-4">
                </div>
                <div class="col-md-2 mt-4">
                    <div class="mb-2">
                        <button type="submit" class="form-control btn btn-dark fw-bold">Filter-<span class="text-danger">Out</span></button>
                    </div>
                    </div>
                </div>
            </div>
      </form>

@endsection