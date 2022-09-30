<!DOCTYPE html>
<html>
<head>
	<title>Account_type</title>
	<style>
		.type
		{
			color:#0080ff;
		}
		.dr
		{
			width:150px;

		}
		.account
		{
			border:2px solid #0080ff;
			width:230px;
			border-radius:10%;
			float:left;
			padding:30px;
			margin-right:200px;
			margin-left:30px;
			margin-bottom:50px;
			background-color:white;
		}
		.category
		{
				margin-left:400px;
				background-color:white; 
		}

		
	</style>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png">
   <title>Health card</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body style="background-color:#D3D3D3;">
	 <div class="header" >
			<div class="header-left">
				<a href="account_type.php" class="logo">
					<img src="img/logo.png" width="120" height="80" alt="">
				</a>
			</div>
    </div>
    
        <br><br><br><br>
       
	<center> <div >
					<h1 class="type">User Login</h1></center><br>
					<div style="background-color:white;">
				<div class="category">
			<div class="account">
				<center>
					<a href="dr_login.php"><img class="dr" src="img/dr.png" width="227px" height="150px"></a>
					<a href="dr_login.php"><h2>Doctor</h2></a>	
				</center>
			</div>
			<div class="account">
				<center>
					<a href="pateint_login.php"><img class="dr" src="img/patient.png" width="227px" height="150px"></a>
					<a href="patient_login.php"><h2>Patient</h2></a>	
				</center>
			</div>
	</div>

<div class="category">
			<div class="account">
				<center>
					<a href="lab_login.php"><img class="dr" src="img/lab.png" width="227px" height="150px"></a>
					<a href="lab_login.php"><h2>Laboratory</h2></a>	
				</center>
			</div>
			<div class="account">
				<center>
					<a href="medical_login.php"><img class="dr" src="img/pharmacist.png" width="227px" height="150px"></a>
					<a href="medical_login.php"><h2>Pharmacist</h2></a>	
				</center>
			</div>
	</div>
</div>
	</div>
	</center>	
</body>
</html>