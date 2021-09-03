@extends('layouts.main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit</h1>
    </div>

<div class="card shadow mb-4">
    <div class="card-body">
       <form action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <label for="username" class="col-md-4 col-form-label">Username</label>
                    <input id="username" type="text" name="username" value="{{ old('username', $user->username) }}" class="form-control @error('username') is-invalid @enderror"  autocomplete="username" autofocus>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                  <div class="row">
                    <label for="first_name" class="col-md-4 col-form-label">FirstName</label>
                    <input id="first_name" type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" class="form-control @error('first_name') is-invalid @enderror" autocomplete="first_name" autofocus>
                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                 <div class="row">
                    <label for="last_name" class="col-md-4 col-form-label">LastName</label>
                    <input id="last_name" type="text" name="last_name" value="{{ old('last_name' ,$user->last_name) }}" class="form-control @error('last_name') is-invalid @enderror" autocomplete="last_name" autofocus>
                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                  <div class="row">
                    <label for="email" class="col-md-4 col-form-label">Email</label>
                    <input id="email" type="text" name="email" value="{{ old('email',$user->email) }}" class="form-control @error('email') is-invalid @enderror" autocomplete="email" autofocus>
                    @error('email')
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
        </div>
    </form> 
  </div>
</div>
<div class="row">
 <div class="m-2 p-2">
            <form method="post" action="{{ route('users.destroy', $user->id) }}">
             @csrf
             @method('DELETE')
             <button type="submit" class="btn btn-danger">Delete {{ $user->username }}</button>   
        </form>
</div>
</div>








<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-8 offset-2">
                <form action="{{route('users.changePassword', $user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <label for="password" class="col-md-4 col-form-label">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password',$user->password)}}" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                 <div class="row">
                    <label for="email" class="col-md-4 col-form-label">Confirm Password</label>
                     <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                    <div class="row pt-4">
                        <button class="btn btn-primary">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- End Page Content -->

@endsection
