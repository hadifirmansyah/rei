{{-- {!! Form::open(['route' => 'auth.login.post']) !!}
    {!! Form::email('email', null, ['placeholder' => 'example@example.com']) !!}
    {!! Form::password('password', ['placeholder' => 'Password']) !!}
    {!! Form::submit('Login') !!}
{!! Form::close() !!} --}}

<!doctype html>
<html lang="en" class="fullscreen-bg">

    <head>
        <title>{{ config('app.name') }} - Login</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <!-- VENDOR CSS -->
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/linearicons/style.css') }}" rel="stylesheet">
        <!-- MAIN CSS -->
        <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
        <!-- ICONS -->
        <link rel="shortcut icon" href="{{ asset('assets/img/icon.png') }}">

        <style>
            .auth-box {
                width: 30%;
            }
            .auth-box .left {
                width: 100%;
            }
            .form-horizontal .form-group {
                margin-right: 0;
                margin-left: 0;
            }
        </style>
    </head>
    <body>
        <!-- WRAPPER -->
        <div id="wrapper">
            <div class="vertical-align-wrap">
                <div class="vertical-align-middle">
                    <div class="auth-box ">
                        <div class="left">
                            <div class="content">
                                <div class="header">
                                    <div class="logo text-center"><img src="{{ asset('assets/img/rei-logo.png') }}" alt="Logo"></div>
                                    <p class="lead">Login to your account</p>
                                </div>
                                {!! Form::open(['route' => 'auth.login.post', 'class' => 'form-horizontal']) !!}
                                @include('flash::message')
                                    <div class="form-group">
                                        <label for="email" class="control-label sr-only">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>
                                        @if ($errors->has('email'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="control-label sr-only">Password</label>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                                        @if ($errors->has('password'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group clearfix">
                                        <label class="fancy-checkbox element-left">
                                            <input name="remember_me" type="checkbox">
                                            <span>Remember me</span>
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                    {{-- <div class="bottom">
                                        <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
                                    </div> --}}
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END WRAPPER -->
    </body>

</html>