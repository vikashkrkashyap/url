
$(document).ready(function(){

    $('#gh').click(function(){
        $.get('http://localhost:8080/ucut/public/foo',function(response){
            alert(response);
        });
    });
    $('#show_hits').click(function(){

        var data = $('#hit_count').val();
        var last_visited=$('#last_visit');
        var url =$('#url').val();

        window.location=url;
        //$.get(url,function(response){
        //    $('#hit_show').html(response);
        //});
        //$.ajax({
        //    url:url,
        //    type:get,
        //    dataType:json,
        //    data:{''},
        //    success:function(response){
        //        $('#hit_show').html(response);
        //    }

        //});
    });

});