<!DOCTYPE html>
<html>

<head>
    <link href="{{asset('assets/site/assets/img/texlog_mCM_icon.ico')}}" rel="shortcut icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('assets/site/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/login/fonts/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/login/Login-Form-Dark.css')}}">

</head>

<body>
<div class="login-dark">
    <form method="post" action="{{route('admin.login')}}">
        @csrf
        <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
        <div class="form-group">
            <input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Name">
            @error('name')
            <br>
            <div class="alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Password">
            @error('password')
            <br>
            <div class="alert-danger">{{$message}}</div>
            @enderror
        </div>
        @include('includes.erroralert')
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Log In</button>
        </div>
    </form>
</div>
<script src="{{asset('assets/site/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/site/assets/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>
