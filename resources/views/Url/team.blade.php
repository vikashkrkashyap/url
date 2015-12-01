@extends('main')
@section('main_content')
    <body class="about-page">
    <!-- ******HEADER****** -->
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
                        <li class="active nav-item"><a href="index.html">Home</a></li>
                        <li class="nav-item"><a href="features.html">Features</a></li>
                        <li class="nav-item"><a href="pricing.html">Pricing</a></li>
                        <li class="nav-item"><a href="login.html">Log in</a></li>
                        <li class="nav-item nav-item-cta last"><a class="btn btn-cta btn-cta-secondary" href="signup.html">Sign Up Free</a></li>
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </nav><!--//main-nav-->
        </div><!--//container-->
    </header><!--//header-->

    <div class="headline-bg about-headline-bg">
    </div><!--//headline-bg-->

    <!-- ******Video Section****** -->
    <section class="story-section section section-on-bg">
        <h2 class="title container text-center">Our story, our value</h2>
        <div class="story-container container text-center">
            <div class="story-container-inner" >
                <div class="about">
                    <p></p>
                    <blockquote class="belife">We empower startups to take better decisions by providing deep insights.</blockquote>
                </div><!--//about-->
                <div class="team row">
                    <h3 class="title">Meet the team</h3>
                    <div class="member col-md-4 col-sm-6 col-xs-12">
                        <div class="member-inner">
                            <figure class="profile">
                                <img class="img-responsive" src="https://avatars1.githubusercontent.com/u/10774138?v=3&s=400" alt=""/>
                                <figcaption class="info">
                                    <span class="name">Vikash Kumar Kashyap</span>
                                    <br />
                                    <span class="job-title">Co-Founder and CEO</span>

                                </figcaption>
                            </figure><!--//profile-->
                            <div class="social">
                                <ul class="social-list list-inline">
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                </ul><!--//social-list-->
                            </div><!--//social-->
                        </div><!--//member-inner-->
                    </div><!--//member-->
                    <div class="member col-md-4 col-sm-6 col-xs-12">
                        <div class="member-inner">
                            <figure class="profile">
                                <img class="img-responsive" src="https://avatars3.githubusercontent.com/u/3916999?v=3&s=400" alt=""/>
                                <figcaption class="info"><span class="name">Ashish Singh</span><br /><span class="job-title">Co-Founder</span></figcaption>
                            </figure><!--//profile-->
                            <div class="social">
                                <ul class="social-list list-inline">
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                </ul><!--//social-list-->
                            </div><!--//social-->
                        </div><!--//member-inner-->
                    </div><!--//member-->
                    <div class="member col-md-4 col-sm-6 col-xs-12">
                        <div class="member-inner">
                            <figure class="profile">
                                <img class="img-responsive" src="https://avatars1.githubusercontent.com/u/6409218?v=3&s=400" alt=""/>
                                <figcaption class="info"><span class="name">Sushant Kumar</span><br /><span class="job-title">Product/UX Designer</span></figcaption>
                            </figure><!--//profile-->
                            <div class="social">
                                <ul class="social-list list-inline">
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                </ul><!--//social-list-->
                            </div><!--//social-->
                        </div><!--//member-inner-->
                    </div><!--//member-->

                </div><!--//team-->
            </div><!--//story-container-->
        </div><!--//container-->
    </section><!--//story-video-->

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