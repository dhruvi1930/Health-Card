<!DOCTYPE html>
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
          <h4>Forgot your password?</h4>
          <p>Enter verification code recieved on your email address so we can verify its you.</p>
        </div>
        <form method="Post">
          <div class="form-group">
            <div class="form-label-group">
				<h6>Enter Verification Code</h6>
              <input type="text" name="inputcode" class="form-control" required="required" autofocus="autofocus">
              <br>
			  <h6>Enter New Password</h6>
              <input type="text" name="inputpas" class="form-control" required="required" autofocus="autofocus">
              <br>
			  <h6>ReEnter Password</h6>
              <input type="text" name="repas" class="form-control" required="required" autofocus="autofocus">
            </div>
          </div>
          <button name="reset" class="btn btn-primary btn-block">Reset Password</button>
        </form>
      </div>
    </div>
  </div>
 <?php
	 if(isset($_POST['reset']))
	{
		include 'connection.php';
		session_start();
		$vercode = $_POST['inputcode'];
		$newpas = $_POST['inputpas'];
		$repas = $_POST['repas'];
		$id = $_SESSION['id'];
		$table = $_SESSION['table'];
		$idname = $_SESSION['idname'];
		if($vercode==$_SESSION['did'])
		{
			if($newpas==$repas)
			{
				$newpas=md5($newpas);
				$resetq = "UPDATE $table SET password='$newpas' WHERE $idname ='$id'";
				$data = mysqli_query($con,$resetq);
				if($data)
				{
					?>
					<script type="text/javascript">
						alert("Password Updated");
						document.location = "temp.php"
					</script>
					<?php
				}
				else
				{
					?>
					<script type="text/javascript">
						alert("Oops! Something Went Wrong!");
					</script>
					<?php
				}
			}
			else
			{
				?>
				<script type="text/javascript">
					alert("Oops! Something Went Wrong!");
				</script>
				<?php
			}
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Oops! Something Went Wrong!");
			</script>
			<?php
		}
	}     
 ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
