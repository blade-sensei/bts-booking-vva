<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/vva.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/datepicker.css')}}">
    {{--<link rel="stylesheet" type="text/css" href="{{URL::asset('css/vva.css')}}">--}}

    <style type="text/css">
    </style>

</head>
<body>

    @include('templates.header')
    <div class="container-body">
        @yield('content')
    </div>
    @include('templates.footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="{{URL::asset('js/bootstrap-datepicker.js')}}"></script>
    <script scr="{{URL::asset('js/divers.js')}}"></script>

</body>
</html>