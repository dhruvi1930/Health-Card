<!DOCTYPE html>
  <?php

session_start();
include 'connection.php';
?>
<?php
    
    
    
    
    if(isset($_POST['submit'])){
        
    $value = 0;
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    if (mb_strlen($_POST["password"]) <= 8) {
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
        echo '<script>alert("Passwords must match!");</script>';
    }
        
        include 'phpqrcode/qrlib.php'; 
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
        
        
  
        function unique_code()
            {
                return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 4);
            }
             $medical_store_id="ms".$pincode.unique_code();
             $_SESSION["msid"] = $medical_store_id;
             $path = 'img/medicalstore/QR/'; 
             $file = $path.$medical_store_id.".png"; 
  
$ecc = 'L'; 
$pixel_Size = 10; 
$frame_Size = 10; 

  $check1="select * from medical_store where email='$email'";
   $y = 0;
   $x = 0;
        $result2=mysqli_query($con,$check1);
         if ($result2 ->num_rows > 0){
             $y = 1;
}
$check2="select * from medical_store where contact_no='$contact_number'";
        $result3=mysqli_query($con,$check2);
         if ($result3 ->num_rows > 0){
             $x = 1;
}
if($y==1 && $x==1){
    
    echo '<script>alert("Phone number and Email Already Exists!!");</script>';
}
elseif($y==1){
    echo '<script>alert("Email Already Exists!!");</script>';
    
}
 elseif($x==1){
    echo '<script>alert("Phone number Already Exists!!");</script>';
}
   
             
         if($value==0 && $y==0 && $x==0){
			 $medical_store_password=md5($medical_store_password);
      $insert_query = "INSERT INTO medical_store(ms_id,ms_name,owner_name,gender,DOB,email,password,contact_no,address,city,state,district,pincode,qr_path) VALUES ('$medical_store_id','$ms_name'
      ,'$owner_name','$gender','$dob','$email','$medical_store_password','$contact_number','$address','$city','$state','$district',
      '$pincode','$file') ";
      QRcode::png($medical_store_id, $file, $ecc, $pixel_Size, $frame_Size); 
      $a = mysqli_query($con,$insert_query);
      header("location:medical_store_upload.php");
     
         }
        
    }
    ?>
<html lang="en">


<!-- edit-doctor24:06-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png">
    <title>Health Card</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
  <![endif]-->
</head>

<body style="background-color:#D3D3D3;">
  <div class="header" >
      <div class="header-left">
        <a href="medical_sign_up.php" class="logo">
          <img src="img/logo.png" width="120" height="80" alt=""> 
        </a>
      </div>

      <div class="line1"></div><div class="line2"></div><div class="line3">
        <br>
      </div><div class="line4"></div><div class="line5"></div><div class="line6"></div><div class="line7"></div><div class="line8"></div><div class="line9"></div>
      <br>
    </div>
    <div class="main-wrapper">
        
        <div class="page-wrapper" >
            <div class="content">
                <div class="row" >
                    <div class="col-lg-8 offset-lg-2" style="border:2px solid #38c7ff;border-radius:4px;background-color:white;margin-left:104px;">
                        <form action="#" method="post">
                          <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                      <br><br>
                        <h4 class="page-title" style="margin-left:200px;font-size:35px;"><b>Sign Up</b></h4>
                    </div>
                </div><br>
                            <div class="row">
							 <div class="col-sm-12">
                      <div class="form-group">
                        <label>License Number</label>
                        <input type="text" class="form-control " name="address" placeholder="Enter License Number" >
                      </div>
                    </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Medical Store Name <!--<span class="text-danger">*</span>--></label>
                                        <input type="text" class="form-control" placeholder="Enter  Name" name="ms_name" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Owner Name</label>
                                        <input type="text" class="form-control" placeholder="Enter  Name" name="owner_name" required>
                                    </div>
                                </div>
                              
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" placeholder="Enter Password" name="cpassword" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Contact Number</label>
                                        
                                        <input type="number" class="form-control" placeholder="Enter Phone No" name="contact_no"  maxlength="10"    required >
                                    </div>
                                </div>
                               <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        
                                        <input type="email" class="form-control" placeholder="Enter Email" name="email" required >
                                    </div>
                                </div>
								<div class="col-sm-6">
                  <div class="form-group gender-select">
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
								 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="cal-icon">
                                            
                                            <input type="text"  name="dob" class="form-control datetimepicker" required>
                                        </div>
                                    </div>
                                </div>
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control " name="address" placeholder="Enter Address" required>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                      <div class="form-group">
                        <label>State <!--<span class="text-danger">*</span>--></label>
                         <select class="form-control" id="state" name="state">
    <option value="">Select State</option>
    <?php 
	$sql6 = "SELECT DISTINCT State FROM pincode ORDER BY State ASC";
  $res6 = mysqli_query($con, $sql6);
    if($res6->num_rows > 0){ 
	
        while($row = mysqli_fetch_array($res6)){  
            echo '<option value="'.$row['State'].'">'.$row['State'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">State not available</option>'; 
    } 
    ?>
</select>
                      </div>
                    </div>
					<div class="col-sm-6 col-md-6 col-lg-3">
                      <div class="form-group">
                        <label>District</label>
                       <select id="dist" name="district" class="form-control"  required>
    <option value="">Select state first</option>
</select><br><br>
                      </div>
                    </div>
					
					
                    
                    <div class="col-sm-6 col-md-6 col-lg-3">
                     <div class="form-group">
                        <label>City</label>
                       <select id="city" class="form-control" name="city" required>
    <option value="">Select district first</option>
</select><br><br>
                      </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-6 col-lg-3">
                     <div class="form-group">
                        <label>Postal Code</label>
                       <select id="pinc" class="form-control" name="pincode" required>
    <option value="">Select city first</option>
</select>
                      </div>
                    </div>
                  </div>
                </div>
                                
                              
                            </div>
               <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" type="submit" name="submit">Submit</button>
                            </div>
                          <br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script src="assets/js/jquery-3.2.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
  <script src="assets/js/moment.min.js"></script>
  <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
	<script>
$(document).ready(function(){
    $('#state').on('change', function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxDATA.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#dist').html(html);
                    $('#city').html('<option value="">Select dist first</option>');
                }
            }); 
        }else{
            $('#dist').html('<option value="">Select state first</option>');
            $('#city').html('<option value="">Select dist first</option>');
        }
    });
    
    $('#dist').on('change', function(){
        var distID = $(this).val();
        if(distID){
            $.ajax({
                type:'POST',
                url:'ajaxDATA.php',
                data:'dist_id='+distID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });

    $('#city').on('change', function(){
        var cityID = $(this).val();
        if(cityID){
            $.ajax({
                type:'POST',
                url:'ajaxDATA.php',
                data:'city_id='+cityID,
                success:function(html){
                    $('#pinc').html(html);
                }
            }); 
        }else{
            $('#pinc').html('<option value="">Select city first</option>'); 
        }
    });
});
</script>
            
        
</body>


<!-- edit-doctor24:06-->
</html>
