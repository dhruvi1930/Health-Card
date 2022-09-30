<!DOCTYPE html>
<html>
  <?php

session_start();
include 'connection.php';
?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  h1
  {
    color:#00ccff;
    text-align:center;
    margin-top:50px;
  }
body {font-family: Arial, Helvetica, sans-serif;}
form 
{
  border: 2px solid #00ccff;
  width:500px;
  border-radius:10%;
  margin-left:470px;
  margin-top:100px;
  padding:10px;
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
    border-radius:10px;
}

button {
  background-color:#0099ff;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width:100px;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
 
}
a
{
  color:#0099ff;
}
</style>
</head>
<body>

<h1>Login Form</h1>

<form  action="#" method="post"><!-- action=index2.html"-->
  <div class="imgcontainer">
    
  </div>

  <div class="container">
    <label for="doctor_id"><b>ID</b></label>
    <input type="text" placeholder="ID" name="patient_id"  value="<?php echo $_POST['qr'];?>">

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit" style="border-radius:10px" name="submit">Login</button>
    <br><br>
    <div class="psw"><a style="text-decoration:none" href="http://localhost/admin_data/forgot-password.html">Forgot Password?</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a style="text-decoration:none" href="http://localhost/admin_data/patient_sign_up.php">Sign Up</a>
    </div>

  </div>
</form>
    <?php
    
    if(isset($_POST['submit'])){
       
    $pid=$_POST['patient_id'];
        $check="SELECT * FROM patient_details where patient_id='$pid'";
        $result1=mysqli_query($con,$check);
        $x=0;
        if ($result1 ->num_rows > 0){
    while($row1 = $result1-> fetch_assoc()) {
        
             if($row1["patient_id"] == $pid){
                 $x=1;
             }
    }
}
        if($x==0){
            
                   		  echo '<script type="text/JavaScript">  
     alert("ID Not Found!!!!"); 
     </script>' 
; 
        }
       $check1="select * from patient_details where patient_id='$pid'";
        $y=0;
        $result2=mysqli_query($con,$check1);
        $pass=$_POST['password'];
        if ($result2 ->num_rows > 0){
    while($row2 = $result2-> fetch_assoc()) {
        
             if( $row2["password"] == $pass ){
                 $y=1;
             }
    }
}
        if($y==1){
            $_SESSION['patient_id'] = $pid;
            header("location:http://localhost/admin_data/dr_dashboard.php?set:true");
        }else{
             echo '<script type="text/JavaScript">  
     alert("User Does Not Exists!! Please Sign Up"); 
     </script>' 
; 
            
        }
        
    }
        
    ?>

</body>
</html>