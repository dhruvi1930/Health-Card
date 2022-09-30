<?php 
include "connection.php";
if($_COOKIE['dr_logged']==null)
	{
		header("location:account_type.php");
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
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
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
      margin-right: 5px;
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
      max-width: 750px;
      padding: 20px;
      background-color: powderblue;
      }
      select {
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
      <div class="main-wrapper">
        <div class="header">
      <div class="header-left">
        <a href="dr_dashboard.php" class="logo">
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
						<!--<li class="active">
                            <a href="dr_condition.php"><i class="fas fa-allergies"></i><span>Conditions</span></a>
                        </li>-->
                         
                    </ul>
                </div>
            </div>
        </div>
      <center><br><br><br><br>
      <?php 
      $sql = " SELECT * FROM `medicines`";
      $res1 = mysqli_query($con, $sql);
      $sql = " SELECT * FROM `diseases`";
      $res2 = mysqli_query($con, $sql);
      $sql = " SELECT * FROM `tests`";
      $res3 = mysqli_query($con, $sql);
       
      ?>
	  <?php 
	   $id1 = $_SESSION['pid'];
	    $id2=$_SESSION['did'];
	   $sqlm = "SELECT max(id) FROM prescription where patient_id ='$id1'";
	   $resm = mysqli_query($con, $sqlm);
	   if($rowm = mysqli_fetch_array($resm)){
		   $id=$rowm[0]+1;
		   
	   }
	   else{
		   $id=1;
	   }
	       $sql22 = "SELECT * FROM prescription where patient_id = '$id1'";
     $result22 = mysqli_query($con, $sql22);
	    if (mysqli_num_rows($result22)>0) {
        
    while($row = mysqli_fetch_assoc($result22)){
		$prescribed_by=$row['prescribed_by'];
		
	}
		}
	   $sql23 = "SELECT * FROM doctor where doctor_id ='$id2'";
     $result23 = mysqli_query($con, $sql23);
	  if (mysqli_num_rows($result23)>0) {
        
    while($row = mysqli_fetch_assoc($result23)){
		$dname=$row['f_name'];
		
	}
	  }
	
	    $sql21 = "SELECT * FROM patient_details where patient_id = '$id1'";
     $result21 = mysqli_query($con, $sql21);
    if (mysqli_num_rows($result21)>0) {
        
    while($row = mysqli_fetch_assoc($result21)) {
             $fname = $row["fname"];
		 $mname = $row["mname"];
    	 $lname = $row["lname"];
	     $dob = $row["DOB"];
        $email = $row["email"];
		$gender = $row["gender"];
		$blood_group = $row["blood_group"];
        $phone = $row["contact_no"];
		 $height = $row["height"];
		  $weight = $row["weight"];
		   $address = $row["address"];
		    $city = $row["city"];
			 $state = $row["state"];
			  $pincode = $row["pincode"];
			   $marital_status = $row["marital_status"];
        $img = $row["image"];
   
    }
    }
	  # $sql = "SELECT count(id) FROM prescription where patient_id ='$id1'";
      # $res4 = mysqli_query($con, $sql);
      # $row4 = mysqli_fetch_array($res4); echo $row4[0]+1; 
	  ?>

     
   
   
   
    <script>
  
      function addRow(tableID) {
     var table = document.getElementById(tableID);
      var rowCount = table.rows.length;
      var row = table.insertRow(rowCount);
    
      var colCount = table.rows[0].cells.length;

      for(var i=0; i<colCount; i++) {

        var newcell = row.insertCell(i);

        newcell.innerHTML = table.rows[0].cells[i].innerHTML;
    
        switch(newcell.childNodes[0].type) {
          case "text":
              newcell.childNodes[0].value = "";
              break;
          case "checkbox":
              newcell.childNodes[0].checked = false;
              break;
          case "select-one":
              newcell.childNodes[0].selectedIndex = 0;
              break;
        }
      }
    }

    function deleteRow(tableID) {
      try {
      var table = document.getElementById(tableID);
      var rowCount = table.rows.length;

      for(var i=0; i<rowCount; i++) {
        var row = table.rows[i];
        var chkbox = row.cells[0].childNodes[0];
        if(null != chkbox && true == chkbox.checked) {
          if(rowCount <= 1) {
            alert("Cannot delete all the rows.");
            break;
          }
          table.deleteRow(i);
          rowCount--;
          i--;
        }


      }
      }catch(e) {
        alert(e);

      }
    }
      function openForm() {
        document.getElementById("popupForm").style.display="block";
      }
      
      function closeForm() {
        document.getElementById("popupForm").style.display="none";
      }
    </script>
        <br>
        <br>
        <br>
        <br>
		<form action="#" method="post">
		<?php  $sql = " SELECT * FROM `diseases`";
      $res2 = mysqli_query($con, $sql);?>
		<div class='container' style="margin-top:1px;margin-left:303px;"><input list="Diagnosis" style="width: 80%;" placeholder="Enter Diagnosis" name="diag" type="text" required/>
         <input type="submit" name="submit" value="search"> <datalist id="Diagnosis">
            <?php  
             while($row2 = mysqli_fetch_array($res2)){  
            echo '<option value="'.$row2['Diseases'].'">'.$row2['Diseases'].'</option>';   }
             ?>
          </datalist></div></form>
		  
		  
		  
		  
		  
       <div class='container' style="margin-top:1px;margin-left:303px;">
            <table border='1' style="background-color:powderblue;width:900px;" >
                <tr style='background: whitesmoke;'>
                    <th>S.no</th>
                    <th>Date</th>
                    <th>Diagonise</th>
                    <th>Medicines</th>
                    <th>Dosage</th>
                    <th>Frequency</th>
                    <th>Note</th>
                </tr>

                <?php 
				
                $query = "SELECT * FROM prescription where patient_id='$id1'";
                $result = mysqli_query($con,$query);
				
				if(isset($_POST['submit']))
				{
					$diag=$_POST['diag'];
					$query = "SELECT * FROM prescription where patient_id='$id1' and diagnosis='$diag'";
					$result = mysqli_query($con,$query);
				}
               
                #$count = 1;
                while($row = mysqli_fetch_array($result) ){
                    $date= $row['date'];
                    $id = $row['id'];
                    $diag = $row['diagnosis'];
                    $med = $row['medicine']; 
                    $med_arr = explode (",", $med);  
                    $note = $row['note'];
                    $dosage = $row['dosage'];
                    $dose = $row['dosage_type'];
                    $f = $row['frequency'];
                    $day = $row['frequency_days'];

                ?>
                    <tr>
                        <td align='center' style="width:100px;"><?php echo "Visit_".$id; ?></td>
                        <td style="width:100px;"><?php echo $date; ?></td>
                        <td style="width:100px;"><?php echo $diag; ?></td>
                        <td style="width:100px;"><ul><?php $ite=0; $var=sizeof($med_arr);
                        while($ite!=$var) {?><li><?php echo $med_arr[$ite]; ?></li><?php $ite=$ite+1; } ?></ul></td>
                        <td style="width:100px;"><?php echo $dosage." ".$dose ?> </td>
                        <td style="width:100px;"><?php echo $f." time a day for ".$day." days" ?> </td>
                        <td style="width:100px;"><?php echo $note; ?></td>
                    </tr>
                <?php
                   # $count++;
                }
                
                ?>
                 </table>              
        </div> 
      </center><br>
     
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