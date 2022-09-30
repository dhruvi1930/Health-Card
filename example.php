<?php


define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'a');

$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if(!$con){
    die("Connection Failed".mysqli_connect_error());
}
?>
<html>

<body>
    

    <?php
    $s="";
    $q14="SELECT path FROM pic";
        $result14=mysqli_query($con,$q14);
        if ($result14 ->num_rows > 0){
    while($row14 = $result14-> fetch_assoc()) {
        
            $s= $row14["path"];
    }
}

    
    ?>
    
    <img src="<?php echo $s?>" alt="Girl in a jacket">
    
    
</body>
</html>