
<table border="2">
<tr><th><h1>total hits:{{$total_hit}}</h1></th></tr>
    @foreach($items as $item)
        <tr>
                <td>{{$item}}</td>

                <td><a id="show">show-details</a>
                    <a id="hide">hide-details</a>

                    <p>Hide and seek</p>


                </td>
        </tr>
    @endforeach
</table>


<script type="text/javascript" src="{{url('external/js/jquery.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('p').hide();
    $("#show").click(function(){

        $('p').show();
    });

    $("#hide").click(function(){

        $('p').hide();
    });
});

</script>