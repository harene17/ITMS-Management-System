@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"><h1>Manager Details</h1></div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Manager ID</td>
                        <td>{{$manager->managerId}}</td>
                    </tr>
                    <tr>
                        <td>Manager Name</td>
                        <td>{{$manager->managerName}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{$manager->status}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$manager->email}}</td>
                    </tr>
                    <tr>
                        <td>Contact Number</td>
                        <td>{{$manager->contactNum}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="text-center mt-3">
            <a class="btn btn-warning " href="{{route('manager.index')}}">Back</a>
            <a class="btn btn-primary" href="{{route('manager.edit',$manager->id)}}">Edit Details</a>
        </div>

    </div>
@endsection
