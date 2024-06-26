<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSPINIA | Register</title>
    <link href="backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="backend/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="backend/css/animate.css" rel="stylesheet">
    <link href="backend/css/style.css" rel="stylesheet">
    <link href="backend/css/customize.css" rel="stylesheet">
</head>

<body class="gray-bg">
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name">IN+</h1>
        </div>
        <h3>Register for IN+</h3>
        <p>Create an account to enjoy all the features of our web application.</p>
        <form method="post" class="m-t" role="form" action="{{route('auth.register')}}">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Name" required value="{{ old('name') }}">
                @if($errors->has('name'))
                    <span class="error-message">* {{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Email" required value="{{ old('email') }}">
                @if($errors->has('email'))
                    <span class="error-message">* {{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                @if($errors->has('password'))
                    <span class="error-message">* {{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group">
                <input type="password" name="re_password" class="form-control" placeholder="Confirm Password" required>
                @if($errors->has('re_password'))
                    <span class="error-message">* {{ $errors->first('re_password') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Register</button>
            <p class="text-muted text-center"><small>Already have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="{{route('auth.admin')}}">Login</a>
        </form>
        <p class="m-t"><small>Inspinia web app framework base on Bootstrap 3 &copy; 2014</small></p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="backend/js/jquery-3.1.1.min.js"></script>
<script src="backend/js/bootstrap.min.js"></script>
</body>

</html>
