<?php
if($_COOKIE['dr_logged']==null)
	{
		header("location:account_type.php");
	}
session_start();

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "project"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}?>


<html>
    <head>
        <title>How to Delete Record from MySQL Table with AJAX</title>
        <link href='style.css' rel='stylesheet' type='text/css'>
        <script src='jquery-3.0.0.js' type='text/javascript'></script>
        <script src='script.js' type='text/javascript'></script>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
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
      .custom-select {
  position: relative;
  font-family: Arial;
}

.custom-select select {
  display: none; /*hide original SELECT element:*/
}

.select-selected {
  background-color: #000;
}

/*style the arrow inside the select element:*/
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}

/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}

/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
  user-select: none;
}

/*style items (options):*/
.select-items {
  position: absolute;
  background-color: #444;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}

/*hide the items when the select box is closed:*/
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: #000;
}
      .name{
        width: 25%;
      }
      td{
    padding: 20px;      }
      /* Style submit/login button */
      .form-container .btn {
      background-color: #8ebf42;
      color: #fff;
      padding: 12px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom:10px;
      opacity: 0.8;
      }
       
       table {
      max-width: 700px;
      padding: 20px;
      background-color: #4da6ff;
      border:1px solid black;
      width:95%;
      margin-left:200px;
      }
     tr,th,td {
      max-width: 700px;
      padding: 20px;
     
     border:1px solid black;
      }

     
      /* Style cancel button */
      .form-container .cancel {
      background-color: #cc0000;
      }
      /* Hover effects for buttons */
      .form-container .btn:hover, .open-button:hover {
      opacity: 1;
      }
    </style>
    </head>
    <body>
       <div class="main-wrapper" style="padding:20px">
        <div class="header">
      <div class="header-left">
        <a href="dr_dashboard.php" class="logo">
          <img src="assets/img/logo.png" width="35" height="35" alt=""> <span>Preclinic</span>
        </a>
      </div>
       <a id="toggle_btn" href="javascript:void(0);" style="margin-top:16px;margin-left:-15px;"><i class="fa fa-bars"></i></a>
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
                            <a href="dr_dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
						 <li class="active">
                            <a href="index_prescription.php"><i class="fas fa-prescription"></i><span>Prescription</span></a>
                        </li>
						 <li class="active">
                            <a href="dr_report_view.php"><i class="fas fa-allergies"></i><span>Pathological Reports</span></a>
                        </li>
                        <li class="active">
                            <a href="dr_patient.php"><i class="fa fa-wheelchair"></i> <span>Patient Information</span></a>
                        </li>
                         <li class="active">
                            <a href="dr_allergy_habit.php"><i class="fas fa-allergies"></i><span>Allergy And Habit</span></a>
                        </li>
                        <li class="active">
                            <a href="dr_patient_history.php"><i class="fas fa-prescription"></i><span>History</span></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
   
        <br>
        <br>
        <br>
        <br>
        <?php 
		$id1 = $_SESSION['pid'];
                $query = "SELECT * FROM allergies_habits where patient_id= '$id1' ";
                $result = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($result)){
                    $id= $row['patient_id'];
                    $drug = $row['Drug'];
                    $food = $row['Food'];
                    $insect = $row['Insect'];
                    $latex = $row['Latex'];
                    $pollen = $row['Pollen'];
                    $dust = $row['Dust'];
                    $pet = $row['Pet'];
                    $alcohol = $row['Alcohol'];
                    $smoke = $row['Smoke'];
                    $tobacco = $row['Tobacco'];
                    $note = $row['note'];
                  }
                ?>
        <div class='container'>
          <center>
            <table  width="50%" >
                <tr>
                 <th colspan="2" style="text-align:center;color:white;font-size:30px;">Allergies</th>
                </tr>
                <tr style='background: whitesmoke;'>
                    <th>Drug Allergy</th>
                    <td><?php echo $drug; ?></td>
                </tr>
                <tr style='background: whitesmoke;'>
                    <th>Food Allergy</th>
                    <td><?php echo $food; ?></td>
                </tr>
                <tr style='background: whitesmoke;'>
                    <th>Insect Allergy</th>
                    <td><?php echo $insect; ?></td>
                </tr>
                <tr style='background: whitesmoke;'>
                    <th>Latex Allergy</th>
                    <td><?php echo $latex; ?></td>
                </tr>
                <tr style='background: whitesmoke;'>
                    <th>Pet Allergy</th>
                    <td><?php echo $pet; ?></td>
                </tr>
                <tr style='background: whitesmoke;'>
                    <th>Pollen Allergy</th>
                    <td><?php echo $pollen; ?></td>
                </tr>
                <tr style='background: whitesmoke;'>
                    <th>Dust Allergy</th>
                    <td><?php echo $dust; ?></td>
                </tr>
                <tr>
                  <th colspan="2" style="text-align:center;color:white;font-size:30px;">Habits</th>
                </tr>
                <tr style='background: whitesmoke;'>
                    <th>Alcohol</th>
                    <td><?php echo $alcohol; ?></td>
                </tr>
                <tr style='background: whitesmoke;'>
                    <th>Smoke</th>
                    <td><?php echo $smoke; ?></td>
                </tr>
                <tr style='background: whitesmoke;'>
                    <th>Tobacco</th>
                    <td><?php echo $tobacco; ?></td>
                </tr>
                <tr>
                  <th colspan="2" style="text-align:center;color:white;font-size:30px;">Note</th>
                </tr>
                <tr style='background: whitesmoke;'>
                    <td colspan="2"><?php echo $note; ?></td>
                </tr>

               <!-- <td >
                <a style="color:red;"href="allergy_habit_edit.php?id=<?php echo $id;?>"><strong>Update</strong></a></td>  -->
            </center>
          </table><br>
          <button type="submit" style="text-decoration:underline;margin-right:-200px;border:2px solid white;background-color:#4da6ff;width:150px;height:50px; " class="btn" name="Update"><a style="color:white;font-size:20px;"href="allergy_habit_edit.php?id=<?php echo $id;?>">Update</a></button>
        </div>
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
