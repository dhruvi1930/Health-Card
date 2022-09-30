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
        $fname = $_POST['f_name'];
        $mname = $_POST['m_name'];
        $lname = $_POST['l_name'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $phone1 = $_POST['phone'];
        $hospitalid = $_POST['hospital_id'];
        $pass = $_POST['password'];
        $speciality=$_POST['speciality'];
        $state=$_POST['state'];
        $district=$_POST['district'];
        $city=$_POST['city'];
        $pin=$_POST['pincode'];
        $add=$_POST['address'];
        $gender=$_POST['gender'];
        $license=$_POST['rno'];
		$z=0;
         $q1 = "SELECT * FROM dr_validation where Registration_Number='$license'";
         $result20=mysqli_query($con,$q1);
		        if ($result20 ->num_rows > 0){
             $z = 1;
}
else{
	 echo '<script>alert("License Number Does Not Exsits");</script>';
}
        
         
 function unique_code()
            {
                return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0,4);
            }
            $did="dr".$pin.unique_code();
        $_SESSION["did"] = $did;
$path = 'img/doctor/QR/'; 
$file = $path.$did.".png"; 
  
$ecc = 'L'; 
$pixel_Size = 10; 
$frame_Size = 10; 
  


   $check1="select * from doctor where email='$email'";
   $y = 0;
   $x = 0;
        $result2=mysqli_query($con,$check1);
         if ($result2 ->num_rows > 0){
             $y = 1;
}
$check2="select * from doctor where phone='$phone1'";
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



   
        
        if($value==0 && $y==0 && $x==0 && $z==1){
        $pass=md5($pass);
$insert_query = "INSERT INTO doctor (doctor_id,f_name,m_name,l_name,email,phone,DOB,hospital_id,password,qr_path,speciality,state,district,city,address,pincode,gender) VALUES ('$did','$fname','$mname','$lname','$email','$phone1','$dob','$hospitalid','$pass','$file','$speciality','$state','$district','$city','$add','$pin','$gender') ";
      $a = mysqli_query($con,$insert_query);
      QRcode::png($did, $file, $ecc, $pixel_Size, $frame_Size); 
      header("location:doctor_upload.php");
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
        <a href="dr_sign_up.php" class="logo">
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
                        <input type="text" class="form-control " name="rno" placeholder="Enter License number" required>
                      </div>
                    </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name <!--<span class="text-danger">*</span>--></label>
                                        <input type="text" class="form-control" placeholder="Enter First Name" name="f_name" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Middle Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Middle Name" name="m_name" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name<!--<span class="text-danger">*</span>--></label>
                                        <input type="text" class="form-control" placeholder="Enter Last Name" name="l_name" required>
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
                                        
                                        <input type="number" class="form-control" placeholder="Enter Phone No" name="phone"  maxlength="10"    required >
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <!--<span class="text-danger">*</span>--></label>
                                        
                                        <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Hospital Id <!--<span class="text-danger">*</span>--></label>
                                        <input type="text" class="form-control" placeholder="Enter Hospital Id" name="hospital_id" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Speciality <!--<span class="text-danger">*</span>--><br><label>
                                        <input type="text" class="form-control" placeholder="Enter Speciality" name="speciality">
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
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Hospital Address</label>
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
                       <select id="dist" class="form-control" name="district" required>
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
                       <select id="pinc"  class="form-control" name="pincode" required>
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
