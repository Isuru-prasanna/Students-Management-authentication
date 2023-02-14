@extends('layouts.app')
@section('styles')
@endsection
@section('content')
<style>
.modal-body label {
  font-size: 35px;
  text-align: center;
}
.order-product-card {
  min-height: 250px;
}
.img-fluid {
      max-width:100%;
      width: 100%;
      max-height: 250px;
      height: auto; 
      margin: auto auto; /* align center */
   }
</style>
{{-- heding --}}
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  
                </div>

                <div class="col-sm-6">
                    <input type="search" placeholder="Search" id="form1" class="form-label" />
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Couses</li>
                    </ol>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Courses</h3>
                        </div>
                       
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                @foreach($courses as $course)
        
                                        <div class="col-sm-4">
                                            <a id="submit" data-id="{{$course->name}}" data-toggle="modal" class="couserregister" data-target="#exampleModal">
                                            <div class="order-product-card">
                                                <div class="position-relative">
                                                    <img src="{{asset('course/'.$course->image)}}"  alt="course" class="img-fluid">
                                                    <div class="ribbon-wrapper ribbon-lg">
                                                        <div class="ribbon bg-success text-lg">
                                                            <input type="hidden" name="coursename" id="coursename" value="{{$course->name}}"/>
                                                        {{$course->title}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                      
                                @endforeach
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
                                            <!-- Modal -->
                                                    <form  id="course_registration" mathod="post">
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    {{csrf_field()}}
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Registration Course</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label id="CourseName" class="text-lg" for="exampleInputName1">Courses Name</label>
                                                                            <div class="form-group">
                                                                                <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror form-control" placeholder="Full name">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <input type="text" name="email" id="email" class="@error ('email') is-invalid @enderror form-control" placeholder="email">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <input type="text" name="nic" id="nic" class="@error ('nic') is-invalid @enderror form-control" placeholder="NIC">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <select id="educationlevel" name="educationlevel" onchange="otherfunction()" class="@error ('educationlevel') is-invalid @enderror form-control" style="width: 100%">
                                                                                    <option selected disabled>Education Level</option>
                                                                                    <option value="a/l">A/l</option>
                                                                                    <option value="o/l">O/l</option>
                                                                                    <option value="other">Other</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" style="width: 100%" value="20000/-" name="price" id="price" disabled>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <select class="@error ('course_time') is-invalid @enderror form-control" data-placeholder="Select a State" name="course_time" id="course_time" style="width: 100%;">
                                                                                    <option selected disabled>Select Course time</option>
                                                                                    <option value="fulltime">Full Time</option>
                                                                                    <option value="part time">Part Time</option>
                                                                                </select>
                                                                            </div>
                                                                            <p>Payment Bill Enter</p>
                                                                            <div class="input-group">
                                                                                <div class="custom-file">
                                                                                    <input type="file" id="InputFile" name="InputFile" placeholder="" class="@error('InputFile') is-invalid @enderror form-control" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                            
<script type="text/javascript">
    $(document).on("click", ".couserregister", function () {
        var course = $(this).data('id');
        $(".modal-body #CourseName").html( course );
        // As pointed out in comments, 
        // it is unnecessary to have to manually call the modal.
        // $('#addBookDialog').modal('show');
    });
</script>
<script>
    $(document).ready(function () {
  $("form").submit(function (event) {
    var formData = {
      name: $("#name").val(),
      nic: $("#nic").val(),
      email: $("#email").val(),
      educationlevel: $("#educationlevel"),
      course_time: $("#course_time"),
      InputFile: $("#InputFile"),
    };

    $.ajax({
      type: "POST",
      url: "course_registration",
      data: formData,
      dataType: "json",
      encode: true,
    }).done(function (data) {
      console.log(data);
    });

    event.preventDefault();
  });
});
</script>

@endsection