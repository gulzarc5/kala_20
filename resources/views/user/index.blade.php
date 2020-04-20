
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kalashetra | Login</title>

    <link href="{{asset('kala/src/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('kala/src/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('kala/src/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('kala/src/css/style.css')}}" rel="stylesheet">

    <!-- Server Javascript -->
    
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">K+</h1>

            </div>
            <h3>Welcome to Kalashetra</h3>
            <p>Login in. To see it in action.</p>
                {{ Form::open(array('route' => 'user.login', 'method' => 'post')) }}
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Username" value="{{old('email')}}">
                    @if ($message = Session::get('login_error'))
                    <span  role="alert">
                            <strong style="color:red">{{ $message }}</strong>
                        </span>
                    @endif
                    @error('email')
                        <span  role="alert">
                            <strong style="color:red">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" >
                    @error('password')
                        <span  role="alert">
                            <strong style="color:red">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success"  name="login">Login</a>

                <!-- <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a> -->
            {{Form::close()}}
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('src/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('src/js/popper.min.js')}}"></script>
    <script src="{{asset('src/js/bootstrap.js')}}"></script>

</body>
</html>