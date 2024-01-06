@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{route('status.store')}}">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card mb-3">
                <div class="card-header">Add New Status</div>
                <div class="card-body">

                <input type="hidden" name="project_id" value="{{ $project->id }}">

                <div class="form-group  row mb-3">
                    <label for="ProgressDate">Progress Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="ProgressDate" name="ProgressDate" required>
                    </div>
                </div>
                <div class="form-group  row mb-3">
                    <label for="status">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="status" name="status">
                            <option value="ahead_of_schedule">Ahead of Schedule</option>
                            <option value="on_schedule">On Schedule</option>
                            <option value="delayed">Delayed</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                </div>
                <div class="form-group  row mb-3">
                    <label for="description" >Description</label>
                    <div class="col-sm-10">
                        <input type="text" name="description" class="form-control" id="description">
                    </div>
                </div>
            </div>
            </div>
            <div class="text-center">
                <a class="btn btn-warning " href="{{route('project.index')}}">Back</a>
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection

