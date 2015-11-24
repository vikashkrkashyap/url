
$(document).ready(function (){
    var smallProgress = '<div class="preloader-wrapper small active" style="width: 11px !important; height: 11px !important;"><div class="spinner-layer spinner-green-only"> <div class="circle-clipper left"> <div class="circle" style="border-width: 2px !important;"></div> </div><div class="gap-patch"> <div class="circle"></div> </div><div class="circle-clipper right"> <div class="circle"></div> </div> </div> </div>';
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
                console.log("%o",response);
                if(response.flag != 0){
                    var target = '<div class="collection" style="word-wrap: break-word">';
                    target += '<small id="url_title_id" style="border-bottom: 1px solid #e0e0e0; width:100%">'+response.title+'</small>'+smallProgress;
                    target += '<a href="+'+response.sorted_url+'+" target="_blank" class="collection-item">'+response.sorted_url+'<i class="material-icons right">send</i></a>';
                    target += '<small>'+response.original_url+'</small>';
                    target += '<small>'+response._id+'</small>';
                    $('#create-url-progress').hide();
                    $('#collection-holder').prepend(target);
                    $('#user_url').val('');
                    getUrlTitle(response._id,response.original_url);
                }else{
                    Materialize.toast('Url is existing', 4000)
                    $('#create-url-progress').hide();
                }

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
function getUrlTitle(_id,_link){
    $('.preloader-wrapper').show();
    $.post('update_url_title',{id:_id,title:'new',link:_link},function(response){
        $('#url_title_id').text(response);
        $('.preloader-wrapper').hide();
    });
}