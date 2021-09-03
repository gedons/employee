@extends('layouts.main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Department</h1>
    </div>

<div class="card shadow mb-4">
    <div class="card-body">
       <form action="{{route('departments.update', $department->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-8 offset-2">
                  <div class="row">
                    <label for="name" class="col-md-4 col-form-label">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $department->name) }}" class="form-control @error('name') is-invalid @enderror" autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row pt-4">
                    <button class="btn btn-primary">Update</button>            
                </div>
            </div>
        </div>
    </form> 
    </div>
</div>
<div class="row">
 <div class="m-2 p-2">
            <form method="post" action="{{ route('departments.destroy', $department->id) }}">
             @csrf
             @method('DELETE')
             <button type="submit" class="btn btn-danger">Delete {{ $department->name }}</button>   
        </form>
</div>
</div>

<!-- End Page Content -->

@endsection
