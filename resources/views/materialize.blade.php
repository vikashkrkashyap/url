<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="{{URL::asset('materialize/css/materialize.min.css')}}"/>
        <link rel="stylesheet" href="{{URL::asset('font_awesome/css/font-awesome.min.css')}}"/>
        <link rel="stylesheet" href="{{URL::asset('plugin/animatecss/animate.css')}}"/>
        <link rel="stylesheet" href="{{URL::asset('plugin/morris/morris.css')}}"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <script type="text/javascript" src="{{URL::asset('external/js/jquery.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('materialize/js/materialize.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('plugin/morris/morris.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('plugin/knob/jquery.knob.js')}}"></script>
    </head>
    <body>
        @yield('content')
    </body>
</html>