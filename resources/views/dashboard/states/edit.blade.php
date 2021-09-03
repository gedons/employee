@extends('layouts.main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create New</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
        </div>
    <div class="card-body">
       <form action="{{route('states.update', $state->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT') 
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <label class="col-md-4 col-form-label">Country Name</label>
                   <select name="country_id" class="form-control" aria-label="Default select example">

                      <option selected>Select Country</option> 
                      @foreach ($countries as $country)
                          <option value="{{$country->id}}" {{$country->id == $state->country_id ? 'selected' : ''}}>
                            {{$country->name}}
                        </option>
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
                    <input id="name" type="text" name="name" value="{{ old('name', $state->name) }}" class="form-control @error('name') is-invalid @enderror" autocomplete="name" autofocus>
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
<div class="row">
 <div class="m-2 p-2">
            <form method="post" action="{{ route('states.destroy', $state->id) }}">
             @csrf
             @method('DELETE')
             <button type="submit" class="btn btn-danger">Delete {{ $state->username }}</button>   
        </form>
</div>
</div>

<!-- End Page Content -->

@endsection
