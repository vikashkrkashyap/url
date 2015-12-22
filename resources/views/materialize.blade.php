<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{$data->title}}</title>
        <style>
            body *{  border-radius: 0px !important;  }
            </style>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="favicon.ico">
        <!--<link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic,900,900italic,300italic,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
         Global CSS -->
        <link rel="stylesheet" href="{{URL::asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
        <!-- Plugins CSS -->
        <link rel="stylesheet" href="{{URL::asset('assets/plugins/font-awesome/css/font-awesome.css')}}">
        <link rel="stylesheet" href="{{URL::asset('assets/plugins/flexslider/flexslider.css')}}">
        <link rel="stylesheet" href="{{URL::asset('plugin/morris/morris.css')}}"/>
        <!-- Theme CSS -->
        <link id="theme-style" rel="stylesheet" href="{{URL::asset('assets/css/styles.css')}}">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

        {{--<link rel="stylesheet" href="{{URL::asset('materialize/css/materialize.min.css')}}"/>--}}
        <link rel="stylesheet" href="{{URL::asset('font_awesome/css/font-awesome.min.css')}}"/>
        <link rel="stylesheet" href="{{URL::asset('plugin/animatecss/animate.css')}}"/>
        <link rel="stylesheet" href="{{URL::asset('plugin/morris/morris.css')}}"/>
        {{--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">--}}
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="{{URL::asset('external/js/jquery.js')}}"></script>
        {{--<script type="text/javascript" src="{{URL::asset('materialize/js/materialize.min.js')}}"></script>--}}
        <script type="text/javascript" src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('plugin/morris/morris.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('plugin/knob/jquery.knob.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('plugin/raphaeljs/raphael.min.js')}}"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    </head>
    <body>
        @yield('content')
    </body>
</html>