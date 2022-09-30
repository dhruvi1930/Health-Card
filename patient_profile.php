<!DOCTYPE html>
<html lang="en">
<?php
if($_COOKIE['patient_id']==null)
{
	header("location:account_type.php");
}
include("connection.php");
#session_start();

    $id=$_SESSION['patient_id'];

        
     $sql = "SELECT * FROM patient_details where patient_id = '$id'";
     $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)>0) {
        
    while($row = mysqli_fetch_assoc($result)) {
        $fname = $row["fname"];
        $email = $row["email"];
        $phone = $row["contact_no"];
        $img = $row["image"];
        $speciality=$row["speciality"];
		$dob = $row["DOB"];
		$gender = $row["gender"];
		$address = $row["address"];
		$city = $row["city"];
		$state = $row["state"];
		$pincode = $row["pincode"];
		$district = $row["district"];
		$mname =  $row["mname"];
		$marital_status = $row["marital_status"];
		$lname =  $row["lname"];
		$blood_group =  $row["blood_group"];
		$height =  $row["height"];
		$weight =  $row["weight"];
		
		
		
		 
    }
    }
	 if(isset($_POST['submit'])){
    $patient_id = $_POST['patient_id'];
	$sql1 = "SELECT * FROM patient_details where patient_id = '$patient_id'";
    $result1 = mysqli_query($con, $sql1);
		
	 if (mysqli_num_rows($result1)>0){
		 echo "abc";
		 $_SESSION['pid'] = $patient_id;
		$_SESSION['pname'] = $fname.$mname.$lname;
		 header("location:index_prescription.php");
	 }
	 else{
		   echo '<script>alert("Patient Does not Exists!!");</script>';
	 }
	 }
	
    
?>
<!-- index22:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="patient_dashboard.php" class="logo">
					<img src="assets/img/logo.png" width="35" height="35" alt=""> <span>Preclinic</span>
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
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-7 col-6">
                        <h4 class="page-title">Personal Information</h4>
                    </div>

                    <div class="col-sm-5 col-6 text-right m-b-30">
                        <a href="edit-profile.html" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Edit Profile</a>
                    </div>
                </div>
                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img class="avatar" src="<?php echo $img ?>" alt=""></a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">

                                                <h3 class="user-name m-t-0 mb-0"><?php echo $fname." ". $mname." ". $lname ?></h3>
                                                 <div class="staff-id"><?php echo $id;?></div>
                                                <small class="text-muted"><?php echo $email; ?></small><br>
                                                <small class="text-muted"><?php echo $gender; ?></small>
                                                <br><br><br><br><br><br><br><br><br><br><br><br><br>
                          
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span><b>DOB:&nbsp;</b></span>
                                                    <span ><?php echo $dob ?></span>
                                                </li>
                                               <li>
                                                    <span><b>Height:&nbsp;</b></span>
                                                    <span ><?php echo $height ?></span>
                                                </li>
                                                <li>
                                                    <span><b>Weight:&nbsp;</b></span>
                                                    <span ><?php echo $weight ?></span>
                                                </li>
                                               <li>
                                                    <span><b>Contact NO:&nbsp;</b></span>
                                                    <span ><?php echo $phone ?></span>
                                                </li>
                                                <li>
                                                    <span><b>Blood Group:&nbsp;</b></span>
                                                    <span ><?php echo  $blood_group ?></span>
                                                </li>
                                                <li>
                                                    <span><b>marital_status:&nbsp;</b></span>
                                                    <span ><?php echo  $marital_status ?></span>
                                                </li>
                                                 <li>
                                                    <span><b>Address:&nbsp;</b></span>
                                                    <span ><?php echo  $address ?></span>
                                                </li>
                                                <li>
                                                    <span><b>City:&nbsp;</b></span>
                                                    <span ><?php echo $city ?></span>
                                                </li>
												<li>
                                                    <span><b>State:&nbsp;</b></span>
                                                    <span ><?php echo $state ?></span>
                                                </li>
												<li>
                                                    <span><b>District:&nbsp;</b></span>
                                                    <span ><?php echo $district ?></span>
                                                </li>
                                                 <li>
                                                    <span><b>Pincode:&nbsp;</b></span>
                                                    <span ><?php echo $pincode ?></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        </div>
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

</body>


<!-- index22:59-->
</html>