@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Progress Details for Project: {{ $project->projName }}</h1>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Progress Date</th>
                        <th>Progress Status</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($project->statuses as $status)
                        <tr>
                            <td>{{ $status->ProgressDate }}</td>
                            <td>{{ $status->status }}</td>
                            <td>{{ $status->description }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No progress details available for this project.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-center mt-3">
            <a class="btn btn-warning " href="{{ route('project.index') }}">Back</a>
        </div>
    </div>
@endsection
