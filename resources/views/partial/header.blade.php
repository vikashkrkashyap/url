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
                    <li class="<?php if(Route::getCurrentRoute()->getPath() == '/'){ echo 'active' ;} ?> nav-item"><a href="{{action('UrlController@index')}}">Home</a></li>
                    <li class="<?php if(Route::getCurrentRoute()->getPath() == 'features'){ echo 'active' ;} ?> nav-item"><a href="{{action('UrlController@features')}}">Features</a></li>
                    <li class="<?php if(Route::getCurrentRoute()->getPath() == 'pricing'){ echo 'active' ;} ?> nav-item"><a href="{{action('UrlController@pricing')}}">Pricing</a></li>
                    <li class="<?php if(Route::getCurrentRoute()->getPath() == 'login'){ echo 'active' ;} ?> nav-item"><a href="{{URL::to('login')}}">Log in</a></li>
                    <li class="<?php if(Route::getCurrentRoute()->getPath() == 'register'){ echo 'active' ;} ?> nav-item nav-item-cta last"><a class="btn btn-cta btn-cta-secondary" href="{{URL::to('register')}}">Sign Up Free</a></li>
                </ul><!--//nav-->
            </div><!--//navabr-collapse-->
        </nav><!--//main-nav-->
    </div><!--//container-->
</header><!--//header-->
