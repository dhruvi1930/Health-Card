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

     
    <div class="login-popup">
      <div class="form-popup" id="popupForm">
        
        <form  action="#" method="post"  class="form-container">
          <table border="1">
          <tr>
            <th colspan="2">
          <h2>Prescription</h2><h4 style="float: left;">Date:<?php echo date('d/m/y');?></h4><h4 style="float: right;">Id:Visit_<?php echo $id;?>
	   </h4></th></tr><tr><th colspan="2">

<table width=100% border='0'><tr><td><h5 style="float: left;padding: ">Patient Id:<?php echo " $id1 "?></h5></td><td><h5 style="float: right;">Doctor Id:<?php echo $id2;?></h5></td></tr>

<tr><td><h5 style="float: left;">Patient Name:<?php echo $fname;?></h5></td><td><h5 style="float: right;">Doctor Name:<?php echo $dname;?></h5></td></tr></table>
   </th> </tr><tr>
      <td rowspan="2">
          <label for="diagnosis">
          <strong>Diagnosis</strong>
          </label></td><td>
          <input list="Diagnosis" id="diag" style="width: 80%;" placeholder="Enter Diagnosis" name="Diagnosis" type="text" required/>
          <datalist id="Diagnosis">
            <?php  
             while($row2 = mysqli_fetch_array($res2)){  
            echo '<option value="'.$row2['Diseases'].'">'.$row2['Diseases'].'</option>';   }
             ?>
          </datalist></td></tr><tr><td><div id="showtext">
  <span class="tooltiptext" id="tooltext">View Suggestions</span>
</div></td></tr><tr><td>
            <label for="medicine">
          <strong>Medicine</strong>
          </label>
</td><td>
  <INPUT type="button" class="btn" style="width: 50%;float: left;border: 1;" value="Add Row" onclick="addRow('dataTable')" />
  <INPUT type="button" class="btn" style="width: 50%;float: right;border: 1;" value="Delete Row" onclick="deleteRow('dataTable')" />

  <TABLE id="dataTable" border="0">
   
    <TR>
      <TD><INPUT type="checkbox" name="chk[]"/></TD>
      
      <td><input list="med" placeholder="Enter Medicine" style="width: 150%;" type="text" name="med[]"/>
                  <datalist id="med">
              <?php  
                    while($row1 = mysqli_fetch_array($res1)){  
                        echo '<option value="'.$row1['Medicine'].'">'.$row1['Medicine'].'</option>'; 
                    }
                ?>
            </datalist>  
</td>
    </TR>
  </TABLE>
        
</td></tr>
</tr>
<tr><td><label for="dosage">
          <strong>Dosage</strong>
          </label></td>
          <td><input placeholder="Dosage" style="width: 20%;" type="text" name="dosage"/><select style="width: 80%;" id="dose" name="dose" >
                    <option value="N/A">--select--</option>
                   <option value="tablets/Capsules">tablets/Capsules</option>
                   <option value="tsp/drops">tsp/drops</option>
                   <option value="puffs">puffs</option>
                  </select> </td></tr>

                  <tr><td><label for="frequency">
          <strong>Frequency</strong>
          </label></td>
          <td><input style="width: 10%;" type="text" name="frequency"/> Times a Day for <input style="width: 10%;" type="text" name="day"> Days
                  </select> </td></tr>
<tr><td>
 <label for="tests">
          <strong>Tests</strong>
          </label>
</td><td>
  <INPUT type="button" class="btn" style="width: 50%;float: left;border: 1;" value="Add Row" onclick="addRow('dataTable2')" />
  <INPUT type="button" class="btn" style="width: 50%;float: right;border: 1;" value="Delete Row" onclick="deleteRow('dataTable2')" />

  <TABLE id="dataTable2" border="0">
   
    <TR>
      <TD><INPUT type="checkbox" name="chk1[]"/></TD>
      
      <td><input list="test" placeholder="Enter Tests" style="width: 150%;" type="text" name="test[]"/>
                  <datalist id="test">
              <?php  
                    while($row3 = mysqli_fetch_array($res3)){  
                        echo '<option value="'.$row3['tests'].'">'.$row3['tests'].'</option>'; 
                    }
                ?>
            </datalist>

</td>
    </TR></TABLE>



</td>
<tr><td>
      <label for="note">
          <strong>Note</strong>
          </label></td><td><INPUT style="width: 80%;" placeholder="Enter Notes" type="text" name="note" id="note"/>
         </td></tr><table><tr><td>
          <button type="submit" class="btn" name="submit">Submit</button></td><td>
          <button type="button" class="btn cancel" onclick="closeForm()">Cancel</button></td></tr></table>
        </table>
        </form>
   
      </div>
    </div>
   
        <?php
                
                if(isset($_POST["submit"])){
                  $m=implode(",",$_POST['med']);
                  $t=implode(",",$_POST['test']);
                  $d=$_POST['Diagnosis'];
                  $n=$_POST['note'];
                  $ds = $_POST["dose"];
                  $dz = $_POST["dosage"];
                  $f = $_POST["frequency"];
                  $day1 = $_POST["day"];
				  $date=date('Y-m-d');
				
function add_date($givendate,$day=0,$mth=0,$yr=0) {
      $cd = strtotime($givendate);
      $newdate = date('Y-m-d h:i:s', mktime(date('h',$cd),
    date('i',$cd), date('s',$cd), date('m',$cd)+$mth,
    date('d',$cd)+$day, date('Y',$cd)+$yr));
      return $newdate;
              }
$y=date('Y-m-d');
$x=add_Date($y,$day1);
$end_date=explode(" ",$x);
$edate=$end_date[0];


                  $insert_query = "INSERT INTO prescription (date,patient_id,id,`diagnosis`, `medicine`, `dosage`, `dosage_type`, `frequency`, `frequency_days`,end_date, `tests`, `note`) VALUES ('$date','$id1','$id','$d','$m','$dz','$ds','$f','$day1','$edate','$t','$n') ";
      $a = mysqli_query($con,$insert_query);
    
   }
                ?>
    <script>
	
	$(document).ready(function(){
    $('#diag').on('change', function(){
        var diag = $(this).val();
        if(diag){
            $.ajax({
                type:'POST',
                url:'ajax.php',
                data:'diag='+diag,
                success:function(html){
                    $('#tooltext').html(html);
                }
            }); 
        }else{
            $('#tooltext').html('No Suggestions');
            
        }
    });
    
    
});
	
  
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
       <div class='container' style="margin-top:1px;margin-left:303px;">
            <table border='1' style="background-color:powderblue;width:900px;" >
                <tr style='background: whitesmoke;'>
                    <th>S.no</th>
                    <th>Date</th>
                    <th>Diagonise</th>
                    <th>Medicines</th>
                    <th>Dosage</th>
                    <th>Frequency</th>
                    <th>Tests</th>
                    <th>Note</th>
                    <th>Remove</th>
                </tr>

                <?php 
                $query = "SELECT * FROM prescription where patient_id='$id1'";
			
                $result = mysqli_query($con,$query);
               
                #$count = 1;
                while($row = mysqli_fetch_array($result) ){
                    $date= $row['date'];
                    $id = $row['id'];
                    $diag = $row['diagnosis'];
                    $med = $row['medicine']; 
                    $med_arr = explode (",", $med);  
                    $test = $row['tests'];
                    $test_arr = explode (",", $test);
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
                        <td style="width:100px;"><ul><?php $ite=0; $var=sizeof($test_arr);
                        while($ite!=$var) {?><li><?php echo $test_arr[$ite]; ?></li><?php $ite=$ite+1; } ?></ul></td>
                        <td style="width:100px;"><?php echo $note; ?></td>
                        <td align='center' style="width:100px;"> <a style="color: red;"href="delete_prescription_row.php?id=<?php echo $id; ?>">delete</a></td>
                    </tr>
                <?php
                   # $count++;
                }
                
                ?>
                 </table>              
        </div> 
      </center><br>
      <button class="open-button" onclick="openForm()" style="margin-left:420px;"><strong>Add Precription</strong></button>
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