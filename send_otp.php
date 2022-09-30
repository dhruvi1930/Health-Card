<?php
include 'connection.php';
//session_start();
if($_COOKIE['dr_logged']==null || $_COOKIE['lab_logged']==null || $_COOKIE['med_logged']==null)
	{
		header("location:account_type.php");
	}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'config1.php';
require 'plugins/PHPMailer/src/Exception.php';
require 'plugins/PHPMailer/src/PHPMailer.php';
require 'plugins/PHPMailer/src/SMTP.php';
		function unique_code()
            {
                return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 5);
            }
			$id = $_COOKIE['pid'];
            $_SESSION['otp'] = unique_code();
            $q = mysqli_query($con,"SELECT email FROM patient_details where patient_id ='$id'");
            $emr = mysqli_fetch_assoc($q);
            $to = $emr['email'];
			$mail = new PHPMailer(true);
			try {
				$mail->SMTPoptions = array(
					'ssl' => array(
						'verify_peer' => false,
						'verify_peer_name' => false,
						'allow_selfsigned' => true
					)
				);
				$mail->isSMTP();                                            // Send using SMTP
				$mail->Host       = CONFIG['email']['host'];                // Set the SMTP server to send through
				$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
				$mail->Username   = CONFIG['email']['username'];            // SMTP username
				$mail->Password   = CONFIG['email']['password'];            // SMTP password
				$mail->SMTPSecure = CONFIG['email']['SMTPSecure']; 'ssl';   // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
				$mail->Port       = CONFIG['email']['port']; 
				$mail->setFrom('elenasalvatore0130@gmail.com', 'MyHealthCard');
				$mail->addAddress($to); 									// Add a recipient
				$mail->isHTML(true);                                  		// Set email format to HTML
				$mail->Subject = 'verify your account';
				$mail->Body    = '<fieldset style="border: 2px inset;"><center><h2 style="color:blue;">Health Card</h2><h3>Your OTP for diagnosis is</h3><br><h1><i><b>'.$_SESSION['otp'].'</i></b></h1><br></center></fieldset>';
				$mail->send();
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (30);
				$t = $_SESSION['expire'];
				$o = md5($_SESSION['otp']);
				header('location:verify_otp.php?expire='.$t.'&o='.$o);
				} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";}
?>