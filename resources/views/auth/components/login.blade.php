<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>QLSV | Đăng nhập</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ url('theme/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('theme/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ url('theme/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('theme/dist/css/AdminLTE.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('theme/plugins/iCheck/square/blue.css') }}">
    <link rel="stylesheet" href="{{ url('theme/plugins/toastr/toastr.min.css') }}">

    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .login-page {
            background-color: #b1d5f4;;
            /*background: url('hanoi-3609871.jpg');*/
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            /*max-width: 432px !important;*/
        }


        .body input:focus {
            outline: 0;
        }

        .body input {
            border-color: white;
            background-color: white;
            border-width: 0px;
        }

        .input-group {
            border-bottom: 1px solid #ccc;
        }
        h4, h5{
            color: #0065B3;
        }
        .bg-light-blue{
            background-color: #158af1 !important;
        }
        .login-box,
        .register-box {
            width: 370px !important;
        }

    </style>
</head>
<body class="hold-transition login-page" style="margin-top: -40px">
<div class="login-box">

    <div class="logo">
        <a href="javascript:void(0);" class="text-center" style="margin-bottom: 11px">
            <div class="text-center">
                <img src="{{ asset('logo.webp') }}" style="vertical-align: middle" alt="" height="90">
            </div>
            <h4 style="font-weight: bold;font-family: Arial;"  class="text-center text-uppercase">{{ TITLE_APP }}</h4>
            <h5 style="font-weight: bold ;font-family: Arial; " >HỆ THỐNG QUẢN LÝ SINH VIÊN THỰC TẬP</h5>
        </a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Đăng nhập để bắt đầu làm việc</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group has-feedback">
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                       name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Nhập tài khoản" autofocus>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                       required autocomplete="current-password" placeholder="Nhập mật khẩu...">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                @error('username')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="row">
                <div class="col-xs-7">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"  type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}> Duy trì đăng nhập
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                @if (Route::has('password.request'))
                    <div class="col-xs-5 mt-2 text-right">
{{--                        <a href="{{ route('password.request') }}">Quên mật khẩu</a><br>--}}

                    </div>
                @endif

{{--                <div class="col-xs-offset-3">--}}

{{--                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>--}}
{{--                </div>--}}
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-xs-6" style="float:none;margin: auto">
                    <button class="btn btn-block bg-light-blue waves-effect" type="submit">
                        {{--                            <i class="fa fa-arrow-circle-right"></i>--}}
                        ĐĂNG NHẬP
                        <i class="fa fa-arrow-circle-right" style="font-size: 18px; margin-left: 5px;"></i>
                    </button>
                </div>
            </div>
        </form>
        <!-- /.social-auth-links -->

    </div>
    <div class="col-md-12 text-center mt-2">
{{--        @if($file != null)--}}
{{--        <a href="{{$file->getUrlFile()}}" target="popup"--}}
{{--           class="detail-file-name seen-new-window" style="color: black;font-weight: bold"><span style="color: red;font-weight: bold">-></span> Xem Tài liệu hướng dẫn sử dụng tại đây !</a>--}}
{{--        @endif--}}
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{ url('theme/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ url('theme/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ url('theme/plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ url('theme/plugins/toastr/toastr.min.js') }}"></script>

<script type="text/javascript">
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });

    window.flashMessages = [];

    @if ($message = session('status'))
    toastr.success("{{ $message }}");

    @elseif ($message = session('warning'))
    toastr.warning("{{ $message }}");

    @elseif ($message = session('error'))
    toastr.error("{{ $message }}");

    @elseif ($message = session('info'))
    toastr.info("{{ $message }}");
    @endif

        toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
</body>
</html>
