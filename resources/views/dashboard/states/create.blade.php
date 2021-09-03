@extends('layouts.main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create New State</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
        </div>
    <div class="card-body">
       <form action="{{route('states.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <label class="col-md-4 col-form-label">Country Name</label>
                   <select name="country_id" class="form-control" aria-label="Default select example">

                      <option selected>Select Country</option> 
                      @foreach ($countries as $country)
                          <option value="{{$country->id}}">{{$country->name}}</option>
                      @endforeach

                   </select>
                    @error('country_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                  <div class="row">
                    <label for="name" class="col-md-4 col-form-label">State Name</label>
                    <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row">
                     <div class="row pt-4 pl-2">
                        <button class="btn btn-primary">Create</button>
                    </div>
                </div>
        </div>
    </form> 
    </div>
</div>

<!-- End Page Content -->

@endsection
