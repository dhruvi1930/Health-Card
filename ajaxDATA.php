<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php 
include 'connection.php';



if(!empty($_POST["state_id"])){ 
     
    $query = "SELECT DISTINCT `District` FROM `pincode` WHERE State='".$_POST['state_id']."' ORDER BY `District` ASC"; 
    $res = mysqli_query($con, $query); 
     
    // Generate HTML of state options list 
    if($res->num_rows > 0){ 
        echo '<option value="">Select District</option>'; 
        while($row = mysqli_fetch_array($res)){  
            echo '<option value="'.$row['District'].'">'.$row['District'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Dist not available</option>'; 
    } 
}elseif(!empty($_POST["dist_id"])){ 
    // Fetch city data based on the specific state 
    $query1 = "SELECT DISTINCT `City` FROM `pincode` WHERE District='".$_POST['dist_id']."' ORDER BY `City` ASC"; 
    $res1 = mysqli_query($con, $query1);
     
    // Generate HTML of city options list 
    if($res1->num_rows > 0){ 
        echo '<option value="">Select city</option>'; 
        while($row1 = $res1->fetch_assoc()){  
            echo '<option value="'.$row1['City'].'">'.$row1['City'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">City not available</option>'; 
    } 
}elseif(!empty($_POST["city_id"])){ 
    // Fetch city data based on the specific state 
    $query2 = "SELECT DISTINCT `Pincode` FROM `pincode` WHERE City='".$_POST['city_id']."' ORDER BY `Pincode` ASC"; 
    $res2 = mysqli_query($con, $query2);
     
    // Generate HTML of city options list 
    if($res2->num_rows > 0){  
        echo '<option value="">Select pincode</option>';
        while($row2 = $res2->fetch_assoc()){  
            echo '<option value="'.$row2['Pincode'].'">'.$row2['Pincode'].'</option>'; 
        } 
    }else{ 
        echo '<option value=" ">Select city</option>'; 
    } 
}
?>