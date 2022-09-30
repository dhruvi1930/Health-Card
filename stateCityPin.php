<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "pin";
$connect = mysqli_connect($hostname, $username, $password, $databaseName);    
 $sql = " SELECT DISTINCT `State` FROM `table_name` ORDER BY `State` ASC";
  $res = mysqli_query($connect, $sql);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#state').on('change', function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxDATA.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#dist').html(html);
                    $('#city').html('<option value="">Select dist first</option>');
                }
            }); 
        }else{
            $('#dist').html('<option value="">Select state first</option>');
            $('#city').html('<option value="">Select dist first</option>');
        }
    });
    
    $('#dist').on('change', function(){
        var distID = $(this).val();
        if(distID){
            $.ajax({
                type:'POST',
                url:'ajaxDATA.php',
                data:'dist_id='+distID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });

    $('#city').on('change', function(){
        var cityID = $(this).val();
        if(cityID){
            $.ajax({
                type:'POST',
                url:'ajaxDATA.php',
                data:'city_id='+cityID,
                success:function(html){
                    $('#pinc').html(html);
                }
            }); 
        }else{
            $('#pinc').html('<option value="">Select city first</option>'); 
        }
    });
});
</script>
<html><head><title>new2</title></head>
<body>
Country : <select id="country">
<option value="India">India</option>
</select><br><br>
State : <select id="state">
    <option value="">Select State</option>
    <?php 
    if($res->num_rows > 0){ 
        while($row = mysqli_fetch_array($res)){  
            echo '<option value="'.$row['State'].'">'.$row['State'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">State not available</option>'; 
    } 
    ?>
</select><br><br>

District : <select id="dist">
    <option value="">Select state first</option>
</select><br><br>
City : <select id="city">
    <option value="">Select district first</option>
</select><br><br>
Pincode : <select id="pinc">
    <option value="">Select city first</option>
</select>
</body>
</html>