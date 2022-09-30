
    <?php

session_start();
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'project');

$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if(!$con){
    die("Connection Failed".mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html>
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

input[type=text], input[type=password] ,input[type=email]{
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

<h1>Sign Up</h1>
<form action="#" method="post">
  <div class="imgcontainer">
    <img src="img/dr_login.png" class="avatar">
  </div>

  <div class="container">
    

    <label for="f_name"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="f_name" required>
    
    <label for="m_name"><b>Middle Name</b></label>
    <input type="text" placeholder="Enter Middle Name" name="m_name" required>

    <label for="l_name"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="l_name" required>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="phone"><b>Phone No</b></label>
    <input type="text" placeholder="Enter Phone No" name="phone"  maxlength="10"    required ><br>

    <label for="hospital_id"><b>Hospital Id</b></label>
    <input type="text" placeholder="Enter Hospital Id" name="hospital_id" required>

    
       
    <button type="submit" style="border-radius:10px" name="submit">Submit</button> 
      
  </div>
</form>
<div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
    <?php
    
    
    if(isset($_POST['submit']))
    {
                
        include 'phpqrcode/qrlib.php'; 
        function unique_code()
        {
          return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 10);
        }
        $did=unique_code();
        $path = 'img/'; 
        $file = $path.$did.".png";        
        $ecc = 'L'; 
        $pixel_Size = 10; 
        $frame_Size = 10; 
        QRcode::png($did, $file, $ecc, $pixel_Size, $frame_Size); 
        $fname = $_POST['f_name'];
        $mname = $_POST['m_name'];
        $lname = $_POST['l_name'];
        $email = $_POST['email'];
        $phone1 = $_POST['phone'];
        $hospitalid = $_POST['hospital_id'];
        //$pass = $_POST['password'];
        $_SESSION["did"] = $did;
        $q1 = "SELECT * FROM mytable where Registration_Number='$hospitalid'";
        $result2=mysqli_query($con,$q1);
        //$pass=$_POST['password'];
       // if(mysqli_query($con, $q1))
        //{
          //  echo "Nejndaskndkly";
        /*}else
        {
            echo "Error: " . $q1 . "<br>" . mysqli_error($con);    
        }*/
        if ($result2 ->num_rows == 1){
        while($row2 = $result2-> fetch_assoc()) {
        
              $insert_query = "INSERT INTO doctor (doctor_id,f_name,m_name,l_name,email,phone,hospital_id,qr_path) VALUES ('$did','$fname','$mname','$lname','$email','$phone1','$hospitalid','$file') ";
      $a = mysqli_query($con,$insert_query);
        header("location:cam.html");

        
       
        
    }}}
    ?>
</body>
</html>
