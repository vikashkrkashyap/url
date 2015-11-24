@extends('materialize')
        <!-- Navigation Header Start -->
<ul id="dropdown1" class="dropdown-content">
    <li><a href="#!"><i class="large material-icons left">assignment_ind</i>Profile</a></li>
    <li><a href="#!"><i class="large material-icons left">settings</i>Settings</a></li>
    <li class="divider"></li>
    <li><a href="{{url('logout')}}"><i class="large material-icons left">power_settings_new</i>Logout</a></li>
</ul>
<nav>
    <div class="nav-wrapper">
        {{--<a href="#!" class="brand-logo">LOGO</a>--}}
        <ul class="left hide-on-med-and-down">
            <li><a href="#!"><i class="large material-icons left">view_quilt</i>Dashboard</a></li>
        </ul>
        <ul class="right hide-on-med-and-down">
            <li><a href="#!"><i class="large material-icons left">trending_up</i>Analytics</a></li>
            <li><a href="#!"><i class="large material-icons left">library_books</i>API Docs</a></li>
            <!-- Dropdown Trigger -->
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="large material-icons left">perm_identity</i>{{Auth::user()->first_name}}<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
    </div>
</nav>
        <!-- Navigation Header Ends -->

<div class="row container" style="margin-bottom: 0px !important;">
        <form class="col s12" method="post" id ="urlForm" action="{{url('postAjaxData')}}">
                <div class="input-field col s10">
                    <input id="last_name" type="text" class="validate" name="user_url">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <label for="user_url">Enter Your Messed URL</label>
                </div>
                    <button class="btn waves-effect waves-light" id="url_submit" style="margin-top:13px" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
        </form>
</div>
<div class="row">
    <div class="col s2">
        <!-- Promo Content 1 goes here -->
        <div class="collection" style="border:none !important;border-bottom: 1px solid #e0e0e0 !important;">
            <a href="#!" class="collection-item active">Your CutLinks<i class="small fa fa-link right" style="line-height: 24px"></i></a>
            <a href="#!" class="collection-item">Stats<i class="small fa fa-area-chart right" style="line-height: 24px"></i></a>
        </div>
    </div>
    <div class="col s4">
        <div class="col s12" id="collection-holder">
            <!-- Promo Content 1 goes here -->
                <div class="progress" id="create-url-progress" style="display: none;">
                    <div class="indeterminate"></div>
                </div>
            @foreach($url_data as $url)
            <div class="collection" style="word-wrap: break-word">
                <small style="border-bottom: 1px solid #e0e0e0; width:100%">{{ $url->title}}</small>
                <a href="#"  data="{{$url->id}}" target="_blank" class="collection-item get_url">{{ URL::to('/').'/'.$url->key}}<i class="material-icons right">send</i></a>
                <small>{{$url->url}}</small>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col s6" id="details-holder">
        <!-- Promo Content 3 goes here -->
        <ul class="collection with-header">
            <li class="collection-header">
                <span>24th November 2015</span>
                <h5>Pufferfish, Pufferfish Pictures, Pufferfish Facts - National Geographic</h5>
                <span id="copy_link" >http://ucut.in/D5</span>
                <button class="btn waves-effect waves-light" type="button" id="copy_button" name="action" style="height: 18px;line-height: 0px; padding: 3px;font-size: 10px;">Copy</button>
            </li>
            <li class="collection-item"><h5>Traffic</h5></li>
            <li class="collection-item">
                <input type="text" value="75" data-min="0" data-max="75" data-thickness=".1" data-skin="tron" data-width="120" class="dial">
            </li>
        </ul>
    </div>
</div>

    <div id="msg"></div>
    <input type="button" value="copy" id="copy" style="display:none ">

{{--<hr>--}}
<input type="hidden" id="url" value="{{url('hits')}}" class="list">


<script type="text/javascript" src="{{url('external/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{url('external/js/dashboardUrlAjax.js')}}"></script>
<script type="text/javascript" src="{{url('external/js/hits.js')}}"></script>
