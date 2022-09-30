<!DOCTYPE html>
<html lang="en">

<!-- index22:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png">
    <title>Health card</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<style>
		.type
		{
			color:#00ccff;
		}
		.dr
		{
			width:150px;

		}
		.account
		{
			border:2px solid #00ccff;
			width:300px;
			border-radius:10%;
			float:left;
			padding:30px;
			margin-right:130px;
			margin-bottom:40px;
		}
		.category
		{
				padding:70px;
				margin-left:230px;
			/*	margin-top:20px;*/
		}
		.button 
		{
			  background-color: #4CAF50;
			  border: none;
			 /* color: black;*/
			 /*	*/

			  text-align: center;
			  text-decoration: none;
			  display: inline-block;
			  font-size: 20px;
			  /*margin: 4px 2px;*/

			  transition-duration: 0.4s;
			  cursor: pointer;
		}

		.button1 {
		  background-color: white; 
		  color: black; 
		  border: 2px solid #009efb;
		}
		.button1:hover {
  				background-color: #4CAF50;
 			color: white;
 			

 		}
 		.flip-card {
  background-color: transparent;
  width: 300px;
  height: 300px;
  perspective: 1000px;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #bbb;
  color: black;
}

.flip-card-back {
  background-color: #2980b9;
  color: white;
  transform: rotateY(180deg);
}
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #009efb;
   color: white;
   text-align: center;
   height:70px;
}
	</style>
</head>

<body background="img/img1.jpg">
    <div class="main-wrapper" style="padding:20px">
        <div class="header">
			<div class="header-left">
				<a href="index.php" class="logo">
					<img src="img/logo.png" width="120" height="80" alt="" style="margin-left:30px;"> 
				</a>
			</div>
			 
            <ul class="nav user-menu float-right">
				<li class="nav-item dropdown has-arrow">

                  <button class="button button1" style="margin-top:15px;margin-right:16px;color:black;width:150px;height:30px;text-align:vertical;"><a href="account_type.php" style="color: black;">Login/Sign Up</a></button>  
				
                </li>
            </ul>
            <br><br>
        </div>
      
        <div>
			<div class="category" style="margin-top:-19px;margin-left:15px;">
				<div class="flip-card" >
			  		<div class="flip-card-inner" >
			    		<div class="flip-card-front" style="background-color:#b3e3ff;"><br><br><br><br><br>
			      			
			      			<h3 style="size:10px;">City Wise Disease Analysis</h3>
			    		</div>
			    		<div class="flip-card-back">
			      			<a href="city_disease_analysis_13_1.php"><img  src="img/Capture1.png" alt="Avatar" style="width:300px;height:300px;"></a>
			    		</div>
			  		</div>
			  	</div>
			
			  	<div class="flip-card" style="margin-left:340px;margin-top:-300px;">
			  		<div class="flip-card-inner">
			    		<div class="flip-card-front" style="background-color:#009efb;"> <br><br><br><br><br>
			      			
			      			<h3 style="size:10px;">Death analysis district wise</h3>
			    		</div>
			    		<div class="flip-card-back">
			      			<a href="d_district_wise.php"><img  src="img/Capture1.png" alt="Avatar" style="width:300px;height:300px;"></a>
			    		</div>
			  		</div>
			  	</div>
				<div class="flip-card" style="margin-left:680px;margin-top:-300px;">
			  		<div class="flip-card-inner">
			    		<div class="flip-card-front" style="background-color:#b3e3ff;"><br><br><br><br><br>
			      			
			      			<h3 style="size:10px;">Month Wise Disease Growth</h3>
			    		</div>
			    		<div class="flip-card-back">
			      			<a href="line_disease_month.php"><img  src="img/Capture2.png" alt="Avatar" style="width:300px;height:300px;"></a>
			    		</div>
			  		</div>
			  	</div>
			  	<div class="flip-card" style="margin-left:1014px;margin-top:-300px;">
			  		<div class="flip-card-inner">
			    		<div class="flip-card-front"  style="background-color:#009efb;"><br><br><br><br><br>
			      			
			      		<h3 style="size:10px;">Dynamically Generation of Chart</h3>
			      			
			    		</div> 
			    		<div class="flip-card-back">
			      			<a href="main_chart.php"><img  src="img/Capture3.png" alt="Avatar" style="width:300px;height:300px;"></a>
			    		</div>
			  		</div>
			  	</div>
			</div>
			<div class="category" style="margin-top:-100px;">
				<div class="flip-card" style="margin-left:-215px;">
			  		<div class="flip-card-inner">
			    		<div class="flip-card-front" style="background-color:#009efb;"><br><br><br><br><br>
			      			
			      			<h3 style="size:10px;">Overall analysis of all disease</h3>
			    		</div>
			    		<div class="flip-card-back">
			      			<a href="pie_disease_all.php"><img  src="img/Capture4.png" alt="Avatar" style="width:300px;height:300px;"></a>
			    		</div>
			  		</div>
			  	</div>
			  	<div class="flip-card" style="margin-left:125px;margin-top:-300px;">
			  		<div class="flip-card-inner">
			    		<div class="flip-card-front" style="background-color:#b3e3ff;"><br><br><br><br><br>
			      			<h3 style="size:10px;">Death Disease Analysis</h3>
			    		</div>
			    		<div class="flip-card-back">
			      			<a href="d_pie_disease_all.php"><img  src="img/Capture4.png" alt="Avatar" style="width:300px;height:300px;"></a>
			    		</div>
			  		</div>
			  	</div>
				<div class="flip-card" style="margin-left:465px;margin-top:-300px;">
			  		<div class="flip-card-inner">
			    		<div class="flip-card-front" style="background-color:#009efb;"><br><br><br><br><br>
			      			<h3 style="size:10px;">District wise gender  ratio</h3>
			    		</div>
			    		<div class="flip-card-back">
			      			<a href="sex_ratio_district.php"><img  src="img/Capture5.png" alt="Avatar" style="width:300px;height:300px;"></a>
			    		</div>
			  		</div>
			  	</div>
			  	<div class="flip-card" style="margin-left:803px;margin-top:-300px;">
			  		<div class="flip-card-inner">
			    		<div class="flip-card-front" style="background-color:#b3e3ff;"><br><br><br><br><br>
			      			<h3 style="size:10px;">Sex wise disease analysis</h3>
			    		</div>
			    		<div class="flip-card-back">
			      			<a href="sex_wise_disease_analysis.php"><img  src="img/Capture6.png" alt="Avatar" style="width:300px;height:300px;"></a>
			    		</div>
			  		</div>
			  	</div>

			</div>
		</div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>
</div>
</body>


</html>



