<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
      
    function drawChart() {
      var jsonData = $.ajax({
          url: "getData.php",
          dataType:"json",
          async: false
          }).responseText;
          
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

      var options = {'title':'Types',
                     'backgroundColor':'black',
                     'width':800,
                     'height':500,
                     'is3D':true,
                     'chartArea':{left:"5%",top:"5%",width:1000,height:1000},
                     'legend':{position: 'right', textStyle: {color: 'green', fontSize: 12}},
                     'titleTextStyle':{color: 'green', fontSize: 16}};

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }

    </script>
  </head>

  <body bgcolor="black">
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>
</html>