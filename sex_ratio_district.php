<html>
<?php

$dbhandle = new mysqli('localhost','root','','project');
echo $dbhandle->connect_error;

$query = "select district,
sum(case when gender='male' then 1 else 0 end) as male,
sum(case when gender='female' then 1 else 0 end) as female
from ml group by district;";
$res = $dbhandle->query($query);


?>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['district', 'male', 'female'],
          <?php 
		  while($row = $res->fetch_assoc()) 
		  {
        
            echo "['".$row['district']."',".$row['male'].",".$row['female']."],";
    }
		 
		 
		 
		 ?>
		 
		 
		 
        ]);

        var options = {
          title : 'District wise sex ratio',
          vAxis: {title: 'Count'},
          hAxis: {title: 'District'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 100%; height: 100%;"></div>
  </body>
</html>