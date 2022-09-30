<?php
include 'connection.php';
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'config1.php';
require 'plugins/PHPMailer/src/Exception.php';
require 'plugins/PHPMailer/src/PHPMailer.php';
require 'plugins/PHPMailer/src/SMTP.php';
			$id = $_SESSION['lid'];  
            $q = mysqli_query($con,"SELECT * FROM laboratory where lab_id = '$id'");
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
				$mail->addAttachment('img/lab/card/front_'.$id.'.png','front_MyHealthCard.png');
				$mail->addAttachment('img/lab/card/back_'.$id.'.png','back_MyHealthCard.png');
				$mail->isHTML(true);                                  		// Set email format to HTML
				$mail->Subject = 'Your Health Card';
				$mail->Body    = 'Your health card';
				$mail->send();
				header('location:lab_login.php');
				} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";}
?>