<html>
<head>
     <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.1.min.js"></script>
    <meta charset=utf-8 />
</head>

<body><br><br><br>
<div id="hits" style="height: 250px;width:700px"></div>
<div id="bar-example"></div>

<script type="text/javascript">


    // later on

 jQuery(function(){


     $.get("http://localhost:8080/ucut/public/dashboard/3",function(response){

        var data = JSON.parse(response)

     new Morris.Line({
        element: 'hits',
        data: data,
        xkey: 'date',
        ykeys: ['hits'],
        labels: ['Hits'],
         xLabels: 'week',
         resize: 'true',
    });
    });
 });
</script>
</body>
</html>
