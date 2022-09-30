<?php 
if($_COOKIE['med_logged']==null)
	{
		header("location:account_type.php");
	}
include "connection.php";

$pid=$_SESSION['pid'];
$mid=$_SESSION['ms_id'];

  $query3 = "SELECT * FROM medical_store where ms_id='$mid'";
  $result3 = mysqli_query($con,$query3);
   if (mysqli_num_rows($result3)>0){
	    while($row = mysqli_fetch_assoc($result3)) {

		$id=$row['ms_id'];
		$msname=$row['ms_name'];
		 
	 }
   }
				
?>
               <?php
if(isset($_POST['submit'])){//to run PHP script on submit
if(!empty($_POST['check_list'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected){
$sql = "UPDATE prescription SET `taken_from`='$mid' WHERE `id`='$selected' "; 
 $result = mysqli_query($con,$sql);
}
}
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
      /*.form-container .btn:hover, .open-button:hover {
      opacity: 1;
      }*/
       table
      {
        border-radius:20px;
      overflow: hidden;
      border-collapse: collapse;
      border-color:white;

      }
      th
      {
        background-color:#009efb;
        padding:10px;
        border-color:#009efb;
        height:60px;
        color:white;
      }
      tr:hover{background-color:#80d0ff;}
      td
      {
       
        height:45px;
        padding:9px;
      }
      
    </style>
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
                   
                         <!-- <li class="active">
                            <a href="patient_allergy_habit.php"><i class="fa fa-dashboard"></i><span>Allergy And Habit</span></a>
                        </li> -->
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <center><br><br><br><br>
          <div style="width:800px;margin-left:250px;"><br>
<div class='container' >
  <table border='1' style="margin-left:350px;width:400px;">
  <tr><th  style="color:white;">Medical Id : <?php echo $id; ?></th></tr>
    <tr><th  style="color:white;">Medical Store Name : <?php echo $msname; ?></th></tr>
      <tr><th  style="color:white;">Date : <?php echo date("d/m/Y"); ?></th></tr>
  </table></div><br><br>
       <div class='container'>
            <table border='1' style="width:750px;">
              <form action="#" method="post">
                <tr style='background: whitesmoke;'>
                    <th>S.no</th>
                    <th>Date of prescription</th>
                    <th>Medicine</th>
                    <th>Notes</th>
                    <th>Taken</th>
                </tr>

                <?php 

                $query = "SELECT * FROM prescription where TRIM(medicine) > '' And taken_from='N/A' and patient_id='$pid'";
                $result = mysqli_query($con,$query);

                #$count = 1;
                while($row = mysqli_fetch_array($result) ){
                    $date= $row['date'];
                    $id = $row['id']; 
                    $med = $row['medicine'];
                    $med_arr = explode (",", $med);
                    $note = $row['note'];
                ?>
                    <tr>
                        <!--<td align='center'><?php echo $count; ?></td>-->
						<td align='center'><?php echo "Visit_".$id; ?></td>
                        <td><?php echo $date; ?></td>
                        <td><ul><?php $ite=0; $var=sizeof($med_arr);
                        while($ite!=$var) {?><li><?php echo $med_arr[$ite]; ?></li><?php $ite=$ite+1; } ?></ul></td>
                        <td><?php echo $note; ?></td>   
                        <td><input type="checkbox" name="check_list[]" value="<?php echo $id;?>"></td>   
                    </tr>
                <?php
                    #$count++;
                }
                
                ?>
 
                <input type="submit" name="submit">
                </form>
            </table>
            <br>
        </div>
      </div>
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