

$(document).ready(function (){

    $(document).on('click','#url_submit',function (e) {
        e.preventDefault();
        var that = $(this);
        var data = $('input[name=input_data]').val();
        var data1 = $('input[name=user_id]').val();
        var route = $('#mc-embedded-subscribe-form').attr('action');

        var token = $('input[name="_token"]').attr('value');

       $.ajax({
            url:route,
            headers:{'X-CSRF-TOKEN':token},
            type:'POST',
            dataType:'json',
            data:{'input_data':data,'user_id':data1},

           success: function(json){
               $('#hr').fadeIn();
               $('#msg').html('<a href="'+json['url']+'">'+json['url']+'</a>');
               $('#copy').fadeIn();
               $('#url_input').val("");

               var target = '<div style="margin-top: 10px;"><p class="intro"><a style="color: white" target="_blank" href="'+json.url+'">'+json.url+'</a></p><button data-link="'+json.url+'" id="copy-link" class="btn btn-success">Copy</button></div>';
               $('#mc-embedded-subscribe-form').after(target);
               $('input[name=input_data]').val('');
           }

       });


    });

    $(document).on('click','#copy-link',function(){

        var name=$(this).attr('data-link');
        $("body").append("<input type='text' id='temp' style='position:absolute;opacity:0;'>");
        $("#temp").val(name).select();
        document.execCommand("copy");
        $("#temp").remove();
    });

    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
    }
});