
<table border="2">
<tr><th><h1>total hits:{{$hits}}</h1></th></tr>
    @foreach($url_stats as $website_hits)
        <tr>
            <td> {{$website_hits->website_url}}</td>
        </tr>
    @endforeach
</table>