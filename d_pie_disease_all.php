<html>
  <head>
      
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      <?php

$host = "localhost"; 
$user = "root"; 
$password = ""; 
$dbname = "project"; 

$con = mysqli_connect($host, $user, $password,$dbname);

if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}?>
        <?php
      
            $query="select cause,count(id) as s from death group by cause";
            $res=mysqli_query($con,$query);
            ?>
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Disease', 'District'],
         	 <?php 
		  while($row = $res->fetch_assoc()) 
		  {
        
            echo "['".$row['cause']."',".$row['s']."],";
    }
		 
		 
		 
		 ?>
        ]);
      
        var options = {
          title: 'Death Disease Analysis',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 100%; height: 100%;"></div>
  </body>
</html>