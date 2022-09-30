<!DOCTYPE html>
<html lang="en">

<!-- index22:59-->
    <?php
if($_COOKIE['patient_id']==null)
{
	header("location:account_type.php");
}

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "project"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
     
    
    ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
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
				margin-left:400px;
		}
	
	</style>
</head>

<body>
    <?php
    $pid=$_COOKIE['patient_id'];
    $dt=date('Y-m-d');
    $count_test=0;
   
    $q8="SELECT count(id) as s5 FROM prescription where TRIM(tests) > '' and patient_id='$pid';";
     $result8=mysqli_query($con,$q8);
    if ($result8 ->num_rows > 0){
    while($row8 = $result8-> fetch_assoc()) {
        
            $count_test = $row8["s5"];
    }
}
    
    
    
    $q="SELECT count(id) as s from prescription where patient_id='$pid';";
    $result1=mysqli_query($con,$q);
        if ($result1 ->num_rows > 0){
    while($row1 = $result1-> fetch_assoc()) {
        
            $s= $row1["s"];
    }
}
    





    
   $query = "SELECT * FROM prescription where TRIM(medicine) > '' AND end_date >='$dt' and patient_id='$pid' ;";
                $result = mysqli_query($con,$query); 
                $medcount=0;
                while($row = mysqli_fetch_array($result) ){ 
                    $med = $row['medicine'];
                    $med_arr = explode (",", $med);
                 $ite=0; 
                 $var=sizeof($med_arr);
                  while($ite!=$var) { $ite=$ite+1; $medcount++; } 
                }
    
    
    
    
    
    
    
    
                 
    $query1 = "SELECT * FROM allergies_habits where patient_id='$pid';";
    $result3 = mysqli_query($con,$query1); 
    if ($result3 ->num_rows > 0){
    while($row3 = $result3-> fetch_assoc()) {
        
           $Drug = $row3['Drug'];
        $Food = $row3['Food'];
        $Insect = $row3['Insect'];
        $Pet = $row3['Pet'];
        $Pollen = $row3['Pollen'];
        $Dust = $row3['Dust'];
    }
}
    $count=0;
    if($Drug != 'N/A'){
        $count=$count+1;
    }
     if($Food!= 'N/A'){
        $count=$count+1;
    }
     if($Insect != 'N/A'){
        $count=$count+1;
    }
     if($Pet!= 'N/A'){
        $count=$count+1;
    }
     if($Pollen != 'N/A'){
        $count=$count+1;
    }
     if($Dust != 'N/A'){
        $count=$count+1;
    }
    
    ?>
    <div class="main-wrapper" style="padding:20px">
        <div class="header">
			<div class="header-left">
				<a href="patient_dashboard.php" class="logo">
					<img src="assets/img/logo.png" width="35" height="35" alt=""> <span>Health Card</span>
				</a>
			</div>
			 <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
               
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
                            <span class="status online"></span>
                        </span> 
                        <span>Admin</span>
                    </a>
                    <div class="dropdown-menu">
                       
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        
                        <li class="active">
                            <a href="patient_dashboard_1.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        <li class="active">
                            <a href="patient_profile.php"><i class="fa fa-dashboard"></i> <span>Profile</span></a>
                        </li>
						<li class="active">
                           <a href="patient_medication_view.php"><i class="fa fa-dashboard"></i> <span>Medications</span></a>
                        </li>
						<li class="active">
                           <a href="patient_prescription_view.php"><i class="fa fa-dashboard"></i> <span>Prescriptions</span></a>
                        </li>
						<li class="active">
                         <a href="patient_report_view.php"><i class="fa fa-dashboard"></i> <span>Lab Tests</span></a>
                        </li>
						<li class="active">
                        <a href="patient_allergy_habit.php"><i class="fa fa-dashboard"></i> <span>Allergies</span></a>
                        </li>
						
                   
                         <!-- <li class="active">
                            <a href="patient_allergy_habit.php"><i class="fa fa-dashboard"></i><span>Allergy And Habit</span></a>
                        </li> -->
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div>
			<div class="category">
				<div class="account">
					<center>
						<a href="patient_medication_view.php"><i class="fa fa-medkit fa-5x"></i></a><br>
						<a href="patient_medication_view.php"><font size="10"><?php echo $medcount; ?></font></a>	
						<a href="patient_medication_view.php"><h2>Medications</h2></a>	
					</center>
				</div>
				<div class="account">
					<center>
						<a href="patient_prescription_view.php"><i class="fa fa-clipboard fa-5x"></i><a><br>
						<a href="patient_prescription_view.php"><font size="10"><?php echo $s; ?></font></a>	
						<a href="patient_prescription_view.php"><h2>Prescriptions</h2></a>		
					</center>
				</div>
			</div>
			<div class="category">
				<div class="account">
					<center>
						<a href="patient_report_view.php"><i class="fa fa-flask fa-5x"></i></a><br>
						<a href="patient_report_view.php"><font size="10"><?php echo $count_test; ?></font></a>	
						<a href="patient_report_view.php"><h2>Lab Tests</h2></a>	
					</center>
				</div>
				<div class="account">
					<center>
						<a href="patient_allergy_habit.php"><i class="fa fa-bug fa-5x"></i></a><br>
						<a href="patient_allergy_habit.php"><font size="10"><?php echo $count; ?></font></a>	
						<a href="patient_allergy_habit.php"><h2>Allergies</h2></a>		
					</center>
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

</body>


<!-- index22:59-->
</html>



