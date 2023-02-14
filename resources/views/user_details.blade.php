@extends('layouts.app')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Student Details</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>NIC Number</th>
                                <th>Email</th>
                                <th>City</th>
                                <th>Education</th>
                                <th>Enrolle Courses</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $usersdatas)

                            <tr>
                                <td> {{$usersdatas->name}} </td>
                                <td> {{$usersdatas->nic}} </td>
                                <td> {{$usersdatas->email}} </td>
                                <td> {{$usersdatas->city}} </td>
                                <td> {{$usersdatas->educationlevel}} </td>
                                <td> null</td>

                                <td> {{$usersdatas->action}} </td>
                                <td>
                                    {{csrf_field()}}
                                    <a href="{{url('/delete_user/'.$usersdatas->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                                    <a href="{{url('/updateempIncreview/'.$usersdatas->id)}}" class="btn btn-warning">Update</a>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection