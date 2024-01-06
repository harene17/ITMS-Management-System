@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('success'))
            <h6 class="alert alert-success">
                {{ session('success') }}
            </h6>
        @endif

        <a class="btn btn-dark mb-2" style="border-color: #ff96ad; align-items: center;" href="{{ route('project.create') }}">
            <span style="margin-right: 5px;">Add New Project</span>
            <span class="fa-solid fa-plus"></span>
        </a>

        <div class="card">
            <div class="card-header">
                <h1>List of Projects</h1>
            </div>
            <div class="card-body">
                @php($i=1)
                <table class="table">
                    <tr>
                        <th>No.</th>
                        <th>Project Name</th>
                        <th>Project Owner</th>
                        <th>PIC</th>
                        <th>Action</th>
                    </tr>

                    @if(auth()->user()->user_level == 0)
                        @foreach($projects as $p)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $p->projName }}</td>
                                <td>{{ $p->owner }}</td>
                                <td>{{ $p->PIC }}</td>
                                <td>
                                    <form action="{{ route('project.destroy', $p) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-info" href="{{ route('project.show', ['project' => $p->id]) }}">Details </a> &nbsp;
                                        <a class="btn btn-warning" href="{{ route('project.edit', $p->id) }}"> Edit </a>
                                        <a class="btn btn-info" href="{{ route('status.show', ['project' => $p->id]) }}">Show Status</a>
                                        <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Confirm DELETE?')">
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    @elseif(auth()->user()->user_level == 1)
                        @forelse(auth()->user()->leadDevProjects as $p)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $p->projName }}</td>
                                <td>{{ $p->owner }}</td>
                                <td>{{ $p->PIC }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('project.show', ['project' => $p->id]) }}">Details </a> &nbsp;
                                    <a class="btn btn-info" href="{{ route('status.show', ['project' => $p->id]) }}">Show Status</a>
                                    <a class="btn btn-warning" href="{{ route('status.create', ['project' => $p->id]) }}">Create Status</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No projects assigned to this lead developer as of now.</td>
                            </tr>
                        @endforelse
                    @elseif(auth()->user()->user_level == 2)
                        @forelse(auth()->user()->developer->projects as $p)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $p->projName }}</td>
                                <td>{{ $p->owner }}</td>
                                <td>{{ $p->PIC }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('project.show', ['project' => $p->id]) }}">Details </a> &nbsp;
                                    <a class="btn btn-info" href="{{ route('status.show', ['project' => $p->id]) }}">Show Status</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No projects assigned to this developer as of now.</td>
                            </tr>
                        @endforelse
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
