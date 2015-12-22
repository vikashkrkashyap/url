<?php $title = 'hi'; ?>
@extends('materialize')
        <!-- Navigation Header Start -->
@include('partial.user_header');
        <!-- Navigation Header Ends -->

<div class="container" style="margin-bottom: 0px !important;">
    <form class="form-inline" method="post" id ="urlForm" action="{{url('postAjaxData')}}">
        <div class="form-group">
            <input type="text" class="form-control" id="user_url" name="user_url" placeholder="Enter Your Messed URL" style="width: 1000px">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        </div>
        <button type="submit" id="url_submit" class="btn btn-success">Short&nbsp;&nbsp;<i class="fa fa-cut"></i></button>
    </form>
        {{--<form class="col s12" method="post" id ="urlForm" action="{{url('postAjaxData')}}">--}}
                {{--<div class="input-field col s10">--}}
                    {{--<input id="user_url" type="text" class="validate" name="user_url">--}}
                    {{--<input type="hidden" name="user_id" value="{{Auth::user()->id}}">--}}
                    {{--<label for="user_url">Enter Your Messed URL</label>--}}
                {{--</div>--}}
                    {{--<button class="btn waves-effect waves-light" id="url_submit" style="margin-top:13px" type="submit" name="action">Submit--}}
                        {{--<i class="material-icons right">send</i>--}}
                    {{--</button>--}}
        {{--</form>--}}
</div>
<div class="col-md-12">
    <div class="col-md-2">
        <ul class="nav nav-pills nav-stacked">
            <li role="presentation" class="active"><a href="#"><i class="fa fa-link pull-right"></i>Your CutLinks</a></li>
            <li role="presentation"><a href="#"><i class="fa fa-bar-chart pull-right"></i>Stats</a></li>
        </ul>
    </div>
    <div class="col-md-4">
        <ul class="list-group" id="collection-holder">
            <li class="list-group-item" id="create-progress-card" style="display: none">
                <a href="#"><i class="fa fa-bar-chart fa-2x pull-right" title="View Stats" style="font-size: 1.39em !important;"></i></a>
                <span class="badge primary">0</span>
                <a href="#" target="_blank" style="text-underline: none"><i class="fa fa-circle-o-notch fa-spin"></i>&nbsp;</a><br />
                <small><b></b></small><br/>
                <small><i class="fa fa-circle-o-notch fa-spin"></i></small>
            </li>
            @foreach($url_data as $url)
            <li class="list-group-item">
                <a href="#" ><i data-url-id="{{$url->id}}" class="fa fa-bar-chart fa-2x pull-right show_stats" title="View Stats" style="font-size: 1.39em !important;"></i></a>
                <span class="badge primary">{{\App\Key::find($url->id)->hits()->count()}}</span>
                <a href="{{ URL::to('/').'/'.$url->key}}" target="_blank" style="text-underline: none">{{ URL::to('/').'/'.$url->key}}</a><br />
                <small><b>{{$url->url}}</b></small><br/>
                <small>{{ $url->title}}</small>
            </li>
            @endforeach
            {!! $url_data->render() !!}
        </ul>
    </div>
    <div class="col-md-6" id="chart-container">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">

                {{ date('dS F y',strtotime(@$recent_url->created_at))}}
                <a href="#"><i class="fa fa-share pull-right" title="Share"></i></a>
                <a href="#"><i class="fa fa-pencil pull-right" title="Edit"></i></a>
                <a href="#"><i class="fa fa-tag pull-right" title="Tag"></i></a>
            </div>
            <div class="panel-body">
                <div>
                    <h5>{{@$recent_url->title}}</h5>
                    <span class="copy_link" >{{\Illuminate\Support\Facades\URL::to('/').'/'.@$recent_url->key}}</span>
                    <button class="btn btn-danger copy_button" type="button" name="action" style="height: 18px;line-height: 0px; padding: 3px;font-size: 10px;">Copy</button>
                </div>
                <div style="margin-top: 5px;">
                    <div class="btn-group" id="chart-button-holder">
                    {{--<input type="text" value="75" data-min="0" data-max="75" data-thickness=".1" data-skin="tron" data-width="120" class="dial">--}}
                    <button class="bar-chart-button btn btn-primary active" data-type="day" type="button">Day</button>
                    <button class="bar-chart-button btn btn-primary" data-type="week" type="button">Week</button>
                    <button class="bar-chart-button btn btn-primary" data-type="month" type="button">Month</button>
                    <button class="bar-chart-button btn btn-primary" data-type="year" type="button">Year</button>
                    {{--<button class="bar-chart-button btn btn-primary pull-right" data-type="all" type="button">All</button>--}}
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-success dropdown-toggle disabled" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-pie-chart"></i>&nbsp;Chart <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-bar-chart"></i>&nbsp;Bar Chart</a></li>
                            <li><a href="#"><i class="fa fa-line-chart"></i>&nbsp;Line Chart</a></li>
                            <li><a href="#"><i class="fa fa-area-chart"></i>&nbsp;Area Chart</a></li>
                        </ul>
                    </div>
                    <div data-day="{{@$hits_today_by_time}}" data-week="{{@$hits_per_week_by_day}}" data-month="{{@$hits_per_month}}" data-year="{{@$hits_per_year}}" id="link-bar-chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s4">
        <div class="col s12" id="collection-holder">
            <!-- Promo Content 1 goes here -->
                <div class="progress" id="create-url-progress" style="display: none;">
                    <div class="indeterminate"></div>
                </div>
        </div>
    </div>
</div>

    <div id="msg"></div>
    <input type="button" value="copy" id="copy" style="display:none ">

{{--<hr>--}}
<input type="hidden" id="url" value="{{url('hits')}}" class="list">

<footer class="footer">
    <div class="footer-content">
        <div class="container">
            <div class="row">
                <div class="footer-col links col-md-2 col-sm-4 col-xs-12">
                    <div class="footer-col-inner">
                        <h3 class="title">About us</h3>
                        <ul class="list-unstyled">
                            <li><a href="http://localhost/ucut/public/team"><i class="fa fa-caret-right"></i>Who we are</a></li>
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
                            <li><a href="https://facebook.com/ucutindia"><i class="fa fa-facebook"></i></a></li>
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
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

        </div><!--//container-->
    </div><!--//footer-content-->
    <div class="bottom-bar">
        <div class="container">
            <small class="copyright">Copyright @ 2015 | Ucut.in</small>
        </div>
    </div>
</footer>
<script type="text/javascript" src="{{url('external/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{url('external/js/dashboardUrlAjax.js')}}"></script>
<script type="text/javascript" src="{{url('external/js/hits.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('plugin/morris/morris.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('plugin/knob/jquery.knob.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('plugin/raphaeljs/raphael.min.js')}}"></script>
