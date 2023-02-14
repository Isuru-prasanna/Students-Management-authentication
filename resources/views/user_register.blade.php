@extends('layouts.app')
@section('content')
<div class="content-wrapper">
  <div class="card card-outline card-primary">
    <div class="card-body">
      <style>
        .error {
          color: #FF0000;
        }
      </style>
       @if(session('success'))
       <div class="alert alert-success">
         {{ session('success') }}
       </div>
      @endif
      <p class="login-box-msg">Register Student</p>
      <form id="submitbtn" action="{{url('Register/users')}}" name="submitbtn" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror form-control" placeholder="Full name">
        </div>
        @error ('name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="form-group">
          <input type="text" name="nic" id="nic" class="@error ('nic') is-invalid @enderror form-control" placeholder="NIC">
        </div>
        @error('nic')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="form-group">
          <input type="text" name="city" id="city" class="@error ('city') is-invalid @enderror form-control" placeholder="City">

        </div>
        @error('city')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="form-group">
          <select id="educationlevel" name="educationlevel" onchange="otherfunction()" class="@error('educationlevel') is-invalid @enderror form-control">
            <option selected disabled>Education Level</option>
            <option value="a/l">A/l</option>
            <option value="o/l">O/l</option>
            <option value="other">Other</option>
          </select>

        </div>
        @error('educationlevel')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="form-group">
        <input type="text" name="other" id="other" class=" form-control" placeholder="Other">
      </div>
        <div class="form-group">
          <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror form-control" placeholder="Email">

        </div>
        @error('email')
        <div class="atert alert-danger">{{$message}}</div>
        @enderror
        <div class="form-group">
          <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror form-control" placeholder="Password">
        </div>
        @error('password')
        <div class="alert alert-danger">{{$massage}}</div>
        @enderror
        <!-- <div class="form-group">
        <input type="password" class="@error('conform') is-invalid @enderror form-control" name="conform" id="conform" placeholder="Retype password">
      </div> -->
        @error('conform')
        <div class="alert alert-danger">{{$massage}}</div>
        @enderror
        <div class="row">
          <!-- <div class="col-8">
          <div class="icheck-primary">
            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
            <label for="agreeTerms">
              I agree to the
            </label>
          </div>
        </div> -->
          <!-- /.col -->
          <div class="submit">
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <br>
      <a href="/" class="text-center">I already have a membership</a>
    </div>
  </div>
</div>
<script>
  // jquary validation
  if ($("#submitbtn").length > 0) {
    $("#submitbtn").validate({
      rules: {
        name: {
          required: true,
          maxlength: 50
        },
        nic: {
          required: true,
          maxlength: 12
        },
        city: {
          required: true,
          maxlength: 20
        },
        educationlevel: {
          required: true,
        },
        email: {
          required: true,
          maxlength: 50
        },
        password: {
          required: true,
          maxlength: 20
        },
        conform: {
          required: true,
          maxlength: 20,
          equalTo: "#password"
        },
      },
      messages: {
        name: {
          required: "plase enter full name",
        },
        nic: {
          required: "plase enter NIC",
        },
        city: {
          required: "plase enter City",
        },
        educationlevel: {
          required: "plase enter Education Level",
        },
        email: {
          required: "plase enter email",
        },
        password: {
          required: "plase enter password",
        },
        conform: {
          required: "plase enter Confirm password",
        },
      },
    })
  }
</script>
<script>
  var select = document.getElementById('educationlevel');
  document.getElementById('other').style = 'display:none';

  function otherfunction(event) {
    var data = 'select';
    if (select.selectedIndex > 0) {
      data = select.item(select.selectedIndex).textContent;
    }
    var other = 'Other';
    var alevel = 'A/l';
    var olevel = 'O/l';
    if (data == other) {
      document.getElementById('other').style = 'display:true';
    }
    if (data == alevel) {
      document.getElementById('other').style = 'display:none';
    }
    if (data == olevel) {
      document.getElementById('other').style = 'display:none';
    }
  }
  select.addEventListener('click', myFunction);
  otherfunction();
</script>
@endsection