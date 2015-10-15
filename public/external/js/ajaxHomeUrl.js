

$(document).ready(function (){

    $('#url_submit').click(function (e) {
        e.preventDefault();

        var data = $('input[name=input_data]').val();
        var data1 = $('input[name=user_id]').val();
        var route = $('#urlForm').attr('action');

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



           }

       });





    });
});