@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"><h1>Lead Developer Details</h1></div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Lead Developer ID</td>
                        <td>{{$leadDev->leadId}}</td>
                    </tr>
                    <tr>
                        <td>Lead Developer Name</td>
                        <td>{{$leadDev->leadName}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{$leadDev->status}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$leadDev->email}}</td>
                    </tr>
                    <tr>
                        <td>Contact Number</td>
                        <td>{{$leadDev->contactNum}}</td>
                    </tr>
                    <tr>
                        <td>Manager</td>
                        <td>{{ $leadDev->managers->managerName ?? 'Not Assigned'  }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="text-center mt-3">
            <a class="btn btn-warning " href="{{route('leadDev.index')}}">Back</a>
            <a class="btn btn-primary" href="{{route('leadDev.edit',$leadDev->id)}}">Edit Details</a>
        </div>

    </div>
@endsection
