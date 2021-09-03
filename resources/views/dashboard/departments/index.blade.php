@extends('layouts.main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Departments</h1>
    </div>

<div class="card shadow mb-4">
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
    </div>
    <div class="card-header">
        <div class="float-right">
            <a href="{{ route('departments.create') }}" class="btn btn-primary">
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
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($departments as $department)
                    <tr>
                        <td>{{$department->id}}</td>
                        <td>{{$department->name}}</td>
                        <td>
                            <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-primary">Edit</a> 
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
