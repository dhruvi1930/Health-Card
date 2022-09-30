<!DOCTYPE html>

<html>
<head>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png">
    <title>Health Card</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">



</head>
 <?php
    define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'project');
    $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if(!$con){
    die("Connection Failed".mysqli_connect_error());
}
    ?>
<body style="background-color:#D3D3D3;">
 <div class="header" >
      <div class="header-left">
        <a href="medical_login.php" class="logo">
          <img src="img/logo.png" width="120" height="80" alt=""> 
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
                    <form class="form-signin" method="POST">
            <div class="account-logo">
                            <a href="#"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Medical Store  Id</label>
                            <input type="text" autofocus="" class="form-control" name="ms_id">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group text-right">
                            <a style="text-decoration:none" href="enter_id.php?table=<?php echo "medical_store"?>&idname=<?php echo "ms_id"?>&redirect=<?php echo "medical_login"?>">Forgot your password?</a>
                        </div>

                        <div class="form-group text-center">
                           <button name="qr" class="btn btn-primary account-btn">Scan QR CODE</button>&nbsp;&nbsp;
                            <button type="submit" class="btn btn-primary account-btn" name="submit">Login</button>
                        </div>
                        <div class="text-center register-link">
                            Don’t have an account? <a href="medical_sign_up.php">Register Now</a>
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
      <?php
     if(isset($_POST['qr']))
	{
        header("location:qrcodescanner/docs/medical_store_QR_scanner.php");
    }
    if(isset($_POST['submit']))
	{
		session_start();     
		$ms_id=$_POST['ms_id'];
		$check="select * from medical_store where ms_id='$ms_id'";
        $result=mysqli_query($con,$check);
        $pass=$_POST['password'];
        if(mysqli_num_rows($result)!=0)
		{
			$row = mysqli_fetch_assoc($result);
			$dbpass = $row["password"]; 
			if($dbpass==$pass)
			{
				$_SESSION['ms_id'] = $ms_id;
				setcookie("med_logged",$ms_id);
				header("location:medical_store_dashboard.php");
			}
			else
			{
				echo '<script type="text/JavaScript">  
						alert("Wrong Credentials!!"); 
					</script>'; 
			}
		}
	}		 
    ?>
</html>
