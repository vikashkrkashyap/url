<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<head>
    <title>{{$title}}</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">
    <!--<link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic,900,900italic,300italic,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
     Global CSS -->
    <link rel="stylesheet" href="{{URL::asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{URL::asset('assets/plugins/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/plugins/flexslider/flexslider.css')}}">
    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="{{URL::asset('assets/css/styles.css')}}">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("visualization", "1", {packages:["geochart","corechart"]});
        google.setOnLoadCallback(drawRegionsMap);
        google.setOnLoadCallback(drawChart);
        google.setOnLoadCallback(drawSocialChart);
        function drawRegionsMap() {

            var data = google.visualization.arrayToDataTable([
                ['Country', 'Hits'],
                ['United States', 311],
                ['Canada', 21],
                ['India', 2314],
                ['RU', 70]
            ]);

            var options = {};

            var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

            chart.draw(data, options);
        }
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Date', 'Hits'],
                ['1st Nov',  12],
                ['8th Nov',  45],
                ['15th Nov',  52],
                ['22nd Nov',  38],
                ['29th Nov',  51],
                ['6th Dec',  79],
                ['13th Dec',  42]
            ]);

            var options = {
                title: 'Hits',
                boxStyle: {
                    stroke: '#ec6952',
                    strokeWidth: 1
                }
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
        function drawSocialChart() {
            var data = google.visualization.arrayToDataTable([
                ['Traffic', 'Source'],
                ['Facebook', 37],
                ['Google+', 8],
                ['Twitter', 21],
                ['Direct', 14]
            ]);

            var options = {
                title: '',
                legend: 'none',
                pieSliceText: 'label',
                slices: { 1: {offset: 0.05},
                    3: {offset: 0.2}
                },
            };

            var chart = new google.visualization.PieChart(document.getElementById('piesocialchart'));
            chart.draw(data, options);
        }
    </script>

    <style>
        .url {
            width:50%; margin:0 auto;
        }
        .url input {
            height:45px;
        }
        .chart-hits {
            position:relative;
            top: -90px;
        }
        .one-link  {
            margin-bottom:40px;
            background: #EAF7E4;
            position: relative;
            padding: 30px 10px 20px;
            clear: both;
            overflow: auto;
            border-radius:10px;
        }
    </style>
</head>
@yield('main_content')
</html>