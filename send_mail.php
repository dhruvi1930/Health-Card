<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
include 'connection.php';
#session_start();
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
			$id = $_SESSION['id'];
            $_SESSION['did'] = unique_code();
			$table = $_SESSION['table'];
			$idname = $_SESSION['idname'];
            $q = mysqli_query($con,"SELECT email FROM $table where $idname ='$id'");
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
				$mail->Body    = '<fieldset style="border: 2px inset;"><center><h2 style="color:blue;">Health Card</h2><h3>Your verification code for changing password is</h3><br><h1><i><b>'.$_SESSION['did'].'</i></b></h1><br></center></fieldset>';
				$mail->send();
				header('location:forgot_password.php');
				} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";}
?>
</body>
</html>