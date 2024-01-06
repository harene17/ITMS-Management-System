@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('success'))
            <h6 class="alert alert-success">
                {{ session('success') }}
            </h6>
        @endif
            <a class='btn btn-primary mb-2' href="{{route('status.create')}}">Add New</a>
        <div class ='card'>
            <div class="card-header">
                <h1>List of Progress</h1>
            </div>
            <div class="card-body">
                @php($i=1)
                <table class ='table'>
                    <tr>
                        <th>No.</th>
                        <th>Project Name</th>
                        <th>Action</th>
                    </tr>

                    @foreach($statuses as $s)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$s->project ? $s->project->projName: 'N/A'}}</td>
                            <td>{{$p->owner}}</td>
                            <td>{{$p->PIC}}</td>

                            <td>
                                <a class="btn btn-info" href="{{route('status.show', $s->id)}}">Details </a> &nbsp;
                                <a class="btn btn-warning" href="{{route('status.create', $s->id)}}"> Add </a>&nbsp;
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection
