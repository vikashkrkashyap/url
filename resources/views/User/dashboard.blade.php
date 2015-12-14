<?php $title = 'hi'; ?>
@extends('materialize')
        <!-- Navigation Header Start -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="{{URL::to('/images/logo_ucut.png')}}" width="45" style="margin-top: -10px;"/></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            {{--<ul class="nav navbar-nav">--}}
                {{--<li class="active"><a href="#"><i class="fa fa-dashboard"></i>&nbsp;Dashboard<span class="sr-only">(current)</span></a></li>--}}
            {{--</ul>--}}
            {{--<form class="navbar-form navbar-left" role="search">--}}
                {{--<div class="form-group">--}}
                    {{--<input type="text" class="form-control" placeholder="Search">--}}
                {{--</div>--}}
                {{--<button type="submit" class="btn btn-default">Submit</button>--}}
            {{--</form>--}}
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><i class="fa fa-pencil">&nbsp;</i>API Guide</a></li>
                <li><a href="#"><i class="fa fa-bar-chart-o">&nbsp;</i>Analytics</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>&nbsp{{Auth::user()->first_name}}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-user-secret"></i>&nbsp;Profile</a></li>
                        <li><a href="#"><i class="fa fa-cogs"></i>&nbsp;Settings</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{url('logout')}}"><i class="fa fa-power-off"></i>&nbsp;Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
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

<nav class="navbar navbar-inverse" style="margin-bottom: 0px !important;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-3">
                    <h4>UCUT</h4>
                    <p><a href="">Home</a></p>
                    <p><a href="">Pricing</a></p>
                    <p><a href="">Blog</a></p>
                </div>
                <div class="col-md-3">
                    <h4>ABOUT</h4>
                    <p><a href="">About Us</a></p>
                    <p><a href="">Services</a></p>
                    <p><a href="">Terms of Servies</a></p>
                </div>
                <div class="col-md-3">
                    <h4>HELP</h4>
                    <p><a href="">Help Center</a></p>
                    <p><a href="">Getting Started</a></p>
                    <p><a href="">Contact Us</a></p>
                </div>
                <div class="col-md-3">
                    <h4>CONNECT</h4>
                    <p><a href="">Facebook</a></p>
                    <p><a href="">Twitter</a></p>
                </div>
            </div>
        </div>

        <hr style="border-color: #333" />
        <h5 class="text-center">&copy; Ucut.in</h5>
    </div>
</nav>
<script type="text/javascript" src="{{url('external/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{url('external/js/dashboardUrlAjax.js')}}"></script>
<script type="text/javascript" src="{{url('external/js/hits.js')}}"></script>
