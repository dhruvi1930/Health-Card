<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "project"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
 
$id = $_GET['id'];

 
 if(isset($_POST["submit"])){
                    $drug = $_POST['drug'];
                    $food = $_POST['food'];
                    $insect = $_POST['insect'];
                    $latex = $_POST['latex'];
                    $pollen = $_POST['pollen'];
                    $dust = $_POST['dust'];
                    $pet = $_POST['pet'];
                    $alcohol = $_POST['alcohol'];
                    $smoke = $_POST['smoke'];
                    $tobacco = $_POST['tobacco'];
                    $note = $_POST['note'];
    $insert_query = "UPDATE `allergies_habits` SET `Drug`='$drug',`Food`='$food',`Insect`='$insect',`Latex`='$latex',`Pet`='$pet',`Pollen`='$pollen',`Dust`='$dust',`Alcohol`='$alcohol',`Smoke`='$smoke',`Tobacco`='$tobacco',`note`='$note' WHERE `patient_id`='$id'";
      $a = mysqli_query($con,$insert_query);
      header('location:dr_allergy_habit.php');
                }
        ?>
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
      select{
      width: 100%;
      padding: 10px;
      margin: 5px 0 22px 0;
      border: none;
      background: #eee;
      }
      /* When the inputs get focus, do something */
      select:focus {
      background-color: #ddd;
      outline: none;
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
                            <a href="dr_patient.php"><i class="fa fa-wheelchair"></i> <span>Patient Information</span></a>
                        </li>
                         <li class="active">
                            <a href="dr_allergy_habit.php"><i class="fa fa-wheelchair"></i> <span>Allergy And Habit</span></a>
                        </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
      <center><br><br><br><br>
<?php 
                $query = "SELECT * FROM allergies_habits where patient_id='$id' ";
                $result = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($result)){
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
<form  action="#" method="post"  class="form-container" style="margin-left:220px;">
          <table border="1" width="100%">
          <tr>
            <th colspan="2">
          <h2 style="text-align:center;">Allergies</h2></th></tr>
          <tr>
              <td class="name">
                  <label for="drug">
                   <strong>Drug Allergy</strong>
                  </label>
              </td>
              <td>
                  <select id="drug" name="drug">
                    <option value="<?php echo $drug; ?>"><?php echo $drug; ?></option>
                   <option value="N/A">N/A</option>
                   <option value="mild">Mild</option>
                   <option value="moderate">Moderate</option>
                   <option value="severe">Severe</option>
                  </select>
              </td>
              </tr>
<tr>
              <td class="name">
                  <label for="food">
                    <strong>Food Allergy</strong>
                  </label>
              </td>
              <td>
                  <select id="food" name="food">
                    <option value="<?php echo $food; ?>"><?php echo $food; ?></option>
                      <option value="N/A">N/A</option>
                      <option value="mild">Mild</option>
                      <option value="moderate">Moderate</option>
                      <option value="severe">Severe</option>
                  </select>
              </td>
        </tr>
        <tr>
              <td class="name">
                  <label for="insect">
                   <strong>Insect Allergy</strong>
                  </label>
              </td>
              <td>
                  <select id="insect" name="insect" value="<?php echo $insect; ?>">
                    <option value="<?php echo $insect; ?>"><?php echo $insect; ?></option>
                   <option value="N/A">N/A</option>
                   <option value="mild">Mild</option>
                   <option value="moderate">Moderate</option>
                   <option value="severe">Severe</option>
                  </select>
              </td>
              </tr>
<tr>
              <td class="name">
                  <label for="latex">
                    <strong>Latex Allergy</strong>
                  </label></td><td>
                   
                  <select id="latex" name="latex" value="<?php echo $latex; ?>">
                   <option value="<?php echo $latex; ?>"><?php echo $latex; ?></option>
                      <option value="N/A">N/A</option>
                      <option value="mild">Mild</option>
                      <option value="moderate">Moderate</option>
                      <option value="severe">Severe</option>
                  </select>
              </td>
        </tr>
        <tr>
              <td class="name">
                  <label for="pet">
                   <strong>Pet Allergy</strong>
                  </label>
              </td>
              <td>
                  <select id="pet" name="pet" value="<?php echo $pet; ?>">
                    <option value="<?php echo $pet; ?>"><?php echo $pet; ?></option>
                   <option value="N/A">N/A</option>
                   <option value="mild">Mild</option>
                   <option value="moderate">Moderate</option>
                   <option value="severe">Severe</option>
                  </select>
              </td>
              </tr>
<tr>
              <td class="name">
                  <label for="pollen">
                    <strong>Pollen Allergy</strong>
                  </label></td><td>
                  <select id="pollen" name="pollen"  value="<?php echo $pollen; ?>">
                    <option value="<?php echo $pollen; ?>"><?php echo $pollen; ?></option>
                      <option value="N/A">N/A</option>
                      <option value="mild">Mild</option>
                      <option value="moderate">Moderate</option>
                      <option value="severe">Severe</option>
                  </select>
              </td>
        </tr>
        <tr>
              <td class="name">
                  <label for="dust">
                   <strong>Dust Allergy</strong>
                  </label>
              </td>
              <td>
                  <select id="dust" name="dust" value="<?php echo $dust; ?>">
                    <option value="<?php echo $dust; ?>"><?php echo $dust; ?></option>
                   <option value="N/A">N/A</option>
                    <option value="mild">mild</option>
                   <option value="moderate">Moderate</option>
                   <option value="severe">Severe</option>
                  </select>
              </td>
        </tr>

   <tr>
            <th colspan="2">
          <h2 style="text-align:center;">Habits</h2></th></tr>
          <tr>
              <td class="name">
                  <label for="smoke">
                   <strong>Smoking</strong>
                  </label>
              </td>
              <td>
                  <select id="smoke" name="smoke" value="<?php echo $smoke; ?>">
                    <option value="<?php echo $smoke; ?>"><?php echo $smoke; ?></option>
                   <option value="N/A">N/A</option>
                   <option value="Quit">Quit</option>
                   <option value="occasionally">occasionally</option>
                   <option value="often">often</option>
                  </select>
              </td>
</tr>
<tr>
              <td class="name">
                  <label for="alcohol">
                    <strong>Alcohol</strong>
                  </label></td><td>
                  <select id="alcohol" name="alcohol" value="<?php echo $alcohol; ?>">
                    <option value="<?php echo $alcohol; ?>"><?php echo $alcohol; ?></option>
                      <option value="N/A">N/A</option>
                      <option value="Quit">Quit</option>
                      <option value="occasionally">occasionally</option>
                      <option value="often">often</option>
                  </select>
              </td>
        </tr>
        <tr>
              <td class="name">
                  <label for="tobacco">
                   <strong>Tobacco</strong>
                  </label>
              </td>
              <td>
                  <select id="tobacco" name="tobacco" value="<?php echo $tobacco; ?>">
                    <option value="<?php echo $tobacco; ?>"><?php echo $tobacco; ?></option>
                      <option value="N/A">N/A</option>
                      <option value="Quit">Quit</option>
                      <option value="occasionally">occasionally</option>
                      <option value="often">often</option>
                  </select>
              </td>
        </tr>



        <tr><td colspan="2">
      <label for="note">
         <h2 style="text-align:center;"> <strong >Note</strong> </h2>
          </label></td></tr><tr><td colspan="2"><INPUT style="width: 80%;" value="<?php echo $note; ?>" type="text" name="note" id="note"/>
         </td></tr><table><tr><td>
          <button type="submit" style="text-decoration:underline;" class="btn" name="submit">Submit</button></td><td>
          <button type="button" class="btn cancel"><a href="dr_allergy_habit.php" style="color:white;text-decoration:underline;">Cancel</a></button></td></tr></table>
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
