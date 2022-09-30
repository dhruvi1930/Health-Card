<?php
session_start();
$dbhandle = new mysqli('localhost','root','','project');
echo $dbhandle->connect_error;
$month = $_SESSION['month'];
$year = $_SESSION["year"];
$gender = $_SESSION["gender"];
$area = $_SESSION["area"];
$choice = $_SESSION["choice"];
// echo $choice;
// echo $year;
// echo $area;
// echo $gender;
// echo $month;
if($month=='All'){
  
  
}
if($choice== 'malaria' || $choice== 'dengue')
{

$query = "SELECT $area ,COUNT(id) as s from ml where month = '$month' and diagnosis = '$choice' and year = '$year' and gender = '$gender' group by $area";
$res = $dbhandle->query($query);
}
else
{
  if($choice== 'malaria_death')
  {
    $choice= 'malaria';
  }

  if($choice== 'dengue_death')
  {
    $choice= 'dengue';
  }

   if($choice== 'cancer_death')
  {
    $choice= 'cancer';
  }
   if($choice== 'gbs_death')
  {
    $choice= 'gbs';
  }
  if($choice== 'jaundice_death')
  {
    $choice= 'jaundice';
  }
  if($choice== 'fever_death')
  {
    $choice= 'fever';
  }
$query = "SELECT $area ,COUNT(id) as s from death where month = '$month' and cause = '$choice' and year = '$year' and gender = '$gender' group by $area";
$res = $dbhandle->query($query);
}

?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
           ['malaria', 'frequency'],    
         <?php 
      while($row = $res->fetch_assoc()) 
      {
        
            echo "['".$row[$area]."',".$row['s']."],";
    }
  ?>
        ]);

        var options = {
          title : 'Fequency VS' + ' <?php echo $choice;?>' + ' Disease chart for month' + ' <?php echo $month;?>' + ' Year' + ' <?php echo $year;?>' + ' Gender' + ' <?php echo $gender;?>' + ' <?php echo $area;?>' + ' vise',
          vAxis: {title: 'frequency'},
          hAxis: {title: 'disease'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 900px; height: 500px;margin-left:300px;margin-top:130px"></div>
  </body>
</html>
