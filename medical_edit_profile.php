<!DOCTYPE html>
  <?php
if($_COOKIE['med_logged']==null)
	{
		header("location:account_type.php");
	}
#session_start();
include 'connection.php';
?>
<?php
    
     $id=$_SESSION['ms_id'];
     $sql20 = "SELECT * FROM medical_store where ms_id = '$id'";
     $result20 = mysqli_query($con, $sql20);
    if (mysqli_num_rows($result20)>0) {
    
    while($row = mysqli_fetch_assoc($result20)) {
        $ms_name = $row["ms_name"];
        $owner_name = $row["owner_name"];
        $password = $row["password"];
        $contact_no = $row["contact_no"];
        $city=$row["city"];
        $state=$row["state"];
		$gender=$row["gender"];
		$dob=$row["DOB"];
		$email=$row["email"];
		$district=$row["district"];
        $pincode=$row["pincode"];
        $address=$row["address"];
		$img=$row["image"];
		$dob=$row["DOB"];
    }
    }
    
    
    if(isset($_POST['submit'])) {  
    $value = 0;
    $password = $_POST["new_password"];
    $cpassword = $_POST["old_password"];
	
	
	
    if (mb_strlen($_POST["new_password"]) <= 8) {
        $passwordErr = "Your Password Must Contain At Least 8 Characters!";
        $value = 1;
        echo '<script>alert("Your Password Must Contain At Least 8 Characters,1 Number, 1 Capital letter, 1 Lower case letter and 1 special letter");</script>';
        
    }
    elseif(!preg_match("#[0-9]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Number!";
        $value = 1;
        echo '<script>alert("Your Password Must Contain At Least 8 Characters,1 Number, 1 Capital letter, 1 Lower case letter and 1 special letter");</script>';
        
    }
    elseif(!preg_match("#[A-Z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
        $value = 1;
        echo '<script>alert("Your Password Must Contain At Least 8 Characters,1 Number, 1 Capital letter, 1 Lower case letter and 1 special letter");</script>';
    
    }
    elseif(!preg_match("#[a-z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
        $value = 1;
        echo '<script>alert("Your Password Must Contain At Least 8 Characters,1 Number, 1 Capital letter, 1 Lower case letter and 1 special letter");</script>';
        
    }
    elseif(!preg_match("#[\W]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Special Character!";
        $value = 1;
        echo '<script>alert("Your Password Must Contain At Least 8 Characters,1 Number, 1 Capital letter, 1 Lower case letter and 1 special letter");</script>';
        
    } 
    elseif (strcmp($password, $cpassword) !== 0) {
        $passwordErr = "Passwords must match!";
        $value = 1;
        echo '<script>alert("Your Old Password is wrong! If You Dont Remeber Your old Password Logout and do Forget Password!!");</script>';
    }
	
        $ms_name = $_POST['ms_name'];
        $owner_name = $_POST['owner_name'];
        $contact_number= $_POST['contact_no'];
        $medical_store_password = $_POST['password'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $pincode = $_POST['pincode'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
		$dob = $_POST['dob'];
        $district=$_POST['district'];
		$dob=$_POST['dob'];
             
      if($value==0){
      $insert_query = "UPDATE medical_store SET ms_name='$ms_name',owner_name='$owner_name',gender='$gender',DOB='$dob',email='$email',password='$password',
	  contact_no='$contact_number',address='$address',city='$city',state='$state',district='$district',pincode='$pincode' where ms_id='$id'";
      $a = mysqli_query($con,$insert_query);
	  echo '<script>alert("Your Details are successfully updated!!");</script>';
     
     
         }
        
	 }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
     <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
	 <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   
</head>

<body>
    <div class="main-wrapper" style="padding:20px">
        <div class="header">
            <div class="header-left">
                <a href="medical_dashboard.php" class="logo">
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
                            <a href="medical_dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
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
                    <div class="col-sm-12">
                        <h4 class="page-title">Edit Profile</h4>
                    </div>
                </div>
                <form>
                    <div class="card-box" style="background-color:powderblue;">
                        <h3 class="card-title">Basic Informations</h3>
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="profile-img-wrap">
                                    <img class="inline-block" src="<?php echo $img; ?>" alt="user">
                                    <div class="fileupload btn">
                                        <span class="btn-text">edit</span>
                                        <input class="upload" type="file">
                                    </div>
                                </div>
                                <div class="profile-basic" >
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <label class="focus-label" >Medical Store Name</label>
                                                <input type="text" class="form-control floating" name="msname" value="<?php echo $ms_name; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <label class="focus-label">Owner Name </label>
                                                <input type="text" name="oname" class="form-control floating" value="<?php echo $owner_name; ?>">
                                            </div>
                                        </div>
                                       
                                         <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <label class="focus-label">Old Password</label>
                                                <input type="text" name="old_password" class="form-control floating" value="" placeholder="Enter Your Old Password" required>
                                            </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <label class="focus-label">New Password</label>
                                                <input type="text" name="new_password" class="form-control floating" value="" placeholder="Enter Your New Password" required>
                                            </div>
                                        </div>
										<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="cal-icon">
                                            
                                            <input type="text"  name="dob" class="form-control datetimepicker" value="<?php echo $dob; ?>">
                                        </div>
                                    </div>
                                </div>
										
                                      
										<div class="form-group gender-select" style="margin-left:15px">
                    <label class="gen-label">Gender:</label>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio"  name="gender" class="form-check-input" value="male" required>Male
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio"  class="form-check-input" name="gender" value="female" required>Female
                      </label>
                    </div>
                  </div>
				   
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-box" style="background-color:powderblue;">
                        <h3 class="card-title">Contact Informations</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Address</label>
                                    <input type="text" name="address" class="form-control floating" value="<?php echo $address; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">State</label>
                                    <input type="text" name="state" class="form-control floating" value="<?php echo $state; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">City</label>
                                    <input type="text" name="city" class="form-control floating" value="<?php echo $city; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Pin Code</label>
                                    <input type="text" name="pincode" class="form-control floating" value="<?php echo $pincode; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Phone Number</label>
                                    <input type="text" name="phone" class="form-control floating" value="<?php echo $contact_no; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Email</label>
                                    <input type="text" name="email" class="form-control floating" value="<?php echo $email; ?>">
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">District</label>
                                    <input type="text" class="form-control floating" value="<?php echo $district; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                  
                    <div class="text-center m-t-20">
					 <form method="post" action="#" >
                        <input type="submit" class="btn btn-primary submit-btn" name ="submit"  value="Save">
				<form>
                    </div>
				
                </form>
            </div>
        
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- edit-profile23:05-->
</html>