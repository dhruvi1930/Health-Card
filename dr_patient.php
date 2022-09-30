<!DOCTYPE html>
<html lang="en">
<?php

include("connection.php");
if($_COOKIE['dr_logged']==null)
	{
		header("location:account_type.php");
	}
session_start();

     $id=$_COOKIE['did'];
    $pid = $_COOKIE['pid'];
    #setcookie("pid","",time()-3600);
	#setcookie("did","",time()-3600);
        
     $sql = "SELECT * FROM patient_details where patient_id = '$pid'";
     $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)>0) {
        
    while($row = mysqli_fetch_assoc($result)) {
        $fname = $row["fname"];
		 $mname = $row["mname"];
    	 $lname = $row["lname"];
	     $dob = $row["DOB"];
        $email = $row["email"];
		$gender = $row["gender"];
		$blood_group = $row["blood_group"];
        $phone = $row["contact_no"];
		 $height = $row["height"];
		  $weight = $row["weight"];
		   $address = $row["address"];
		    $city = $row["city"];
			 $state = $row["state"];
			  $pincode = $row["pincode"];
			   $marital_status = $row["marital_status"];
        $img = $row["image"];
   
    }
    }
    
?>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
     <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="dr_dashboard.php" class="logo">
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
                            <a href="dr_dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
						<li class="active">
                            <a href="index_prescription.php"><i class="fas fa-prescription"></i><span>Prescription</span></a>
                        </li>
						 <li class="active">
                            <a href="dr_report_view.php"><i class="fas fa-allergies"></i><span>Pathological Reports</span></a>
                        </li>
                        <li class="active">
                            <a href="dr_patient.php"><i class="fa fa-wheelchair"></i> <span>Patient Information</span></a>
                        </li>
                         <li class="active">
                            <a href="dr_allergy_habit.php"><i class="fas fa-allergies"></i><span>Allergy And Habit</span></a>
                        </li>
                        <li class="active">
                            <a href="dr_patient_history.php"><i class="fas fa-prescription"></i><span>History</span></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="page-wrapper" style="margin-top:-30px;">
            <div class="content">
                <div class="row">
                    <div class="col-sm-7 col-6">
                        <h4 class="page-title">Personal Information</h4>
                    </div>

                    
                </div>
                <div class="card-box profile-header" style="background-color:powderblue;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap" style="border-radius:80px;"> 
                                    <div class="profile-img">
                                        <a href="#"><img class="avatar" src=<?php echo $img; ?> alt=""></a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">

                                                <h3 class="user-name m-t-0 mb-0"><?php echo $fname; ?> <?php echo $mname; ?> <?php echo $lname; ?></h3>
                                                 <div class="staff-id">Patient ID : <?php echo $pid; ?></div>
                                                <small class="text-muted"><?php echo $email; ?></small><br>
                                                <small class="text-muted"><?php echo $gender;?></small>
                                                <br><br><br><br><br><br><br><br><br><br><br>
                          
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span><b>DOB:&nbsp;</b></span>
                                                    <span ><a href="#"><?php echo $dob; ?></a></span>
                                                </li>
                                               <li>
                                                    <span><b>Height:&nbsp;</b></span>
                                                    <span ><a href="#"><?php echo $height; ?></a></span>
                                                </li>
                                                <li>
                                                    <span><b>Weight:&nbsp;</b></span>
                                                    <span ><a href="#"><?php echo $weight; ?></a></span>
                                                </li>
                                               <li>
                                                    <span><b>Contact NO:&nbsp;</b></span>
                                                    <span ><a href="#"><?php echo $phone; ?></a></span>
                                                </li>
                                                <li>
                                                    <span><b>Blood Group:&nbsp;</b></span>
                                                    <span ><a href="#"><?php echo $blood_group; ?></a></span>
                                                </li>
                                                <li>
                                                    <span><b>marital_status:&nbsp;</b></span>
                                                    <span ><a href="#"><?php echo $marital_status; ?></a></span>
                                                </li>
                                                 <li>
                                                    <span><b>Address:&nbsp;</b></span>
                                                    <span ><a href="#"><?php echo $address; ?></a></span>
                                                </li>
                                                <li>
                                                    <span><b>City:&nbsp;</b></span>
                                                    <span ><a href="#"><?php echo $city; ?></a></span>
                                                </li>
												 <li>
                                                    <span><b>State:&nbsp;</b></span>
                                                    <span ><a href="#"><?php echo $state; ?></a></span>
                                                </li>
                                                 <li>
                                                    <span><b>Pincode:&nbsp;</b></span>
                                                    <span ><a href="#"><?php echo $pincode; ?></a></span>
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



</html>