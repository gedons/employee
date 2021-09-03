@extends('layouts.main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Countries</h1>
    </div>

<div class="card shadow mb-4">
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
    </div>
    <div class="card-header">
        <div class="float-right">
            <a href="{{ route('countries.create') }}" class="btn btn-primary">
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
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($countries as $country)
                    <tr>
                        <td>{{$country->id}}</td>
                        <td>{{$country->country_code}}</td>
                        <td>{{$country->name}}</td>
                        <td>
                            <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-primary">Edit</a> 
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
