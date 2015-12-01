@extends('main')
@section('main_content')
<body class="home-page">
<!-- ******HEADER****** -->
@include('partial.header')

<div class="bg-slider-wrapper">
    <div class="flexslider bg-slider">
        <ul class="slides">
            <li class="slide slide-2"></li>
        </ul>
    </div>
</div><!--//bg-slider-wrapper-->

<section class="promo section section-on-bg">
    <div class="container text-center">
        <h2 class="title">GET THE BEST OUT OF YOUR LINKS <br /></h2>
        <p class="intro">Own, understand and activate your audience <a href="#"> Learn More</a></p>

        <form action="{{url('show')}}" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"   novalidate>
            {!! csrf_field() !!}
                <div class="input-group url">
                    <input type="url" name="input_data"  id="mce-EMAIL" class="form-control" aria-label="..." placeholder="Enter the URL" autocomplete="off" autocorrect="off"
                           required>
                    <input type="hidden" value="1" name="user_id">
                    <div class="input-group-btn">
                        <input name="subscribe" id="url_submit" type="submit" class="btn btn-cta btn-cta-primary" href="#" value="Short it"/>
                    </div>
                </div>
            </form>

    </div><!--//container-->
</section><!--//promo-->

<div class="sections-wrapper">

    <!-- ******Why Section****** -->
    <section id="why" class="section why">
        <div class="container">
            <div class="one-link">
                <h3 class="title text-center"> One Link for app download </h3>
                <p class="intro text-center"> Create one link for Android, Windows and iOS which works according to device type </p>
                <div class="col-md-offset-2 col-md-10">
                    <img class="img-responsive" src="assets/images/one-link.png">
                    <figure class="figure col-md-7 col-sm-12 col-xs-12 col-md-pull-4 col-sm-pull-0 col-xs-pull-0">

                    </figure>
                </div>
            </div>
            <h2 class="title text-center">Its more than a link shortner</h2>
            <p class="intro text-center">We provide deep analytics which can drive engagement and boost your CTR</p>
            <div class="row item">
                <div class="content col-md-4 col-sm-12 col-xs-12">
                    <h3 class="title">Discover Your Audience</h3>
                    <div class="desc">
                        <p>Get the complete analysis of hits on your links. You can understand your audience and drive engagement in a better way.</p>
                        <p>Check real time metrics, discover audience and capture leads. </p>
                    </div>
                </div><!--//content-->
                <figure class="figure col-md-8 col-sm-12 col-xs-12 col-sm-offset-0 col-xs-offset-0">
                    <div class="chart-hits" id="chart_div" style="width: 750px; height: 400px;"></div>
                    <figcaption class="figure-caption">  </figcaption>
                </figure>
            </div><!--//item-->

            <div class="row item">
                <div class="content col-md-4 col-sm-12 col-xs-12 col-md-push-8 col-sm-push-0 col-xs-push-0">
                    <h3 class="title">Tracking and Analytics</h3>
                    <div class="desc">
                        <p> Get to know about the geographical insights which will help you in targeting the best audience for your content.</p>
                        <p> </p>
                    </div>

                </div><!--//content-->
                <figure class="figure col-md-7 col-sm-12 col-xs-12 col-md-pull-4 col-sm-pull-0 col-xs-pull-0">
                    <div id="regions_div" style="width: 600px; height: 400px;"></div>
                </figure>
            </div><!--//item-->

            <div class="row item ">
                <div class="content col-md-4 col-sm-12 col-xs-12">
                    <h3 class="title"> Audience Engagement </h3>
                    <div class="desc">
                        <p>Social is everything. Understand your social engagement, and get insights into your digital marketing strategy. </p>
                        <p>The best way to have an impact online is to create and share great content. We help you in exactly the same.</p>
                    </div>
                </div><!--//content-->
                <figure class="figure col-md-7 col-sm-12 col-xs-12 col-md-offset-1 col-sm-offset-0 col-xs-offset-0">
                    <div id="piesocialchart" class="chart-hits" style="width: 750px; height: 500px;"></div>

                </figure>
            </div><!--//item-->

        </div><!--//container-->
    </section><!--//why-->

    <!-- ******CTA Section****** -->
    <section id="cta-section" class="section cta-section text-center home-cta-section">
        <div class="container">
            <h2 class="title">Ready to promote your branded short domains ?</h2>
            <p class="intro">More than <span class="counting">1300</span> users are using Ucut</p>
            <p><a class="btn btn-cta btn-cta-primary" href="signup.html">Get Started</a></p>
        </div><!--//container-->
    </section><!--//cta-section-->

</div>

<!-- ******FOOTER****** -->
@include('partial.footer')

<!-- Javascript -->
<script type="text/javascript" src="{{URL::asset('assets/plugins/jquery-1.11.2.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/plugins/bootstrap-hover-dropdown.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/plugins/back-to-top.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/main.js')}}"></script>
</body>
    @stop