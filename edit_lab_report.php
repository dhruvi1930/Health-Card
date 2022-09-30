<?php 
include "connection.php";
$id = $_GET['id'];
#$cid = $_GET['cid'];
$pid= $_SESSION['pid'];
$lid = $_SESSION['lab_id'];
?>
<?php 

$query = "SELECT * FROM prescription where patient_id='$pid' and id='$id' ";
                $result = mysqli_query($con,$query);
                if($row = mysqli_fetch_array($result)){
                    $date= $row['date'];
                    $id1 = $row['id']; 
                    $test = $row['tests'];
                    $test_arr = explode(",", $test);
                    $tdate = $row['test_date'];
                    $report = $row['report'];
                  }
                ?>  
        <?php  
        if(isset($_POST["submit"]))
        {

$targetfolder = "testupload/";

 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
echo $targetfolder;

if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))

{
            $dt = date("y/m/d");
                  
                $insert_query = "UPDATE prescription SET test_date='$dt',report='$targetfolder',tested_by='$lid' where id='$id' and patient_id='$pid'";
      $a = mysqli_query($con,$insert_query);
header('location:index_lab_report.php');
 }

 else {

 echo "Problem uploading file";

 }
}
$query3 = "SELECT * FROM patient_details where patient_id='$pid' ";
                $result3 = mysqli_query($con,$query3);
				 if($row = mysqli_fetch_array($result3)){
                      $fname= $row['fname'];
					  $mname= $row['mname'];
					  $lname= $row['lname'];
                  }
				  
				  $query4 = "SELECT * FROM laboratory where lab_id='$lid' ";
                $result4 = mysqli_query($con,$query4);
				 if($row = mysqli_fetch_array($result4)){
                      $lab_name= $row['lab_name'];
					  #$mname= $row['mname'];
					 #$lname= $row['lname'];
                  }
   ?>
<!doctype html>
<html>
    <head>
        <title>How to Delete Record from MySQL Table with AJAX</title>
        <link href='style.css' rel='stylesheet' type='text/css'>
        <script src='jquery-3.0.0.js' type='text/javascript'></script>
        <script src='script.js' type='text/javascript'></script>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <style>
      * {
      box-sizing: border-box;
      }
      body {
      font-family: Roboto, Helvetica, sans-serif;
      }
      /* Fix the button on the left side of the page */
      .open-btn {
      display: flex;
      justify-content: left;
      }
      /* Style and fix the button on the page */
      .open-button {
      background-color: #1c87c9;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      opacity: 0.8;
      position: fixed;
      }
      /* Position the Popup form */
      .login-popup {
      position: static;
      text-align: center;
      width: 100%;
      }
      /* Hide the Popup form */
      .form-popup {
     display: none;
      position: fixed;
      left: 45%;
      top:5%;
      width: 40%;
      transform: translate(-50%,5%);
      border: 2px solid #666;
      height: 80%;
      z-index: 9;
      overflow-y : scroll;

      }
      /* Styles for the form container */
      .form-container {
      max-width: 700px;
      padding: 20px;
      background-color: powderblue;
      }
      /* Full-width for input fields */
      .form-container input[type=text], .form-container input[type=password] {
      width: 100%;
      padding: 10px;
      margin: 5px 0 22px 0;
      border: none;
      background: #eee;
      }
      /* When the inputs get focus, do something */
      .form-container input[type=text]:focus, .form-container input[type=password]:focus {
      background-color: #ddd;
      outline: none;
      }
      /* Style submit/login button */
      .form-container .btn {
       background-color: #000044;
      color: #fff;
      padding: 12px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom:10px;
      opacity: 0.8;
      }
      /* Style cancel button */
      .form-container .cancel {
      background-color: #cc0000;
      }
      /* Hover effects for buttons */
      .form-container .btn:hover, .open-button:hover {
      opacity: 1;
      }
    </style></head>
<body> <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="lab_dashboard.php" class="logo">
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
                            <a href="lab_dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        <!-- <li class="active">
                            <a href="#"><i class="fa fa-wheelchair"></i> <span>Patient Information</span></a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
  <center>
<?php $pid= $_SESSION['pid'];
                $query = "SELECT * FROM prescription where TRIM(tests) > '' and patient_id='$pid' and id='$id' ";
                $result = mysqli_query($con,$query);

                #$count = 1;
                while($row = mysqli_fetch_array($result) ){
                    $date= $row['date'];
                    $id = $row['id']; 
                    $test = $row['tests'];
                    $test_arr = explode(",", $test);
                    if($row['report'])
                    {
                    $tdate = $row['test_date'];
                    $report = $row['report'];
                    $report_name = explode ("/", $report);
                    }else{
                       $tdate = " ";
                    $report = " ";
                    $report_name = " "; 
                    } ?>
             <form action="#" class="form-container" method="post" enctype="multipart/form-data" style="margin-left:250px;margin-top:100px;width:700px;height:600px;">
          <table border="1" style="height:550px;width:650px;">
          <tr>
            <th colspan="2">
          <h2 style="text-align:center;">Reports</h2><br><h4 style="float:left;">Date:&nbsp;<?php echo date("d/m/y");?></h4>
          <h4 style="float: right;">Id:&nbsp;<?php echo "report_".$id;?></h4></th></tr>

<tr><td colspan="2"><h5 style="float: left;">Patient Id:&nbsp;<?php echo $pid;?></h5><h5 style="float: right;">Doctor Id:&nbsp;<?php echo "DrId fetch here";?></h5></td></tr><tr><td colspan="2">
<h5 style="float: left;">Patient Name:&nbsp;<?php echo $fname." ".$mname." ".$lname;?></h5><h5 style="float: right;">Doctor Name:&nbsp;<?php echo "DrName fetch here";?></h5></td></tr><tr><td colspan="2">
<h5 style="float: left;">Lab Name:&nbsp;<?php echo $lab_name;?></h5><h5 style="float: right;">Lab Id:&nbsp;<?php echo $lid;?></h5></td></tr>
<tr><td><h4>Tests</h4></td>
<td><ul><?php $ite=0; $var=sizeof($test_arr);
                        while($ite!=$var) {?><li><?php echo $test_arr[$ite]; ?></li><?php $ite=$ite+1; } ?></ul></td>


<tr><td><h4>reports</h4></td><td>
<input class="btn" type="file" name="file" size="50"  />

</td></tr><tr><td colspan="2">

<input class="btn" type="submit" name ="submit" value="Upload" />
</td></tr>
 <?php
                 
                }
                
                ?>
        </table>
     </form>  
   

   
        

</center>
<div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>
</body>
    </html>