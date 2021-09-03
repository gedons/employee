@extends('layouts.main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">States</h1>
    </div>

<div class="card shadow mb-4">
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
    </div>
    <div class="card-header">
        <div class="float-right">
            <a href="{{ route('states.create') }}" class="btn btn-primary">
                Create
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Country Code</th>
                        <th>State Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($states as $state)
                    <tr>
                        <td>{{$state->id}}</td>
                        <td>{{$state->country->country_code}}</td>
                        <td>{{$state->name}}</td>
                        <td>
                            <a href="{{ route('states.edit', $state->id) }}" class="btn btn-primary">Edit</a> 
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<!-- End Page Content -->

@endsection
