<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title-admin','Hệ Thống Website')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" type="image/x-icon" href="{!! asset('/backend/dist/img/avatar5.png')!!}" />
    <link rel="stylesheet" href="{!! asset('backend/css/all.min.css?v='.randString(18)) !!}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Đăng Nhập</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Đăng nhập  để bắt đầu phiên làm việc !!!</p>

        @if (Session::has('danger') && ($message = Session::get('danger')))
            <div class="alert alert-danger alert-dismissible">
                <p><i class="icon fa fa-ban"></i>{!! $message !!}</p>
            </div>
        @endif

        <form action="" method="POST">
            <div class="form-group has-feedback {{ $errors->first('email') ? 'has-error' : '' }}">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <span class="text-danger"><p class="mg-t-5">{{ $errors->first('email') }}</p></span>
            </div>
            <div class="form-group has-feedback {{ $errors->first('password') ? 'has-error' : '' }}">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <span class="text-danger"><p class="mg-t-5">{{ $errors->first('password') }}</p></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-6 margin-auto-div">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <!-- /.social-auth-links -->
        <div class="row">
            <div class="col-sm-12 mg-t-20">
                {{--<a href="#" class="float-right">Quên mật khẩu !!!</a><br>--}}
            </div>

        </div>


    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<script>
    setTimeout(function(){
        $('.alert').slideUp(2000);
    }, 3000);
</script>
</body>
</html>
