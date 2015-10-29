<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>UCUT - CUT YOUR URL</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{url('template/css/default.css')}}">
    <link rel="stylesheet" href="{{url('template/css/layout.css')}}">
    <link rel="stylesheet" href="{{url('template/css/media-queries.css')}}">

    <script src="{{url('template/js/modernizr.js')}}"></script>
    <link rel="shortcut icon" href="{{url('template/favicon.png')}}" >

</head>

<body>


<div id="preloader">
    <div id="status">
        <img src="{{url('template/images/preloader.gif')}}" height="64" width="64" alt="">
    </div>
</div>

<!-- Intro Section ================================================== -->
<section id="intro">

    <header class="row">

        <div id="logo" >
            <h2 style="color:#fff;"> Ucut.in </h2>
        </div>

        <nav id="nav-wrap">

            <a class="menu-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
            <a class="menu-btn" href="#" title="Hide navigation">Hide navigation</a>

            <ul id="nav" class="nav">
                <li class="current"><a class="smoothscroll" href="#home">Home</a></li>
                <li><a class="smoothscroll" href="#about">About</a></li>
                <li><a class="smoothscroll" href="#Features">Features</a></li>
            </ul> <!-- end #nav -->

        </nav> <!-- end #nav-wrap -->

    </header> <!-- Header End -->

    <div  id="main" class="row">

        <div class="twelve columns">

            <h1>Simply cut your URL !</h1>

            <p>We provide you with deep analytics and </p>


            <div id="mc_embed_signup">
                <form action="{{url('show')}}" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate"  novalidate>
                    {!! csrf_field() !!}

                    <input type="url" name="input_data"  id="mce-EMAIL" placeholder="URL Please" required="required">
                    <input type="hidden" value="1" name="user_id">
                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;">
                        <input type="text" name="b_cdb7b577e41181934ed6a6a44_e65110b38d" value=""></div>

                    <!-- <div class="clear"> -->
                    <input type="submit" value="Cut It" name="subscribe" id="url_submit" class="button"><!-- </div> -->

                </form>
                <div id="container" style="margin-left:15.5%;">
                <div id="msg" style="margin-left:10px;margin-top:10px;font-size:17px;float:left"></div>
               <!--<button id="copy" onclick="copyToClipboard('#msg')"
                       style="width:60px;height:30px;padding:5px 7px;display:none;float:left;margin:10px 7px;">Copy</button>
                   --> </div>
            </div>


            </div>

          <ul class="social">
                <li><a href="https://www.facebook.com/ucutindia/"><i class="fa fa-facebook"></i></a></li>
              <!--  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fa fa-skype"></i></a></li>-->
            </ul>

        </div>

    </div> <!-- main end -->

</section> <!-- end intro section -->
<!-- footer
================================================== -->
<footer>

    <div class="row">

        <div class="twelve columns">

            <ul class="copyright">
                <li>&copy; Copyright 2015 Ucut</li>
                <li>Design by <a title="Styleshout" href="http://www.styleshout.com/">Styleshout</a></li>
            </ul>

        </div>

    </div>

    <div id="go-top"><a class="smoothscroll" title="Back to Top" href="#intro"><i class="icon-up-open"></i></a></div>

</footer> <!-- Footer End-->

<!-- Java Script
================================================== -->
<script src="{{url('external/js/jquery.js')}}"></script>
<script type="text/javascript" src ="{{url('external/js/ajaxHomeUrl.js')}}"></script>
<script>window.jQuery || document.write('<script src="{{url('template/js/jquery-1.10.2.min.js')}}"><\/script>')</script>
<script type="text/javascript" src="{{url('template/js/jquery-migrate-1.2.1.min.js')}}"></script>

<script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
<script src="{{url('template/js/gmaps.js')}}"></script>
<script src="{{url('template/js/waypoints.js')}}"></script>
<script src="{{url('template/js/jquery.countdown.js')}}"></script>
<script src="{{url('template/js/jquery.placeholder.js')}}"></script>
<script src="{{url('template/js/backstretch.js')}}"></script>
<script src="{{url('template/js/init.js')}}"></script>


</body>

</html>















