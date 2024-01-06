@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="card-header">Project Details</div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Project ID</td>
                        <td>{{ $project->projId }}</td>
                    </tr>
                    <tr>
                        <td>Project Name</td>
                        <td>{{ $project->projName }}</td>
                    </tr>
                    <tr>
                        <td>Project Owner</td>
                        <td>{{ $project->owner }}</td>
                    </tr>
                    <tr>
                        <td> PIC</td>
                        <td>{{ $project->PIC }}</td>
                    </tr>
                    <tr>
                        <td>Start Date</td>
                        <td> {{ $project->StartDate }}</td>
                    </tr>
                    <tr>
                        <td>End date</td>
                        <td>{{ $project->EndDate }}</td>
                    </tr>
                    <tr>
                        <td>Duration</td>
                        <td>{{ $project->Duration }}</td>
                    </tr>
                    <tr>
                        <td>Manager</td>
                        <td>{{ $project->manager ? $project->manager->managerName : 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td>Lead Developer</td>
                        <td>{{ $project->leadDev ? $project->leadDev->leadName : 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td>Developers</td>
                        <td>
                            <table class="table table-bordered">
                                @php($i=1)
                                <tr><th>No.</th><th>Name</th><th>Status</th></tr>
                                @foreach($project->developers as $developer)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td> {{ $developer->devName }}</td>
                                        <td> {{ $developer->status }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </ol>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card mb-3">
            <div class="card-header">System Development Details</div>
            <div class="card-body">
                <table class="table">
                        <tr>
                            <td>Methodology</td>
                            <td>{{ $project->Methodology }}</td>
                        </tr>
                        <tr>
                            <td>Platform</td>
                            <td>{{ $project->Platform }}</td>
                        </tr>
                        <tr>
                            <td>Deployment</td>
                            <td>{{ $project->Deployment }}</td>
                        </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="text-center mt-3">
        <a class="btn btn-warning " href="{{route('project.index')}}">Back</a>
        <a class="btn btn-primary" href="{{route('project.edit',$project->id)}}">Edit Details</a>
    </div>
@endsection
