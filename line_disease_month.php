  <html>
  <head>
      <?php

$dbhandle = new mysqli('localhost','root','','project');
echo $dbhandle->connect_error;

$query = "select month,
sum(case when diagnosis='fever' then 1 else 0 end) as fever,
sum(case when diagnosis='cancer' then 1 else 0 end) as cancer,
sum(case when diagnosis='dengue' then 1 else 0 end) as dengue,
sum(case when diagnosis='malaria' then 1 else 0 end) as malaria,
sum(case when diagnosis='jaundice' then 1 else 0 end) as jaundice,
sum(case when diagnosis='gbs' then 1 else 0 end) as gbs

from ml group by month;";
$res = $dbhandle->query($query);

$directors = array( "Jan", "Feb", "March", "Apr", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec", "Apr" );
?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['month', 'fever', 'cancer','dengue','malaria','jaundice','gbs'],
          <?php 
            
		  while($row = $res->fetch_assoc()) 
		  {
        
            echo "['".$row['month']."',".$row['fever'].",".$row['cancer'].",".$row['dengue'].",".$row['malaria'].",".$row['jaundice'].",".$row['gbs']."],";
    }
		 
		 
		 
		 ?>
        ]);

        var options = {
          title: 'Month wise Disease Growth',
          curveType: 'function',
             vAxis: {title: 'Number of cases entered'},
          hAxis: {title: 'Month'},
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 100%; height: 100%;"></div>
  </body>
</html>
