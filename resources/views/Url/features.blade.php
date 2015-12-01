@extends('main')
@section('main_content')
<body class="features-page">
<!-- ******HEADER****** -->
@include('partial.header')
<div class="headline-bg">
</div><!--//headline-bg-->

<!-- ******Video Section****** -->
<section class="features-video section section-on-bg">
    <div class="container text-center">
        <h2 class="title">Take a quick tour to see how it works</h2>
        <!--<div class="video-container">
            <iframe src="http://player.vimeo.com/video/90299717?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="720" height="405" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>//video-container-->
    </div><!--//container-->
</section><!--//feature-video-->

<!-- ******Features Section****** -->
<section class="features-tabbed section">
    <div class="container">
        <h2 class="title text-center">Product Features</h2>
        <div class="row">
            <div class=" text-center col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs text-center" role="tablist">
                    <li class="active"><a href="#feature-1" role="tab" data-toggle="tab"><i class="fa fa-cloud-upload"></i><br /><span class="hidden-sm hidden-xs">Custom Domain</span></a></li>
                    <li><a href="#feature-2" role="tab" data-toggle="tab"><i class="fa fa-tachometer"></i><br /><span class="hidden-sm hidden-xs">Deep Analytics</span></a></li>
                    <li><a href="#feature-3" role="tab" data-toggle="tab"><i class="fa fa-photo"></i><br /><span class="hidden-sm hidden-xs">Custom Keyword</span></a></li>
                    <li class="last"><a href="#feature-4" role="tab" data-toggle="tab"><i class="fa fa-users"></i><br /><span class="hidden-sm hidden-xs">One Link</span></a></li>
                </ul><!--//nav-tabs-->

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="feature-1">
                        <h3 class="title sr-only">Feature One</h3>
                        <!-- <figure class="figure text-center">
                            <img class="img-responsive" src="assets/images/features/screenshot-1.png" alt="" />
                            <figcaption class="figure-caption">(Custom Domain)</figcaption>
                        </figure> -->
                        <div class="desc text-left">
                            <p>Use your own custom domain to  Nunc congue leo mauris, a fringilla nisi posuere tincidunt. Aliquam elementum lorem eget sollicitudin suscipit.</p>
                            <p>Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.</p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-star"></i>Lorem ipsum dolor sit amet.</li>
                                <li><i class="fa fa-star"></i>Aliquam tincidunt mauris eu risus.</li>
                                <li><i class="fa fa-star"></i>Ultricies eget vel aliquam libero.</li>
                                <li><i class="fa fa-star"></i>Maecenas nec odio.</li>
                            </ul>

                            <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. </p>
                        </div><!--//desc-->
                    </div><!--//tab-pane-->
                    <div class="tab-pane" id="feature-2">
                        <h3 class="title sr-only">Feature Two</h3>
                        <!--  <figure class="figure text-center">
                             <img class="img-responsive" src="assets/images/features/screenshot-2.png" alt="" />
                             <figcaption class="figure-caption">(Screenshot source: Coral - App &amp; website startup kit)</figcaption>
                         </figure> -->
                        <div class="desc text-left">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc congue leo mauris, a fringilla nisi posuere tincidunt. Aliquam elementum lorem eget sollicitudin suscipit.</p>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis id nulla at libero ultricies tempus. Duis porta justo quam, ut ultrices felis posuere sit amet. Sed imperdiet bibendum est, sit amet sagittis ante sagittis eu. <a href="#">Integer fringilla</a> a purus sit amet laoreet. Ut consequat volutpat sapien sed lobortis. Nullam laoreet vitae justo nec dignissim.
                            </p>
                            <blockquote>
                                <p>Viverra magna pellentesque in magnis gravida sit augue felis vehicula vestibulum semper penatibus justo ornare semper Gravida felis platea arcu mus non. Montes at posuere. Natoque.</p>
                            </blockquote>

                        </div><!--//desc-->
                    </div><!--//tab-pane-->
                    <div class="tab-pane" id="feature-3">
                        <h3 class="title sr-only">Feature Three</h3>
                        <!-- <figure class="figure text-center">
                            <img class="img-responsive" src="assets/images/features/screenshot-3.png" alt="" />
                            <figcaption class="figure-caption">(Screenshot source: Coral - App &amp; website startup kit)</figcaption>
                        </figure> -->
                        <div class="desc text-left">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc congue leo mauris, a fringilla nisi posuere tincidunt. Aliquam elementum lorem eget sollicitudin suscipit.</p>

                            <p>Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. </p>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nullam consequat</th>
                                        <th>Commodo metus</th>
                                        <th>Dapibus porta</th>
                                        <th>Sed porta</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Faucibus purus</td>
                                        <td>Aliquam sit</td>
                                        <td>Sed porta leo</td>
                                        <td>Duis ut ornare dui</td>
                                    </tr>
                                    <tr>
                                        <td>Condimentum</td>
                                        <td>Curabitur tempus</td>
                                        <td>Fusce vehicula</td>
                                        <td>Nasceturs</td>
                                    </tr>
                                    <tr>
                                        <td>Neque a condimentum</td>
                                        <td>Cum sociis natoque</td>
                                        <td>Penatibus magnis</td>
                                        <td>Curabitur</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->
                        </div><!--//desc-->
                    </div><!--//tab-pane-->
                    <div class="tab-pane" id="feature-4">
                        <h3 class="title sr-only">Feature Four</h3>
                        <!--  <figure class="figure text-center">
                             <img class="img-responsive" src="assets/images/features/screenshot-4.png" alt="" />
                             <figcaption class="figure-caption">(Screenshot source: Coral - App &amp; website startup kit)</figcaption>
                         </figure> -->
                        <div class="desc text-left">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc congue leo mauris, a fringilla nisi posuere tincidunt. Aliquam elementum lorem eget sollicitudin suscipit.</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu</p>
                            <p class="box">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis id nulla at libero ultricies tempus. Duis porta justo quam, ut ultrices felis posuere sit amet. Sed imperdiet bibendum est, sit amet sagittis ante sagittis eu. Ut consequat volutpat sapien sed lobortis. Nullam laoreet vitae justo nec dignissim.
                            </p>
                        </div><!--//desc-->
                    </div><!--//tab-pane-->
                </div><!--//tab-content-->
            </div><!--//col-md-x-->
        </div><!--//row-->
    </div><!--//container-->
</section><!--//features-tabbed-->

<!-- ******Steps Section****** -->
<section class="steps section">
    <div class="container">
        <h2 class="title text-center">3 Simple Steps to Get you started with Velocity</h2>
        <div class="row">
            <div class="step text-center col-md-4 col-sm-4 col-xs-12">
                <h3 class="title"><span class="number">1</span><br /><span class="text">Sign up</span></h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
            </div><!--//step-->
            <div class="step text-center col-md-4 col-sm-4 col-xs-12">
                <h3 class="title"><span class="number">2</span><br /><span class="text">Choose your lorem ipsum</span></h3>
                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
            </div><!--//step-->
            <div class="step text-center col-md-4 col-sm-4 col-xs-12">
                <h3 class="title"><span class="number">3</span><br /><span class="text">Start building ipsum</span></h3>
                <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet.</p>
            </div><!--//step-->
        </div><!--//row-->

        <div class="text-center"><a class="btn btn-cta btn-cta-primary" href="signup.html">Get Started - It's Free</a></div>

    </div><!--//container-->
</section><!--//steps-->

<!-- ******FOOTER****** -->
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