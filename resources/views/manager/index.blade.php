@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('success'))
            <h6 class="alert alert-success">
                {{ session('success') }}
            </h6>
        @endif
            <a class="btn btn-dark mb-2" style="border-color: #ff96ad;  align-items: center;" href="{{ route('manager.create') }}">
                <span style="margin-right: 5px;">Add New Manager</span>
                <span class="fa-solid fa-plus"></span>
            </a>
        <div class ='card'>
            <div class="card-header">
                <h1>List of Managers</h1>
            </div>
            <div class="card-body">
                @php($i=1)
                <table class ='table'>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Manager ID</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                    @foreach($managers as $m)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$m->managerName}}</td>
                            <td>{{$m->managerId}}</td>
                            <td>{{$m->status}}</td>

                            <td>
                                <form action="{{route('manager.destroy',$m)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-info" href="{{route('manager.show', $m->id)}}">Details </a> &nbsp;
                                    <a class="btn btn-warning" href="{{route('manager.edit', $m->id)}}"> Edit </a>&nbsp;
                                    <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Confirm DELETE?')">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection
