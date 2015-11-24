
$(document).ready(function (){

    $('#url_submit').click(function (e) {
        e.preventDefault();

        var data = $('input[name=user_url]').val();
        var data1 = $('input[name=user_id]').val();
        var route = $('#urlForm').attr('action');

        var token = $('input[name="_token"]').attr('value');
        //  console.log(data +'user_id='+ data1 +route+'csrf= '+token);
        $('#create-url-progress').show();

        $.ajax({
            url:route,
            headers:{'X-CSRF-TOKEN':token},
            type:'POST',
            dataType:'json',
            data:{'user_url':data,'user_id':data1},

            success: function(response){
                var target = '<div class="collection" style="word-wrap: break-word">';
                target += '<small style="border-bottom: 1px solid #e0e0e0; width:100%">'+response.title+'</small>';
                target += '<a href="+'+response.sorted_url+'+" target="_blank" class="collection-item">'+response.sorted_url+'<i class="material-icons right">send</i></a>';
                target += '<small>'+response.original_url+'</small>';
                $('#create-url-progress').hide();
                $('#collection-holder').prepend(target);

            }
        });
    });
    $('.get_url').click(function(e){
        e.preventDefault(); //Preventing Default action of anchor tag
    });
    $('#copy_button').click(function(){
       var $target = $('#copy_link');
        $target.addClass('animated rubberBand');
        setTimeout(function(){$target.removeAttr('class')},500)
    });
});
$(function() {
    $(".dial").knob({
        readOnly: true,
        'format' : function (value) {
            return value + ' Clicks';
        },
        'draw' : function (){
            $(this.i).css('font-size','14px');
        }
    });
});