<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">

        {{ date('dS F y',strtotime($recent_url->created_at))}}
        <a href="#"><i class="fa fa-share pull-right" title="Share"></i></a>
        <a href="#"><i class="fa fa-pencil pull-right" title="Edit"></i></a>
        <a href="#"><i class="fa fa-tag pull-right" title="Tag"></i></a>
    </div>
    <div class="panel-body">
        <div>
            <h5>{{$recent_url->title}}</h5>
            <span class="copy_link" >{{\Illuminate\Support\Facades\URL::to('/').'/'.$recent_url->key}}</span>
            <button class="btn btn-danger copy_button" type="button"  name="action" style="height: 18px;line-height: 0px; padding: 3px;font-size: 10px;">Copy</button>
        </div>
        <div style="margin-top: 5px;">
            <div class="btn-group" id="chart-button-holder">
                {{--<input type="text" value="75" data-min="0" data-max="75" data-thickness=".1" data-skin="tron" data-width="120" class="dial">--}}
                <button class="bar-chart-button btn btn-primary active" data-type="day" type="button">Day</button>
                <button class="bar-chart-button btn btn-primary" data-type="week" type="button">Week</button>
                <button class="bar-chart-button btn btn-primary" data-type="month" type="button">Month</button>
                <button class="bar-chart-button btn btn-primary" data-type="year" type="button">Year</button>
                {{--<button class="bar-chart-button btn btn-primary pull-right" data-type="all" type="button">All</button>--}}
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle disabled" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-pie-chart"></i>&nbsp;Chart <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-bar-chart"></i>&nbsp;Bar Chart</a></li>
                    <li><a href="#"><i class="fa fa-line-chart"></i>&nbsp;Line Chart</a></li>
                    <li><a href="#"><i class="fa fa-area-chart"></i>&nbsp;Area Chart</a></li>
                </ul>
            </div>
            <div data-day="{{$hits_today_by_time}}" data-week="{{$hits_per_week_by_day}}" data-month="{{$hits_per_month}}" data-year="{{$hits_per_year}}" id="link-bar-chart"></div>
        </div>
    </div>
</div>