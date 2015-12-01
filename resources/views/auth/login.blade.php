<?php $title = 'UCUT | Login' ?>
@extends('main')
<body class="login-page access-page has-full-screen-bg">
<div class="upper-wrapper">
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
            </nav><!--//main-nav-->
        </div><!--//container-->
    </header><!--//header-->

    <!-- ******Login Section****** -->
    <section class="login-section access-section section">
        <div class="container">
            <div class="row">
                <div class="form-box col-md-8 col-sm-12 col-xs-12 col-md-offset-2 col-sm-offset-0 xs-offset-0">
                    <div class="form-box-inner">
                        <h2 class="title text-center">Log in to Ucut</h2>
                        <div class="row">
                            <div class="form-container col-md-5 col-sm-12 col-xs-12">
                                <form class="login-form" method="POST" action="{{url('login')}}">
                                    {!! csrf_field() !!}
                                    @if (count($errors) > 0)
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <div class="form-group email">
                                        <label class="sr-only" for="login-email">Email or username</label>
                                        <input id="login-email" type="email" name="email" value="{{ old('email') }}" class="form-control login-email" placeholder="Email or username">
                                    </div><!--//form-group-->
                                    <div class="form-group password">
                                        <label class="sr-only" for="login-password">Password</label>
                                        <input id="login-password" name="password" type="password" class="form-control login-password" placeholder="Password">
                                        <p class="forgot-password"><a href="reset-password.html">Forgot password?</a></p>
                                    </div><!--//form-group-->
                                    <button type="submit" class="btn btn-block btn-cta-primary">Log in</button>
                                    <div class="checkbox remember">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember me
                                        </label>
                                    </div><!--//checkbox-->
                                    <p class="lead">Don't have a Ucut account yet? <br /><a class="signup-link" href="signup.html">Create your account now</a></p>
                                </form>
                            </div><!--//form-container-->
                            <div class="social-btns col-md-5 col-sm-12 col-xs-12 col-md-offset-1 col-sm-offset-0 col-sm-offset-0">
                                <div class="divider"><span>Or</span></div>
                                <ul class="list-unstyled social-login">
                                    <li><button class="twitter-btn btn" type="button"><i class="fa fa-twitter"></i>Log in with Twitter</button></li>
                                    <li><button class="facebook-btn btn" type="button"><i class="fa fa-facebook"></i>Log in with Facebook</button></li>
                                    <li><button class="github-btn btn" type="button"><i class="fa fa-github-alt"></i>Log in with Github</button></li>
                                    <li><button class="google-btn btn" type="button"><i class="fa fa-google-plus"></i>Log in with Google</button></li>
                                </ul>
                            </div><!--//social-btns-->
                        </div><!--//row-->
                    </div><!--//form-box-inner-->
                </div><!--//form-box-->
            </div><!--//row-->
        </div><!--//container-->
    </section><!--//contact-section-->
</div><!--//upper-wrapper-->

<!-- ******FOOTER****** -->
<footer class="footer">
    <div class="footer-content">
        <div class="container">
            <div class="row">
                <div class="footer-col links col-md-2 col-sm-4 col-xs-12">
                    <div class="footer-col-inner">
                        <h3 class="title">About us</h3>
                        <ul class="list-unstyled">
                            <li><a href="about.html"><i class="fa fa-caret-right"></i>Who we are</a></li>
                            <li><a href="jobs.html"><i class="fa fa-caret-right"></i>Careers</a></li>
                            <li><a href="contact.html"><i class="fa fa-caret-right"></i>Contact us</a></li>
                        </ul>
                    </div><!--//footer-col-inner-->
                </div><!--//foooter-col-->
                <div class="footer-col links col-md-2 col-sm-4 col-xs-12">
                    <div class="footer-col-inner">
                        <h3 class="title">Product</h3>
                        <ul class="list-unstyled">
                            <li><a href="features.html"><i class="fa fa-caret-right"></i>How it works</a></li>
                            <li><a href="pricing.html"><i class="fa fa-caret-right"></i>Pricing</a></li>
                        </ul>
                    </div><!--//footer-col-inner-->
                </div><!--//foooter-col-->
                <div class="footer-col links col-md-2 col-sm-4 col-xs-12 sm-break">
                    <div class="footer-col-inner">
                        <h3 class="title">Support</h3>
                        <ul class="list-unstyled">
                            <li><a href="contact.html"><i class="fa fa-caret-right"></i>Help</a></li>
                            <li><a href="terms.html"><i class="fa fa-caret-right"></i>Terms of services</a></li>
                            <li><a href="privacy.html"><i class="fa fa-caret-right"></i>Privacy</a></li>
                        </ul>
                    </div><!--//footer-col-inner-->
                </div><!--//foooter-col-->
                <div class="footer-col connect col-md-6 col-sm-12 col-xs-12">
                    <div class="footer-col-inner">
                        <ul class="social list-inline">
                            <li><a href="https://twitter.com/3rdwave_themes" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li class="row-end"><a href="#"><i class="fa fa-rss"></i></a></li>
                        </ul>
                        <div class="form-container">
                            <p class="intro">Stay up to date with the latest news and offers from Velocity</p>
                            <form class="signup-form navbar-form">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter your email address">
                                </div>
                                <button type="submit" class="btn btn-cta btn-cta-primary">Subscribe Now</button>
                            </form>
                        </div><!--//subscription-form-->
                    </div><!--//footer-col-inner-->
                </div><!--//foooter-col-->
                <div class="clearfix"></div>
            </div><!--//row-->

        </div><!--//container-->
    </div><!--//footer-content-->
    <div class="bottom-bar">
        <div class="container">
            <small class="copyright">Copyright @ 2015 | Ucut.in</small>
        </div>
    </div>
</footer>

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