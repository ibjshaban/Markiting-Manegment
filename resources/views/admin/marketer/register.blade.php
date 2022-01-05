<!DOCTYPE html>
<html lang="{{app('l')}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ trans('admin.login_page') }}</title>
    <!-- Google Font: Source Sans Pro -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('assets') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ url('assets') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap 4 RTL -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
    <!-- Custom style for RTL -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('assets') }}/css/adminlte.min.css">
    @if(!empty(setting()->icon))
        <link rel="shortcut icon" href="{{ it()->url(setting()->icon) }}"/>
    @endif
    <link rel="stylesheet" href="{{ url('assets') }}/css/cairo.css">
</head>
<body class="hold-transition login-page">

<div class="register-box">
    <div class="card card-outline card-primary pb-2">
        <div class="card-header text-center">
            <a href="{{ route('marketer_register') }}" class="h1"><b>{{ trans('admin.register') }}</b></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">{{ trans('admin.new_register') }}</p>

            <form action="{{ route('marketer_register') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="first_name_ar" class="form-control" placeholder="{{ trans('admin.first_name_'.app('l')) }}" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="last_name_ar" class="form-control" placeholder="{{ trans('admin.last_name_'.app("l")) }}" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="{{ trans('admin.email') }}" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="{{ trans('admin.password') }}" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="number" name="mobile" class="form-control" placeholder="{{ trans('admin.mobile') }}" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-mobile"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="address_ar" class="form-control" placeholder="{{ trans('admin.address') }}" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-location-arrow"></span>
                        </div>
                    </div>
                </div>
            {{--<div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Retype password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>--}}

            <!-- /.col -->
                <div class="col-6 text-center m-auto">
                    <button type="submit" class="btn btn-primary btn-block">{{ trans('admin.register') }}</button>
                </div>
                <!-- /.col -->
            </form>

            <a href="{{ url('marketer/login') }}" class="col-6 text-center m-auto"
               style="margin: 30%">{{ trans('admin.have_account') }}</a>
        </div>
    </div>
    <!-- /.form-box -->
</div><!-- /.card -->
</div>

<!-- jQuery -->
<script src="{{ url('assets') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('assets') }}/js/adminlte.min.js"></script>
</body>
</html>
