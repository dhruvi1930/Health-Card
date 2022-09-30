<?php
if($_COOKIE['dr_logged'] || $_COOKIE['med_logged'] || $_COOKIE['lab_logged'] || $_COOKIE['patient_id'])
{
	setcookie("dr_logged","",time()-3600);
	setcookie("med_logged","",time()-3600);
	setcookie("lab_logged","",time()-3600);
	setcookie("patient_id","",time()-3600);
	header("location:account_type.php");
}
?>