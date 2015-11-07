@extends('User.dashboard')
@section('hits')
<table border="2">
<tr><th><h1>total hits:{{$hits}}</h1></th></tr>
    @foreach($items as $item)
        <tr>
            <td> {{$item}}</td>
        </tr>
    @endforeach
</table>
    @endsection