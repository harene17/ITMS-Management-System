@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('project.update', $project) }}">
            @csrf
            @method('PATCH')
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
                <div class="card-header">Edit Project</div>
                <div class="card-body">
                    <div class="form-group  row mb-3">
                        <label for="projId" class="col-sm-2 col-form-label">Project ID</label>
                        <div class="col-sm-10">
                            <input type="text" name="projId" class="form-control" id="projId" value="{{ $project->projId }}">
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="projName" class="col-sm-2 col-form-label">Project Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="projName" class="form-control" id="projName" value="{{ $project->projName }}">
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="owner" class="col-sm-2 col-form-label">Project Owner</label>
                        <div class="col-sm-10">
                            <input type="text" name="owner" class="form-control" id="owner"  value="{{ $project->owner }}">
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="PIC" class="col-sm-2 col-form-label">PIC</label>
                        <div class="col-sm-10">
                            <input type="text" name="PIC" class="form-control" id="PIC" value="{{ $project->PIC }}">
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="StartDate" class="col-sm-2 col-form-label">Start Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="StartDate" class="form-control" id="StartDate" value="{{ $project->StartDate }}">
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="EndDate" class="col-sm-2 col-form-label">End Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="EndDate" class="form-control" id="EndDate" value="{{ $project->EndDate}}">
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="Duration" class="col-sm-2 col-form-label">Duration</label>
                        <div class="col-sm-10">
                            <input type="text" name="Duration" class="form-control" id="Duration" value="{{ $project->Duration }}">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="manager_id" class="col-sm-2 col-form-label">Manager</label>
                        <div class="col-sm-10">
                            <select name="manager_id" class="form-control" id="manager_id">
                                @foreach($managers as $manager)
                                    <option value="{{ $manager->id }}" {{ $project->manager_id == $manager->id ? 'selected' : '' }}>
                                        {{ $manager->managerName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Lead Developer</label>
                        <div class="col-sm-10">
                            <select name="leadDev_id" class="form-control" id="leadDev_id">
                                @foreach($leadDev as $l)
                                    <option value="{{ $l->id }}" {{ $l->id == $project->leadDev_id ? 'selected' : '' }}>
                                        {{ $l->leadName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Developers</label>
                        <div class="col-sm-10">
                            @foreach($developers as $d)
                                <div class="form-check">
                                    <input type="checkbox" name="developers[]" value="{{ $d->id }}" id="developer{{ $d->id }}"
                                        {{ in_array($d->id, $project->developers->pluck('id')->toArray()) ? 'checked' : '' }}>
                                    <label for="developer{{ $d->id }}">{{ $d->devName }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">System Development Information</div>
                <div class="card-body">
                    <div class="form-group row mb-3">
                        <label for="Methodology" class="col-sm-2 col-form-label">Methodology</label>
                        <div class="col-sm-10">
                            <input type="text" name="Methodology" class="form-control" id="Methodology" value="{{ $project->Methodology }}">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="Platform" class="col-sm-2 col-form-label">Platform</label>
                        <div class="col-sm-10">
                            <select name="Platform" class="form-control" id="Platform">
                                <option value="mobile" {{ $project->Platform == 'mobile' ? 'selected' : '' }}>Mobile</option>
                                <option value="web-based" {{ $project->Platform == 'web-based' ? 'selected' : '' }}>Web-Based</option>
                                <option value="stand-alone" {{ $project->Platform == 'stand-alone' ? 'selected' : '' }}>Stand-Alone</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="Deployment" class="col-sm-2 col-form-label">Deployment</label>
                        <div class="col-sm-10">
                            <select name="Deployment" class="form-control" id="Deployment">
                                <option value="cloud" {{ $project->Deployment == 'cloud' ? 'selected' : '' }}>Cloud</option>
                                <option value="on-premises" {{ $project->Deployment == 'on-premises' ? 'selected' : '' }}>On-Premise</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-center">
                        <a class="btn btn-warning" href="{{ route('project.index') }}">Back</a>
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
