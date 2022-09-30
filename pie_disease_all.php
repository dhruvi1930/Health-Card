<html>
  <head>
      <?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "project"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}?>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
        <?php
      
            $query="select diagnosis,count(id) as s from ml group by diagnosis";
            $res=mysqli_query($con,$query);
            ?>
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Disease', 'District'],
         	 <?php 
		  while($row = $res->fetch_assoc()) 
		  {
        
            echo "['".$row['diagnosis']."',".$row['s']."],";
    }
		 
		 
		 
		 ?>
        ]);
      
        var options = {
          title: 'Overall analysis of number of cases registred for all disease',
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