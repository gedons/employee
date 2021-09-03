@extends('layouts.main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create New User</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
        </div>
    <div class="card-body">
       <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <label for="username" class="col-md-4 col-form-label">Username</label>
                    <input id="username" type="text" name="username" class="form-control @error('username') is-invalid @enderror" autocomplete="username" autofocus>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                  <div class="row">
                    <label for="first_name" class="col-md-4 col-form-label">FirstName</label>
                    <input id="first_name" type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" autocomplete="first_name" autofocus>
                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                 <div class="row">
                    <label for="last_name" class="col-md-4 col-form-label">LastName</label>
                    <input id="last_name" type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" autocomplete="last_name" autofocus>
                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                  <div class="row">
                    <label for="email" class="col-md-4 col-form-label">Email</label>
                    <input id="email" type="text" name="email" class="form-control @error('email') is-invalid @enderror" autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                  <div class="row">
                    <label for="password" class="col-md-4 col-form-label">Password</label>
                    <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" autocomplete="password" autofocus>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row pt-4">
                    <button class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </form> 
    </div>
</div>

<!-- End Page Content -->

@endsection
