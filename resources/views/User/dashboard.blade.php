<html>
<head></head>
<body>
<p> Welcome {{Auth::user()->name}}</p>

    <a href="{{url('logout')}}"> logout</a><br><br>
<form method="post" id ="urlForm" action="{{url('postAjaxData')}}">
    {!! csrf_field() !!}
    <input type="text" style="width:500px;height:40px" name="user_url">
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <input type="submit" value="short" id ="url_submit" style="color: honeydew;background:black; font-size:20px;width:100px;height:40px">
</form>
    <div id="msg"></div>
    <input type="button" value="copy" id="copy" style="display:none ">

<hr>
<input type="hidden" id="url" value="{{url('hits')}}">
<div class="list">

    <ul style="float: left; width:300px;height:100%;">
@foreach($url_data as $url)
    <li><a id="show_hits">
        <p>{{$url->url}} </p>
         <p> {{'http//ucut.herokuapps.com/'.$url->key}}</p><br><hr>
         </a>
    </li>

@endforeach
    </ul>

    <div id ="right" style="float:left">

        <p class="hits_count">Total hits :<span id="hit_show"></span>    </p>

    </div>
</div>
<button id="gh" >Button</button>
<script type="text/javascript" src="{{url('external/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{url('external/js/dashboard.js')}}"></script>
<script type="text/javascript" src="{{url('external/js/hits.js')}}"></script>
</body>
</html>