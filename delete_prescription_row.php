<?php 
include "connection.php";

$id = $_GET['id'];

$query = "DELETE FROM prescription WHERE id='$id'";
$res=mysqli_query($con,$query);
if($res)
	header('location:index_prescription.php');

?>