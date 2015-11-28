
$(document).on('ready',function (){
    var smallProgress = '<i class="fa fa-circle-o-notch fa-spin preloader-wrapper"></i>';
    $('#url_submit').on('click',function (e) {
        e.preventDefault();

        var data = $('input[name=user_url]').val();
        var data1 = $('input[name=user_id]').val();
        var route = $('#urlForm').attr('action');
        var token = $('input[name="_token"]').attr('value');
        $('#create-progress-card').show();

        $.ajax({
            url:route,
            headers:{'X-CSRF-TOKEN':token},
            type:'POST',
            dataType:'json',
            data:{'user_url':data,'user_id':data1},

            success: function(response){
                if(response.flag != 0){
                    var x = '';
                    x += '<li class="list-group-item">';
                    x += '<a href="#"><i data-url-id="'+response._id+'" id="view-stats" class="fa fa-bar-chart fa-2x pull-right show_stats" title="View Stats" style="font-size: 1.39em !important;"></i></a>';
                    x += '<span class="badge primary">0</span>'
                    x += '<a href="'+response.sorted_url+'" target="_blank" style="text-underline: none">'+response.sorted_url+'</a><br />';
                    x += '<small><b>'+response.original_url+'</b></small><br/>';
                    x += '<small id="url_title_id">'+smallProgress+response.title+'</small>'
                    x += '</li>';
                    $('#create-progress-card').hide();
                    $('#create-progress-card').after(x);
                    $('#user_url').val('');
                    getUrlTitle(response._id,response.original_url);
                }else{
                    alert('existing');
                }

            }
        });
    });
    $('.get_url').click(function(e){
        e.preventDefault(); //Preventing Default action of anchor tag
    });
    $(document).on('click','.copy_button',function(){

       var $target = $('.copy_link');
        $target.addClass('animated rubberBand');
        setTimeout(function(){$target.removeAttr('class')},500)
    });

    $(document).on('click','.show_stats',function(e){
        e.preventDefault();
        $.ajax({
            url: 'dashboard/show_stats',
            headers:{'X-CSRF-TOKEN':$('input[name="_token"]').attr('value')},
            type:'GET',
            dataType:'html',
            data:{'id':$(this).attr('data-url-id')},
            success: function (response) {
                $('#chart-container').html(response);
                getFirstChartData();
                getUpdatedChartData();
            }

        });
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
    getFirstChartData();
    getUpdatedChartData();

});
function getUrlTitle(_id,_link){
    $('.preloader-wrapper').show();
    $.post('update_url_title',{id:_id,title:'new',link:_link},function(response){
        $('#url_title_id').text(response);
        $('.preloader-wrapper').hide();
    });
}
function getUpdatedChartData(){
    $(document).on('click','.bar-chart-button', function(e) {
        $('#link-bar-chart').empty();
        $('#chart-button-holder').find('button').removeClass('active');
        $(this).addClass('active');
        var type = $(this).data('type')
        var day_data = JSON.parse($('#link-bar-chart').attr('data-day'));
        var week_data = JSON.parse($('#link-bar-chart').attr('data-week'));
        var month_data = JSON.parse($('#link-bar-chart').attr('data-month'));
        var year_data = JSON.parse($('#link-bar-chart').attr('data-year'));
        //console.log("%o",week_data);

            data = {
            year: year_data,
            month: month_data,
            week: week_data,
            day: day_data
        }
            ,xkey = {
            year: 'monthname',
            month: 'dayofmonth',
            week: 'dayofweek',
            day: 'time'
        }
        ykey = {
            year: 'hits',
            month: 'hits',
            week: 'hits',
            day: 'hits'
        }
            ,line = new Morris.Bar({
            element: 'link-bar-chart',
            resize: true,
            data: data[type],
            xkey: xkey[type],
            ykeys: [ykey[type]],
            labels: [ykey[type]],
            lineColors: ['#3c8dbc'],
            hideHover: 'auto'
        });
    });
}
function getFirstChartData(){
    var day_data = JSON.parse($('#link-bar-chart').attr('data-day'));
    Morris.Bar({
        element: 'link-bar-chart',
        resize: true,
        data: day_data,
        xkey: 'time',
        ykeys: ['hits'],
        labels: ['time'],
        lineColors: ['#3c8dbc'],
        hideHover: 'auto',
        xLabelFormat: function(x){
            return x.src.time.toString()+' Hrs';
        }
    });
}