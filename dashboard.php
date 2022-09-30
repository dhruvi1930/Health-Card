<!DOCTYPE html>
<html lang="en">

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
    <div class="main-wrapper" style="padding:20px">
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
                            <a href="patient_dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
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
						<a href="dr_login.php"><i class="fa fa-medkit fa-5x"></i></a><br>
						<a href="dr_login.php"><font size="10">0</font></a>	
						<a href="dr_login.php"><h2>Medications</h2></a>	
					</center>
				</div>
				<div class="account">
					<center>
						<a href="dr_login.php"><i class="fa fa-clipboard fa-5x"></i><a><br>
						<a href="dr_login.php"><font size="10">0</font></a>	
						<a href="dr_login.php"><h2>Prescriptions</h2></a>		
					</center>
				</div>
			</div>
			<div class="category">
				<div class="account">
					<center>
						<a href="dr_login.php"><i class="fa fa-flask fa-5x"></i></a><br>
						<a href="dr_login.php"><font size="10">0</font></a>	
						<a href="dr_login.php"><h2>Lab Tests</h2></a>	
					</center>
				</div>
				<div class="account">
					<center>
						<a href="dr_login.php"><i class="fa fa-bug fa-5x"></i></a><br>
						<a href="dr_login.php"><font size="10">0</font></a>	
						<a href="dr_login.php"><h2>Allergies</h2></a>		
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