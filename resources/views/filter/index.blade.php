@extends('layouts.app')

@section('content')
    
   <div class="container mt-5"> 

   <h3 class="text-center fw-bold">Filter-Out for a Missing Person</h3>
    <hr>
    <div class="alert alert-danger p-2" role="alert">
       Fill in the attribute you want to be searched by and hit <span class="fw-bold">Filter-Out</span> button.
    </div>
      <form>
            <div class="row form-row align-items-center">
                <div class="col-md-4">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">First Name</div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Filter by First Name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Last Name</div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Filter by Last Name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Address</div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Filter by Address">
                    </div>
                </div>
            </div>
            <div class="row form-row align-items-center">
                <div class="col-md-4">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Age</div>
                        </div>
                        <input type="number" class="form-control" id="inlineFormInputGroup" placeholder="Filter by Age">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Special Markings</div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Filter by Special Descriptions">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Missing Date</div>
                        </div>
                        <input type="date" class="form-control" id="inlineFormInputGroup">
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
                        <button type="submit" class="form-control btn btn-dark fw-bold">Filter-Out</button>
                    </div>
                </div>
            </div>
      </form>

@endsection