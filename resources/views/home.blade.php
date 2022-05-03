@extends('layouts.app')

@section('content')

<div class="container-fluid mt-5"> 

        @if(session('success'))
            <p class="alert alert-success"> {{ session('success') }} </p>
        @endif
            <form class="d-grid gap-2 col-sm-6 mx-auto mb-3">
                    <div class="d-flex">
                        <input class="form-control me-2 rounded" type="search" placeholder="Who you are looking for?"  aria-label="Search">
                        <button class="btn btn-outline-dark" type="submit">Search</button>
                    </div>
            </form>
    <div class="row ">
        <div class="col-sm-6">
            <div class="card">
                <div style="letter-spacing:0.1em;" class="fw-bold card-header alert alert-light p-0 rounded my-1 text-center h3">List of Missing Persons</div>
                <p class="text-center alert alert-warning py-0 px-1 mx-1">Have you seen someone? Please respond us if you have seen the following missing persons.</p>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div> 
                    @endif
                    <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
            <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></svg>

            <div class="card-body p-0 ">
                <div class="card-header bg-light"> 
                    <p class="text-center" style="color:red"> <span class="fw-bold">Abebe Kebede</span> 
                 <br> 12yrs Old
                  <br>  Sidama, Hawassa</p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="py-0 px-1 btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="py-0 px-1 btn btn-sm btn-outline-secondary">Respond</button>
                </div>
                <small class="text-muted ">9 mins</small>
                </div>
            </div>
            </div>
        </div><div class="col">
            <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></svg>

            <div class="card-body p-0">
                <div class="card-header bg-light"> 
                    <p class="text-center" style="color:red"> <span class="fw-bold">Abebe Kebede</span> 
                 <br> 12yrs Old
                  <br>  Sidama, Hawassa</p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="py-0 px-1 btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="py-0 px-1 btn btn-sm btn-outline-secondary">Respond</button>
                </div>
                <small class="text-muted">9 mins</small>
                </div>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></svg>

            <div class="card-body p-0">
                <div class="card-header bg-light"> 
                    <p class="text-center" style="color:red"> <span class="fw-bold">Abebe Kebede</span> 
                 <br> 12yrs Old
                  <br>  Sidama, Hawassa</p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="py-0 px-1 btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="py-0 px-1 btn btn-sm btn-outline-secondary">Respond</button>
                </div>
                <small class="text-muted">9 mins</small>
                </div>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></svg>

            <div class="card-body p-0">
                <div class="card-header bg-light"> 
                    <p class="text-center" style="color:red"> <span class="fw-bold">Abebe Kebede</span> 
                 <br> 12yrs Old
                  <br>  Sidama, Hawassa</p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="py-0 px-1 btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="py-0 px-1 btn btn-sm btn-outline-secondary">Respond</button>
                </div>
                <small class="text-muted">9 mins</small>
                </div>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></svg>

            <div class="card-body p-0">
                <div class="card-header bg-light"> 
                    <p class="text-center" style="color:red"> <span class="fw-bold">Abebe Kebede</span> 
                 <br> 12yrs Old
                  <br>  Sidama, Hawassa</p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="py-0 px-1 btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="py-0 px-1 btn btn-sm btn-outline-secondary">Respond</button>
                </div>
                <small class="text-muted">9 mins</small>
                </div>
            </div>
            </div>
        </div>
    </div> 
</div>

</div>
      </div>
        </div>
 <div class="col-sm-6">
            <div class="card">
            <div style="letter-spacing:0.1em;" class="fw-bold card-header h3 p-0 alert alert-light rounded my-1 text-center ">
                    List of Found Person Reports
            </div>
            <p class="text-center alert alert-warning py-0 px-1 mx-1">Please respond us if you know these found persons, we want to meet them with their parents.</p>
 <div class="card-body">
 <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
            <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></svg>

            <div class="card-body p-0">
                <div class="card-header bg-light"> 
                    <p class="text-center text-primary" > <span class="fw-bold">Abebe Kebede</span> 
                 <br> 12yrs Old
                  <br>  Sidama, Hawassa</p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="py-0 px-1 btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="py-0 px-1 btn btn-sm btn-outline-secondary">Respond</button>
                </div>
                <small class="text-muted">9 mins</small>
                </div>
            </div>
            </div>
        </div><div class="col">
            <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></svg>

            <div class="card-body p-0">
                <div class="card-header bg-light"> 
                    <p class="text-center text-primary"> <span class="fw-bold">Abebe Kebede</span> 
                 <br> 12yrs Old
                  <br>  Sidama, Hawassa</p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="py-0 px-1 btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="py-0 px-1 btn btn-sm btn-outline-secondary">Respond</button>
                </div>
                <small class="text-muted">9 mins</small>
                </div>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></svg>

            <div class="card-body p-0">
                <div class="card-header bg-light"> 
                    <p class="text-center text-primary"> <span class="fw-bold">Abebe Kebede</span> 
                 <br> 12yrs Old
                  <br>  Sidama, Hawassa</p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="py-0 px-1 btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="py-0 px-1 btn btn-sm btn-outline-secondary">Respond</button>
                </div>
                <small class="text-muted">9 mins</small>
                </div>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></svg>

            <div class="card-body p-0">
                <div class="card-header bg-light"> 
                    <p class="text-center text-primary" > <span class="fw-bold">Abebe Kebede</span> 
                 <br> 12yrs Old
                  <br>  Sidama, Hawassa</p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="py-0 px-1 btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="py-0 px-1 btn btn-sm btn-outline-secondary">Respond</button>
                </div>
                <small class="text-muted">9 mins</small>
                </div>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></svg>

            <div class="card-body p-0">
                <div class="card-header bg-light"> 
                    <p class="text-center text-primary" > <span class="fw-bold">Abebe Kebede</span> 
                 <br> 12yrs Old
                  <br>  Sidama, Hawassa</p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="py-0 px-1 btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="py-0 px-1 btn btn-sm btn-outline-secondary">Respond</button>
                </div>
                <small class="text-muted">9 mins</small>
                </div>
            </div>
            </div>
                </div>
            </div> 
        </div>
        </div>                
    </div>
    </div>
</div>
</div>
@endsection
