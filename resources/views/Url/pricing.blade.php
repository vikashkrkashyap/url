@extends('main')
@section('main_content')
    <body class="pricing-page">
    <header id="header" class="header navbar-fixed-top">
        <div class="container">
            <h1 class="logo">
                <a href="index.html"><img src="assets/images/logo-ucut.png" style="height:70px"></a>
            </h1><!--//logo-->
            <nav class="main-nav navbar-right" role="navigation">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><!--//nav-toggle-->
                </div><!--//navbar-header-->
                <div id="navbar-collapse" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"><a href="{{action('UrlController@index')}}">Home</a></li>
                        <li class="nav-item"><a href="{{action('UrlController@features')}}">Features</a></li>
                        <li class="active nav-item"><a href="{{action('UrlController@pricing')}}">Pricing</a></li>
                        <li class="nav-item"><a href="{{URL::to('login')}}">Log in</a></li>
                        <li class="nav-item nav-item-cta last"><a class="btn btn-cta btn-cta-secondary" href="{{URL::to('register')}}">Sign Up Free</a></li>
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </nav><!--//main-nav-->
        </div><!--//container-->
    </header><!--//header-->

    <div class="headline-bg pricing-headline-bg">
    </div><!--//headline-bg-->

    <!-- ******Pricing Section****** -->
    <section class="pricing section section-on-bg">
        <div class="container">
            <h2 class="title text-center">Our Pricing Depends on your business</h2>
            <p class="intro text-center"> We have custom pricing depending on the way you are looking to use our services. </p>
            <p class="text-center"><a class="btn btn-cta btn-cta-primary" href="contact.html"> REQUEST A CALL </a> </p>
        </div><!--//container-->
    </section><!--//pricing-->

    @include('partial.footer')

    <!-- Javascript -->
    <script type="text/javascript" src="{{URL::asset('assets/plugins/jquery-1.11.2.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/plugins/jquery-migrate-1.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/plugins/bootstrap-hover-dropdown.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/plugins/back-to-top.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/plugins/jquery-placeholder/jquery.placeholder.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/plugins/FitVids/jquery.fitvids.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/plugins/flexslider/jquery.flexslider-min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/js/main.js')}}"></script>


    </body>

   @stop