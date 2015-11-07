
<table border="2">
<tr><th><h1>total hits:<?php echo count($hits) ?></h1></th></tr>
    @foreach($items as $item)
        <tr>
            <td> {{$item}}</td>
        </tr>
    @endforeach
</table>
