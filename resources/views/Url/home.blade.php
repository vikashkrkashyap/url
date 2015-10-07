@extends('master')
@section('main-content')
<div class="main">
    <p>Ucut.in</p>
    <form method="post" action="{{url('show')}}" class="input_box">
        {!! csrf_field() !!}
        <input type="url" name ="input_data" id="url_input" placeholder="Enter Your link" required ="required">
        <input type="submit" value="Cut Link" id="url_submit">
    </form>
</div>
    @endsection
