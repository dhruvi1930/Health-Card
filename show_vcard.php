<!DOCTYPE html>
<html>
    <head>
    <style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 50%;
    margin-left:auto; 
    margin-right:auto;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
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
<?php
    
$fn="";
$mn="";
$ln="";
$ema="";
$ph="";
$hid="";
$pa="";
$qpath="";
$di=$_POST["u_id"];
  $q1="SELECT f_name FROM doctor WHERE doctor_id = '$di' ";
        $result1=mysqli_query($con,$q1);
        if ($result1 ->num_rows > 0){
    while($row1 = $result1-> fetch_assoc()) {
        
            $fn= $row1["f_name"];
    }
}  
    if($fn == "")
    {
        ?>
    <script>
        
        if(confirm('data does not exist please check your id'))
            {
                location.replace("http://localhost/Preclinic-Hospital-Bootstrap4-Admin-20200207T171544Z-001/vcard.php")
            }
       
        </script>
    
    <?php
    }
         $q16="SELECT m_name FROM doctor WHERE doctor_id = '$di' ";
        $result16=mysqli_query($con,$q16);
        if ($result16 ->num_rows > 0){
    while($row16 = $result16-> fetch_assoc()) {
        
            $mn= $row16["m_name"];
    }
}  
         $q2="SELECT l_name FROM doctor WHERE doctor_id = '$di' ";
        $result2=mysqli_query($con,$q2);
        if ($result2 ->num_rows > 0){
    while($row2 = $result2-> fetch_assoc()) {
        
            $ln= $row2["l_name"];
    }
}  
         $q12="SELECT email FROM doctor WHERE doctor_id = '$di' ";
        $result12=mysqli_query($con,$q12);
        if ($result12 ->num_rows > 0){
    while($row12 = $result12-> fetch_assoc()) {
        
            $ema= $row12["email"];
    }
}  
        $q13="SELECT phone FROM doctor WHERE doctor_id = '$di' ";
        $result13=mysqli_query($con,$q13);
        if ($result13 ->num_rows > 0){
    while($row13 = $result13-> fetch_assoc()) {
        
            $ph= $row13["phone"];
    }
}   
         $q14="SELECT hospital_id FROM doctor WHERE doctor_id = '$di' ";
        $result14=mysqli_query($con,$q14);
        if ($result14 ->num_rows > 0){
    while($row14 = $result14-> fetch_assoc()) {
        
            $hid= $row14["hospital_id"];
    }
}  
   $q144="SELECT qr_path FROM doctor WHERE doctor_id = '$di' ";
        $result144=mysqli_query($con,$q144);
        if ($result144 ->num_rows > 0){
    while($row144 = $result144-> fetch_assoc()) {
        
            $qpath= $row144["qr_path"];
    }
}       
    
    
?>    
<h1>Your  V-CARD</h1>
   <table id="customers">
    
       <tr>
       <td>id</td>
           <td> <?php echo $_POST["u_id"] ?></td>
           
       </tr>
       <tr>
       <td>first_name</td>
        <td> <?php echo $fn ?></td>
       </tr>
       <tr>
       <td>middle_name</td>
           <td> <?php echo $mn ?></td>
       </tr>
       <tr>
       <td>last_name</td>
           <td> <?php echo $ln ?></td>
       </tr>
       <tr>
       <td>email</td>
           <td> <?php echo $ema ?></td>
       </tr>
       <tr>
       <td>phone</td>
           <td> <?php echo $ph ?></td>
       </tr>
       <tr>
       <td>hospital_id</td>
           <td> <?php echo $hid ?></td>
       </tr>
       <tr>
       <td>QR_CODE</td>
           <td> <img src="<?php echo $qpath ?>" height="200px" width="200px" alt=""> </td>
       </tr>
    </table>
    
    
    
    
    
    
    
    
    </body>
</html>