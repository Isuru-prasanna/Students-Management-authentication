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
    <div class="container center_div">
        <div class="justify-content-center">
            <div class="card card-primary">
                <div class="card-header">
                  
                    <h3 class="card-title">Add Courses</h3>
                </div>
                @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
               @endif 
               @if(session('error'))
               <div class="alert alert-success">
                {{ session('error') }}
               @endif
                <!-- /.card-header -->
                <!-- form start -->
                <form id="courseadd" action="{{url('course/insert')}}" enctype="multipart/form-data" method="post">
                    <div class="card-body">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Courses Name</label>
                            <input type="text" class="@error('CourseName') is-invalid @enderror form-control" name="CourseName" id="CourseName" placeholder="Enter Couses">
                        </div>
                        @error ('CourseName')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputCategory">Courses Category</label>
                            <input type="text" class="@error('CourseCategory') is-invalid @enderror form-control" name="CourseCategory" id="CourseCategory" placeholder="Enter Course Category">
                        </div>
                        @error ('CourseCategory')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputTitel">Titel</label>
                            <input type="Text" class="@error('titel') is-invalid @enderror form-control" id="titel" name="title" placeholder="Enter Title">
                        </div>
                        @error ('titel')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputAddress">Address</label>
                            <input type="Text" class="@error('Address') is-invalid @enderror form-control" id="Address" name="Address" placeholder="Enter Address">
                        </div>
                        @error ('Address')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputCantact">Contacts</label>
                            <input type="Text" class="@error('Contacts') is-invalid @enderror form-control" id="Contacts" name="Contacts" placeholder="Enter Contacts">
                        </div>
                        @error ('CourseName')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>

                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" id="InputFile" name="InputFile" class="@error('InputFile') is-invalid @enderror form-control" />
                                </div>
                            </div>
                        </div>
                        @error ('InputFile')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputSummary">Summary</label>
                            <textarea class="@error('summary') is-invalid @enderror form-control" id="summary" name="summary" rows="2" placeholder="Enter ..."></textarea>
                        </div>
                        @error ('summary')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        if ($("#courseadd").length > 0) {
            $("#courseadd").validate({
                rules: {
                    CourseName: {
                        required: true,
                        maxlength: 50
                    },
                    CourseCategory: {
                        required: true,
                    },
                    titel: {
                        required: true,
                        maxlength: 20
                    },
                    Address: {
                        required: true,
                        maxlength: 50
                    },
                    Contacts: {
                        required: true,
                        maxlength: 50
                    },
                    InputFile: {
                        required: true,
                    },
                    summary: {
                        required: true,
                        maxlenth: 100
                    },
                },
                messages: {
                    CourseName: {
                        required: "please enter Course Name",
                    },
                    CourseCategory: {
                        required: "Please enter Course Category",
                    },
                    titel: {
                        required: "please enter title",
                    },
                    Address: {
                        required: "Please enter Address",
                    },
                    Contacts: {
                        required: "Please enter Contacts",
                    },
                    InputFile: {
                        required: "please enter Inputfile",
                    },
                    summary: {
                        required: "please enter summary",
                    },
                },
            })
        }
    </script>
</div>
@endsection