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
            <p>Total User: {{$total}}</p>
            <p>Active User: {{$active}}</p>
            <p>Inactive user: {{$inactive}}</p>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                @foreach($users as $user)
                
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->status==1? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="{{route('admin.changeStatus',[$user->id,$user->status])}}" class="btn btn-{{$user->status==1? 'danger' : 'primary' }}">{{$user->status==1? 'Inactive' : 'Active' }}</a> 
                            <a href="{{route('admin.viewUser',[$user->id])}}" class="btn btn-warning">View</a> 
                        </td>
                       
                    </tr>
                   
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection