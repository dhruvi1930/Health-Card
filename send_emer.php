<?php
include 'connection.php';
//session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'config1.php';
require 'plugins/PHPMailer/src/Exception.php';
require 'plugins/PHPMailer/src/PHPMailer.php';
require 'plugins/PHPMailer/src/SMTP.php';
			$id = $_COOKIE['pid'];
			$did = $_COOKIE['did'];
			$qd = mysqli_query($con,"SELECT * FROM doctor where doctor_id ='$did'");
            $emrd = mysqli_fetch_assoc($qd);
            $q = mysqli_query($con,"SELECT relative_mail,fname FROM patient_details where patient_id ='$id'");
            $emr = mysqli_fetch_assoc($q);
            $to = $emr['relative_mail'];
			$name = $emr['fname'];
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
				$mail->Subject = 'Emergency occurred with '.$name;
				$mail->Body    = '<fieldset style="border: 2px inset;"><center><h2 style="color:red;">Emergency</h2><h3>Details of '.$name.' is accessed by Dr.'.$emrd['f_name'].' '.$emrd['l_name'].' due to some emergency reasons</h3><br><h2>Doctor Details:</h2><br><h3>Name of Doctor:'.$emrd['f_name'].' '.$emrd['l_name'].'<br>Doctor ID:'.$did.'<br>Hospital Address:'.$emrd['address'].'<br>Doctor Email:'.$emrd['email'].'</h3><br><h3>It maybe due to some emergency happened to '.$name.' if not then please contact admin through the mail->elenasalvatore0130@gmail.com</h3><br></center></fieldset>';
				$mail->send();
				header('location:dr_patient.php');
				} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";}
?>