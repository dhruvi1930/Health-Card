<?php 
session_start();
include 'connection.php';
    header('Content-type: image/png');
    $id =$_SESSION["pid"];  
     $sql = "SELECT * FROM patient_details where patient_id = '$id'";
	 $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)>0) {
		
    while($row = mysqli_fetch_assoc($result)) {
        $name = $row["fname"]." ".$row["mname"]." ".$row["lname"];
		$img = $row["image"];
        $qr = $row["qr_path"];
		$dob = $row["DOB"];
        $gender = $row["gender"];
		$street = explode(",",$row["address"]);
		$city = $row["city"];
		$dist = "Anand";//$row["district"];
		$state = $row["state"];
		$pin = $row["pincode"];
		$addline1 = $street[0].",".$street[1].",";
		$addline2 = $street[2].",";
		$addline3 = $city."-".$pin;
		$addline4 = $dist.",".$state;
    }
	}

	// Load And Create Image From Source
	$front = imagecreatefrompng('card/assets/layout.png');
	$back = imagecreatefrompng('card/assets/back.png');

	// Allocate A Color For The Text Enter RGB Value
	$white_color = imagecolorallocate($front, 0x00, 0x00, 0x00);

	// Set Path to Font File
	$font_path = 'C:\xampp\htdocs\preclinic\card\assets\font.TTF';

	// Print image on image
	$profile =$img;
	$image = imagecreatefrompng($profile);
	list($width,$height) = getimagesize($profile);
	imagecopyresized($front,$image,34,34,0,0,200,200,$width,$height); 
	 
	
	$qr = $qr;
	$image1 = imagecreatefrompng($qr);
	list($qrwidth,$qrheight)=getimagesize($qr);
	imagecopyresized($front,$image1,756,317,60,60,225,225,$qrwidth-120,$qrheight-120);
	
	$size=25;
	$angle=0;
	$left=155;
	$top=330;
	// Print Text On Image
	imagettftext($front, $size,$angle,$left,$top, $white_color, $font_path, $name);
	imagettftext($front, $size,$angle,$left,$top+53, $white_color, $font_path, $dob);
	imagettftext($front, $size,$angle,$left,$top+95, $white_color, $font_path, $gender);
	imagettftext($front, $size+30,$angle,$left-30,$top+200, $white_color, $font_path, $id);
  
	imagettftext($back, $size,$angle,$left+25,$top-35, $white_color, $font_path, $addline1);
	imagettftext($back, $size,$angle,$left+25,$top, $white_color, $font_path, $addline2);
	imagettftext($back, $size,$angle,$left+25,$top+35, $white_color, $font_path, $addline3);
	imagettftext($back, $size+30,$angle,$left-30,$top+200, $white_color, $font_path, $id);
	// Send Image to Browser
	imagepng($front,'img/patient/card/front_'.$id.'.png');
	imagedestroy($front);
	imagepng($back,'img/patient/card/back_'.$id.'.png');
	imagedestroy($back);
	header("location:patient_send_card.php");
?>
