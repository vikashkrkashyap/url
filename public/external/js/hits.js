$(document).ready(function(){

    function submit(url){
        $.get(url,function(response){
            $('#right').html(response);
        });
    }
});