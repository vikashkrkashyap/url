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

        <input type="hidden" name="url_hits_id" value="{{url('dashboard'.'/'.$url->id)}}">
    <li>
        <a class="show_hits" onclick="submit({{url('dashboard'.'/'.$url->id)}});">
             <p>{{$url->url}} </p>
             <p> {{'http//ucut.herokuapps.com/'.$url->key}}</p><br><hr>

        </a>
    </li>

@endforeach
    </ul>

    <div id ="right" style="float:left">

    </div>
</div>

<script type="text/javascript" src="{{url('external/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{url('external/js/dashboardUrlAjax.js')}}"></script>
<script type="text/javascript" src="{{url('external/js/hits.js')}}"></script>
</body>
</html>