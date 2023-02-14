@extends('layouts.app')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User Active</h3>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                    <select name="action" id="action">
                                        <option value='0'>Select Action</option>
                                        <option data-name="{{$usersdatas->id}}" value="Approved">Approved</option>
                                        <option data-name="{{$usersdatas->id}}" value="Desapproved">Desapprove</option>
                                    </select>
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
{{-- <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> --}}
<script>
    $(document).ready(function() {
        $('select[name="action"]').on('change', function() {
            var action = $(this).val();
            var opt = $(this.options[this.selectedIndex]);
            var id = opt.attr('data-name');
            $('select[name="action"]').empty();
            $.ajax({
                url: '{{url("/actionselect/")}}/' + id + '/' + action,
                type: 'post',
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    let $actionvalue = $('select[name="action"]');
                    if (actionvalue != null) {
                        $('#success').html('Data added successfully');
                    } else if (actionvalue == null) {
                        alert("Error occured!!!!");
                    }
                }
            });
            location.reload();
        });
    });
</script>
@endsection