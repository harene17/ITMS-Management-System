@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{route('manager.store')}}">
            @csrf
            <div class="card mb-3">
                <div class="card-header">Add New Manager</div>
                <div class="card-body">
                    <div class="form-group  row mb-3">
                        <label for="managerId" class="col-sm-2 col-form-label">Manager ID</label>
                        <div class="col-sm-10">
                            <input type="text" name="managerId" class="form-control" id="managerId">
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="managerName" class="col-sm-2 col-form-label">Manager Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="managerName" class="form-control" id="managerName">
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
                </div>
            </div>
            <div class="text-center">
                <a class="btn btn-warning " href="{{route('manager.index')}}">Back</a>
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection

