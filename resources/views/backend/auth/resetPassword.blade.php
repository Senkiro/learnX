<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSPINIA | Reset Password</title>
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/customize.css') }}" rel="stylesheet">
</head>

<body class="gray-bg">
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name">IN+</h1>
        </div>
        <h3>Reset your password for IN+</h3>
        <p>Enter your new password below.</p>
        <form method="post" class="m-t" role="form" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
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
            <button type="submit" class="btn btn-primary block full-width m-b">Reset Password</button>
        </form>
        <p class="m-t"><small>Inspinia web app framework based on Bootstrap 3 &copy; 2014</small></p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ asset('backend/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
</body>

</html>
