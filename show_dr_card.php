<html>
<head>
<style>
button {
  background-color:#0099ff;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}
button:hover {
  opacity: 0.8;
}
</style>
</head>
<?php
	session_start();
	header('Content-type: image/png');
	$id = $_SESSION['did'];  
	$display=imagecreatefrompng('img/doctor/card/'.$id.'.png');
	imagepng($display); 
?>