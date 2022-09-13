@extends('layouts.master')
@section('page-title','Front')
@section('title','Dashboard')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    {{-- <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol> --}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
                            <div class="form-group">
                                <label for="username">Name</label>
                                <input type="name" class="form-control" id="username" name="username" aria-describedby="nameHelp" value="{{$users->name}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="useremail">Email address</label>
                                <input type="email" class="form-control" id="useremail" name="useremail" aria-describedby="emailHelp" value="{{$users->email}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="useremail">Status</label>
                                <input type="email" class="form-control" id="useremail" name="useremail" aria-describedby="emailHelp" value="{{$users->status==1? 'Active' : 'Inactive' }}" disabled>
                            </div>
        </div>
    </div>
</div>

@endsection