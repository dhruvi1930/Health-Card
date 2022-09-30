<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Forgot Password</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
        <div class="text-center mb-4">
          <h4>Generate Verification Code</h4>
          <p>Enter your ID to generate the verification code that will be sent to your registered email.</p>
        </div>
        <form method="Post">
          <div class="form-group">
            <div class="form-label-group">
				<h6>Enter Id</h6>
              <input type="text" name="inputid" class="form-control" required="required" autofocus="autofocus">
			    </div>
          </div>
          <button name="reset" class="btn btn-primary btn-block">Generate Code</button>
        </form>
      </div>
    </div>
  </div>
  <?php
	if(isset($_POST['reset']))
	{
		session_start();
		$_SESSION['id'] = $_POST['inputid'];
		$_SESSION['table'] = $_GET['table'];
		$_SESSION['idname'] = $_GET['idname'];
		$_SESSION['redirect'] = $_GET['redirect'];
		header('location:send_mail.php');
	}
  ?>