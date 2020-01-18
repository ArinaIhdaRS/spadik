<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SPADIK') }} - LOGIN</title>

    <!-- Styles -->
    <!-- <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' /> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/datepicker3.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/styles.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{ asset('assets/js/html5shiv.js')}}"></script>
    <script src="{{ asset('assets/js/respond.min.js')}}"></script>
    <![endif]-->

</head>
<body>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">Log in</div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <input class="form-control" placeholder="Username" name="username" type="text" value="{{ old('username') }}" required autofocus>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input class="form-control" placeholder="Password" name="password" type="password" required>

                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
</body>
</html>
