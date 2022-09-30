<html>
<?php

$dbhandle = new mysqli('localhost','root','','project');
echo $dbhandle->connect_error;

$query = "select district,
sum(case when diagnosis='fever' then 1 else 0 end) as fever,
sum(case when diagnosis='cancer' then 1 else 0 end) as cancer,
sum(case when diagnosis='dengue' then 1 else 0 end) as dengue,
sum(case when diagnosis='malaria' then 1 else 0 end) as malaria,
sum(case when diagnosis='jaundice' then 1 else 0 end) as jaundice,
sum(case when diagnosis='gbs' then 1 else 0 end) as gbs

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
          ['district', 'fever', 'cancer','dengue','malaria','jaundice','gbs'],
          <?php 
		  while($row = $res->fetch_assoc()) 
		  {
        
            echo "['".$row['district']."',".$row['fever'].",".$row['cancer'].",".$row['dengue'].",".$row['malaria'].",".$row['jaundice'].",".$row['gbs']."],";
    }
		 
		 
		 
		 ?>
		 
		 
		 
        ]);

        var options = {
          title : 'Disease analysis district wise',
          vAxis: {title: 'Disease'},
          hAxis: {title: 'district'},
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