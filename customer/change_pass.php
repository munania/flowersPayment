<h1 align="center"> Change Password </h1>

<form action="" method="post" enctype="multipart/form-data"> <!--form Begin -->
	
	<div class="form-group"> <!--form-group Begin -->
		
		<label> Your Old Password </label>
		<input type="text" name="old_pass" class="form-control" required>

	</div> <!--form-group End -->

	<div class="form-group"> <!--form-group Begin -->
		
		<label> Your New Password </label>
		<input type="text" name="new_pass" class="form-control" required>

	</div> <!--form-group End -->

	<div class="form-group"> <!--form-group Begin -->
		
		<label> Confirm Your New Password </label>
		<input type="text" name="new_pass_again" class="form-control" required>

	</div> <!--form-group End -->

	<div class="text-center"> <!--text-center Begin -->
		
		<button type="submit" name="submit" class="btn cart">
			
			<i class="fa fa-user-md"></i> Update Now

		</button>

	</div> <!--text-center End -->

</form> <!--form End -->


<?php 
	
	if (isset($_POST['submit'])) {
		
		$c_email = $_SESSION['customer_email'];

		$c_old_pass = $_POST['old_pass'];

		$c_new_pass = $_POST['new_pass'];

		$c_new_pass_again = $_POST['new_pass_again'];

		$set_c_old_pass = "select * from customers where customer_pass='$c_old_pass'";

		$run_c_old_pass = mysqli_query($con, $set_c_old_pass);

		$check_c_old_pass = mysqli_fetch_array($run_c_old_pass);

		if ($check_c_old_pass==0) {
			
			echo "<script>alert('Sorry, your current password is not valid. Please try again')</script>";

			exit();
		}

		if ($c_new_pass != $c_new_pass_again) {

			echo "<script>alert('Sorry, Your Passwords do not match')</script>";

			exit();
			
		}

		$update_c_pass = "update customers set customer_pass='$c_new_pass' where customer_email='$c_email'";

		$run_c_pass = mysqli_query($con, $update_c_pass);

		if ($run_c_pass) {
			
			echo "<script>alert('Your password has been updated')</script>";

			echo "<script>window.open('my_account.php?my_orders','_self')</script>";
		}


	}


 ?>