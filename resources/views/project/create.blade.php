@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{route('project.store')}}">
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
                <div class="card-header">Add New Project</div>
                <div class="card-body">
                    <div class="form-group  row mb-3">
                        <label for="projId" class="col-sm-2 col-form-label">Project ID</label>
                        <div class="col-sm-10">
                            <input type="text" name="projId" class="form-control" id="projId">
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="projName" class="col-sm-2 col-form-label">Project Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="projName" class="form-control" id="projName">
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="owner" class="col-sm-2 col-form-label">Project Owner</label>
                        <div class="col-sm-10">
                            <input type="text" name="owner" class="form-control" id="owner">
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="PIC" class="col-sm-2 col-form-label">PIC</label>
                        <div class="col-sm-10">
                            <input type="text" name="PIC" class="form-control" id="PIC">
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="StartDate" class="col-sm-2 col-form-label">Start Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="StartDate" class="form-control" id="StartDate">
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="EndDate" class="col-sm-2 col-form-label">End Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="EndDate" class="form-control" id="EndDate">
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="Duration" class="col-sm-2 col-form-label">Duration</label>
                        <div class="col-sm-10">
                            <input type="text" name="Duration" class="form-control" id="Duration">
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="manager_id" class="col-sm-2 col-form-label">Manager</label>
                        <div class="col-sm-10">
                            <select name="manager_id" class="form-control" id="manager_id">
                                @foreach($managers as $m)
                                    <option value="{{ $m->id }}">{{ $m->managerName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Lead Developer</label>
                        <div class="col-sm-10">
                            <select name="leadDev_id" class="form-control" id="leadDev_id">
                                @foreach($leadDev as $l)
                                <option value="{{ $l->id }}">{{ $l->leadName }}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Developers</label>
                        <div class="col-sm-10">
                            @foreach($developers as $d)
                                <div class="form-check">
                                    <input type="checkbox" name="developers[]" value="{{ $d->id }}" id="developer{{ $d->id }}">
                                    <label for="developer{{ $d->id }}">{{ $d->devName}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">System Development Information</div>
                <div class="card-body">
                    <div class="form-group  row mb-3">
                        <label for="Methodology" class="col-sm-2 col-form-label">Methodology</label>
                        <div class="col-sm-10">
                            <input type="text" name="Methodology" class="form-control" id="Methodology">
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="Platform" class="col-sm-2 col-form-label">Platform</label>
                        <div class="col-sm-10">
                            <select name="Platform" class="form-control" id="Platform">
                                <option value="mobile">Mobile</option>
                                <option value="web-based">Web-Based</option>
                                <option value="stand-alone">Stand-Alone</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="Deployment" class="col-sm-2 col-form-label">Deployment</label>
                        <div class="col-sm-10">
                            <select name="Deployment" class="form-control" id="Deployment">
                                <option value="cloud">Cloud</option>
                                <option value="on-premises">On-Premise</option>
                            </select>
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
