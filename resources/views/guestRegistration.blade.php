<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}">
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap/js/bootstrap.bundle.js') }}">
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}">
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js.map') }}">
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap/js/bootstrap.js') }}">
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap/js/bootstrap.js.map') }}">
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}">
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap/js/bootstrap.min.js.map') }}">
  <link rel="stylesheet" href="{{ asset('bootstrap-validate-1.0.9') }}">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <style>
    .error {
      color: #FF0000;
    }
  </style>
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    
    <div class="card">
      <div class="card-body register-card-body">
        @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
       @endif 
       @if(session('error'))
       <div class="alert alert-success">
        {{ session('error') }}
       @endif
      </div>
        <p class="login-box-msg">Register a new membership</p>

        <form id="form" action="{{url('guest/doregister')}}" method="post">
          <div class="form-group mb-3">
          @csrf
            <!-- <span class="fas fa-user"></span> -->
            <input type="text" class="@error('name') is-invalid @enderror form-control" id="name" name="name" placeholder="Full name">
          </div>
          <div class="valid-feedback">
            @error ('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>

          <div class="form-group mb-3">
            <!-- <span class="fa fa-address-book"></span> -->
            <input type="text" class="@error('nic') is-invalid @enderror form-control" id="nic" name="nic" placeholder="NIC">

          </div>
          @error ('nic')
          <div class="alert alert-danger">{{$message}}</div>
          @enderror
          <div class="form-group mb-3">
            <!-- <span class="fa fa-map-marker"></span> -->
            <input type="text" class="@error('city') is-invalid @enderror form-control" id="city" name="city" placeholder="CITY">

          </div>
          @error ('city')
          <div class="alert alert-danger">{{$message}}</div>
          @enderror
          <div class="form-group mb-3">
            <!-- <span class="fa fa-book"></span> -->
            <select id="educationlevel" name="educationlevel" onchange="otherfunction()" class="@error('educationlevel') is-invalid @enderror form-control">
              <option selected disabled>Education Level</option>
              <option value="a/l">A/l</option>
              <option value="o/l">O/l</option>
              <option value="other">Other</option>
            </select>

          </div>
          @error ('educationlevel')
          <div class="alert alert-danger">{{$message}}</div>
          @enderror
          <div class="form-group mb-3">
            <!-- <span class="fa fa-book"></span> -->
            <input type="text" class="@error('other') is-invalid @enderror form-control" id="other" name="other" placeholder="Other">

          </div>
          @error ('other')
          <div class="alert alert-danger">{{$message}}</div>
          @enderror
          <div class="form-group mb-3">
            <!-- <span class="fas fa-envelope"></span> -->
            <input type="email" id="email" name="email" class="@error('email') is-invalid @enderror form-control" placeholder="Email">

          </div>
          @error ('email')
          <div class="alert alert-danger">{{$message}}</div>
          @enderror
          <div class="form-group mb-3">
            <!-- <span class="fas fa-lock"></span> -->
            <input type="password" id="password" name="password" class="@error('password') is-invalid @enderror form-control" placeholder="Password">
          </div>
          @error ('password')
          <div class="alert alert-danger">{{$message}}</div>
          @enderror
          <div class="form-group mb-3">
            <!-- <span class="fas fa-lock"></span> -->
            <input type="password" id="confirm" name="confirm" class=" form-control" placeholder="Retype password">
            @error ('confirm')
            <div class="form-control is-invalid">{{$message}}</div>
            @enderror
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                  I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i>
            Sign up using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i>
            Sign up using Google+
          </a>
        </div>

        <a href="{{url('/')}}" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->
  <script>
    // jquary validation
    if ($("#form").length > 0) {
      $("#form").validate({
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
          confirm: {
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
          confirm: {
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
  <!-- jQuery -->
  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>

</html>