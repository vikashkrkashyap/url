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