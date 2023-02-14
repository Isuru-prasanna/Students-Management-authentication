@extends('layouts.app')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <style>
        .error {
            color: #FF0000;
        }
    </style>
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Courses Registration</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{url('course_registration')}}" id="course_registration" mathod="post">
                        <div class="form-group">
                        @csrf
                            <label>Student Name</label>
                            <input type="text" class="@error ('fullname') is-invalid @enderror form-control" style="width: 100%" name="fullname" id="fullname" placeholder="Enter Name">
                        </div>
                        @error('fullname')
                        <div class="alert alert-danged">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label>Student NIC</label>
                            <input type="text" class="@error ('nic') is-invalid @enderror form-control" style="width: 100%" name="nic" id="nic" placeholder="Enter NIC">
                        </div>
                        @error('nic')
                        <div class="alert alert-danged">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label>Education Level</label>
                            <select id="educationlevel" name="educationlevel" onchange="otherfunction()" class="@error ('educationlevel') is-invalid @enderror form-control" style="width: 100%">
                                <option selected disabled>Education Level</option>
                                <option value="a/l">A/l</option>
                                <option value="o/l">O/l</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        @error('educationlevel')
                        <div class="alert alert-danged">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label>Courses</label>
                            <input type="text" class="@error ('course') is-invalid @enderror form-control" style="width: 100%" name="course" id="course" placeholder="Enter Course">
                        </div>
                        @error('course')
                        <div class="alert alert-danged">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label>Courses Fee</label>
                            <label class="form-control">RS: 20000/=</label>
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Course Time</label>
                        <select class="@error ('course_time') is-invalid @enderror form-control" data-placeholder="Select a State" name="course_time" id="course_time" style="width: 100%;">
                            <option selected disabled>Select Course time</option>
                            <option value="fulltime">Full Time</option>
                            <option value="part time">Part Time</option>
                        </select>
                    </div>
                </div>
                @error('course_time')
                <div class="alert alert-danged">{{$message}}</div>
                @enderror
                <div class="submit">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // jquary validation
    if ($('#course_registration').length > 0) {
        $('#course_registration').validate({
            rules: {
                fullname: {
                    required: true,
                    maxlength: 50
                },
                nic: {
                    required: true,
                    maxlength: 12
                },
                educationlevel: {
                    required: true,
                },
                course: {
                    required: true,
                },
                course_time: {
                    required: true,
                },
            },
            messages: {
                fullname: {
                    required: "please enter Full Name",
                },
                nic: {
                    required: "please enter NIC",
                },
                educationlevel: {
                    required: "please enter Education Level",
                },
                course: {
                    required: "please enter course name",
                },
                course_time: {
                    required: "please enter course time",
                },
            },
        })
    }
</script>
</div>
@endsection