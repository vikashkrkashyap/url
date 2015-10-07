@extends('master')
@section('main-content')
<div class="main">
    <p>Ucut.in</p>
    <div class="input_box">
        <input type="url" name ="input_data" value="{{$url}}" id ="url_input">
        <input type="button" value="Copy" id="copy_button">
</div>
@stop