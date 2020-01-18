<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SPADIK') }} - @yield('title')</title>

    <!-- Styles -->
    <!-- <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' /> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('css')
    
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/datepicker3.css')}}" rel="stylesheet">
    

    <link href="{{ asset('assets/css/styles.css')}}" rel="stylesheet">
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
    <!--[if lt IE 9]>
    <script src="{{ asset('assets/js/html5shiv.js')}}"></script>
    <script src="{{ asset('assets/js/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body>
    @include('layouts.navbar')
        
    @include('layouts.sidebar')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        @yield('content')

        @include('layouts.footer')

    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/chart.min.js')}}"></script>
    <script src="{{ asset('assets/js/chart-data.js')}}"></script>
    <script src="{{ asset('assets/js/easypiechart.js')}}"></script>
    <script src="{{ asset('assets/js/easypiechart-data.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker.js')}}"></script>
    @yield('js')
    <script src="{{ asset('assets/js/custom.js')}}"></script>
</body>
</html>
