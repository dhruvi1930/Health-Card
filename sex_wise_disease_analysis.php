<html>
<?php

$dbhandle = new mysqli('localhost','root','','project');
echo $dbhandle->connect_error;

$query = "select diagnosis,
sum(case when gender='Male' then 1 else 0 end) as male,
sum(case when gender='Female' then 1 else 0 end) as female
from ml group by diagnosis;";
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
          ['diagnosis', 'male','female'],
          <?php 
		  while($row = $res->fetch_assoc()) 
		  {
        
            echo "['".$row['diagnosis']."',".$row['male'].",".$row['female']."],";
    }
		 
		 
		 
		 ?>
		 
		 
		 
        ]);

        var options = {
          title : 'sex wise disease analysis',
          vAxis: {title: 'Number'},
          hAxis: {title: 'sex'},
          seriesType: 'bars'       };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 100%; height: 100%;"></div>
  </body>
</html>

