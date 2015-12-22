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
            <a class="navbar-brand" href="{{url('/')}}"><img src="{{URL::to('/images/logo_ucut.png')}}" width="45" style="margin-top: -10px;"/></a>
            <ul class="nav navbar-nav">
                <li class="<?php if(Route::getCurrentRoute()->getPath() == 'dashboard'){ echo 'active' ;} ?> "><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>&nbsp;Dashboard<span class="sr-only">(current)</span></a></li>
            </ul>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            {{--<ul class="nav navbar-nav">--}}
            {{--<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>--}}
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
                <li class="<?php if(Route::getCurrentRoute()->getPath() == 'analytics'){ echo 'active' ;} ?> "><a href="{{action('AnalyticsController@index')}}"><i class="fa fa-bar-chart-o">&nbsp;</i>Analytics</a></li>
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