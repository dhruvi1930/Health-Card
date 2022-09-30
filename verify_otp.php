<!DOCTYPE html>
<?php
if($_COOKIE['dr_logged']==null || $_COOKIE['lab_logged']==null || $_COOKIE['med_logged']==null)
	{
		header("location:account_type.php");
	}
?>
<html>
<head>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">


<style>
   .line1
    {
      width:15%;
      height:4px;
      background-color:#FF0000;
      margin-top:50px;
    }
    .line2
    {
      width:15%;
      height:4px;
      background-color:#FFFF00;
      margin-top:-4px;
      margin-left:15%; 
    }
    .line3
    {
      width:15%;
      height:4px;
      background-color:#FF8000;
      margin-top:-4px;
      margin-left:25%; 
    }
    .line4
    {
      width:15%;
      height:4px;
      background-color:#80FF00;
      margin-top:-4px;
      margin-left:35%; 
    }
    .line5
    {
      width:15%;
      height:4px;
      background-color:#FF0080;
      margin-top:-4px;
      margin-left:45%; 
    }
    .line6
    {
      width:15%;
      height:4px;
      background-color:#0000FF;
      margin-top:-4px;
      margin-left:55%; 
    }
    .line7
    {
      width:15%;
      height:4px;
      background-color:#00FFFF;
      margin-top:-4px;
      margin-left:65%; 
    }
    .line8
    {
      width:15%;
      height:4px;
      background-color:#8000FF;
      margin-top:-4px;
      margin-left:80%; 
    }
    .line9
    {
      width:15%;
      height:4px;
      background-color:#FF0000;
      margin-top:-4px;
      margin-left:90%; 
    }
  </style>
  <script>
	function count_down(t)
	{
		var myvar = setInterval(count,1000);
		var myvar1 = setInterval(dot,333);
		function count()
		{
			if(t==0)
			{
				clearInterval(myvar);
				clearInterval(myvar1);
				document.getElementById("timer").innerHTML = "Session has expired, click on below link to resend!"; 
				document.getElementById("resend").innerHTML = "<a href='send_otp.php'>Resend OTP</a>";  
			}
			else{
				document.getElementById("timer").innerHTML = "Seconds remaining:"+t; 
				t--;
			}
		}
		function dot()
		{
			if(t!=30)
			document.getElementById("timer").innerHTML +='.'; 
		}
	}
  </script>
</head>
 <?php
	
    if(isset($_POST['submit']))
	{
		$otp=$_POST['otp'];
		$check_time=time();
        if($check_time <= $_GET['expire'])
		{
			if(md5($otp)==$_GET['o'])
			{
				session_destroy();
				header("location:dr_patient.php");
			}
			else
			{
				echo '<script type="text/JavaScript">  
						alert("Wrong OTP!!"); 
					</script>'; 
			}
		}
		else
		{
			session_destroy();
			echo '<script type="text/JavaScript">  
						alert("Session Expired!!"); 
					</script>'; 
		}
	}		 
    ?>
<body style="background-color:#D3D3D3;" onload="count_down(30)">
 <div class="header" >
      <div class="header-left">
        <a href="patient_login.php" class="logo">
          <img src="assets/img/logo.png" width="35" height="35" alt=""> <span>Preclinic</span>
        </a>
      </div>

      <div class="line1"></div><div class="line2"></div><div class="line3">
        <br>
      </div><div class="line4"></div><div class="line5"></div><div class="line6"></div><div class="line7"></div><div class="line8"></div><div class="line9"></div>
      <br>
    </div>

<div class="main-wrapper account-wrapper" >
        <div class="account-page" >
      <div class="account-center" >
        <div class="account-box" style="border:2px solid #38c7ff;border-radius:4px;">
                    <form  class="form-signin" method="POST">
            <div class="account-logo">
                            <a href="patient_dashboard.php"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Verify OTP</label>
                            <input type="text" autofocus="" class="form-control" name="otp">
                        </div>
						<label id="timer"></label>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn" name="submit">Verify</button>
                        </div>
						<div id="resend">
						</div>
                    </form>
                </div>
			</div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
     
</html>
