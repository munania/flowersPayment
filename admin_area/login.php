<?php 
	
	session_start();
	include("includes/db.php");

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Keski Flowers Admin Area</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/login.css">	

</head>

<body>

	<div class="container"> <!--container Begin -->

		<form action="" class="form-login" method="post"> <!--form-login Begin -->

			<h2 class="form-login-heading"> Admin Login</h2>

			<input type="text" class="form-control" placeholder="Email Address" name="admin_email" required>

			<input type="password" class="form-control" placeholder="Your Password" name="admin_pass" required>

			<button type="submit" class="btn btn-lg btn-primary btn-block" name="admin_login"> <!--btn btn-lg btn-primary btn-block Begin -->
				
				login

			</button> <!--btn btn-lg btn-primary btn-block end -->

		</form> <!--form-login end -->

	</div> <!--container End -->
	
</body>
</html>

<?php 
	
	if (isset($_POST['admin_login'])) {
		
		$admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);
		
		$admin_pass = mysqli_real_escape_string($con, $_POST['admin_pass']);

		$hashed_password = crypt($admin_pass, '$6$rounds=5000$anexamplestringforsalt$');

		$get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$hashed_password'";

		$run_admin = mysqli_query($con, $get_admin);

		$count = mysqli_num_rows($run_admin);

		if ($count==1) {
			
			$_SESSION['admin_email'] = $admin_email;

			echo "<script>alert('Logged in. Welcome back')</script>";

			echo "<script>window.open('index.php?dashboard','_self')</script>";
		} else {

			echo "<script>alert('Email or password is wrong')</script>";
		}


	}

 ?>