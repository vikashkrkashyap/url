@extends('master')
@section('main-content')
<div class="main">
    <p>Ucut.in</p>

    <form method="post" action="{{url('show')}}" class="input_box" id="urlForm">
        {!! csrf_field() !!}

        <input type="url" name ="input_data" id="url_input" value ="{{$url}}" placeholder="Enter Your link" >
        <input type="submit" value="Cut Link" id="url_submit">
        <input type="hidden" value="1" name="user_id">

    </form>

    <div id="msg"></div>
    <input type="button" value="copy" id ="copy" style="Display:none">

</div>
<script type="text/javascript" src ="{{url('external/js/ajaxHomeUrl.js')}}"></script>
<script type="text/javascript" src ="{{url('external/js/copyScript.js')}}"></script>

@endsection