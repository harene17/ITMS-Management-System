@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{route('developer.store')}}">
            @csrf
            <div class="card mb-3">
                <div class="card-header">Add New Developer</div>
                <div class="card-body">
                    <div class="form-group  row mb-3">
                        <label for="devId" class="col-sm-2 col-form-label">Developer ID</label>
                        <div class="col-sm-10">
                            <input type="text" name="devId" class="form-control" id="devId">
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="devName" class="col-sm-2 col-form-label">Developer Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="devName" class="form-control" id="devName">
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control" id="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control" id="email">
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="contactNum" class="col-sm-2 col-form-label">Contact Number</label>
                        <div class="col-sm-10">
                            <input type="text" name="contactNum" class="form-control" id="contactNum">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="manager_id" class="col-sm-2 col-form-label">Manager</label>
                        <div class="col-sm-10">
                            <select name="manager_id" class="form-control" id="manager_id">
                                @foreach($managers as $m)
                                    <option value="{{ $m->id }}">{{ $m->managerName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a class="btn btn-warning " href="{{route('developer.index')}}">Back</a>
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection
