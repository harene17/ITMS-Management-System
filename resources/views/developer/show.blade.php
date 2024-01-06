@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"><h1>Developer Details</h1></div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Developer ID</td>
                        <td>{{$developer->devId}}</td>
                    </tr>
                    <tr>
                        <td>Developer Name</td>
                        <td>{{$developer->devName}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{$developer->status}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$developer->email}}</td>
                    </tr>
                    <tr>
                        <td>Contact Number</td>
                        <td>{{$developer->contactNum}}</td>
                    </tr>
                    <tr>
                        <td>Manager</td>
                        <td>{{ $developer->managers->managerName ?? 'Not Assigned'  }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="text-center mt-3">
            <a class="btn btn-warning " href="{{route('developer.index')}}">Back</a>
            <a class="btn btn-primary" href="{{route('developer.edit',$developer->id)}}">Edit Details</a>
        </div>

    </div>
@endsection
