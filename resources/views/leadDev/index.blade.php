@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('success'))
            <h6 class="alert alert-success">
                {{ session('success') }}
            </h6>
        @endif
            <a class="btn btn-dark mb-2" style="border-color: #ff96ad;  align-items: center;" href="{{ route('leadDev.create') }}">
                <span style="margin-right: 5px;">Add New Lead Developer</span>
                <span class="fa-solid fa-plus"></span>
            </a>
        <div class ='card'>
            <div class="card-header">
                <h1>List of Lead Developers</h1>
            </div>
            <div class="card-body">
                @php($i=1)
                <table class ='table'>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Lead Developer ID</th>
                        <th>Action</th>
                    </tr>

                    @foreach($leadDev as $l)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$l->leadName}}</td>
                            <td>{{$l->leadId}}</td>

                            <td>
                                <form action="{{route('leadDev.destroy',$l)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-info" href="{{route('leadDev.show', $l->id)}}">Details </a> &nbsp;
                                    <a class="btn btn-warning" href="{{route('leadDev.edit', $l->id)}}"> Edit </a>&nbsp;
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
