<center> <!--center Begin-->
	
	<h1> Do You Really Want To Delete Your Account?</h1>

	<form action="" method="post"> <!--form Begin-->
		
		<input type="submit" name="Yes" value="Yes, I want to delete" class="btn details">

		<input type="submit" name="No" value="No, I Don't want to delete" class="btn cart">

	</form> <!--form end-->

</center> <!--center Begin-->

<?php 
	
	$c_email = $_SESSION['customer_email'];

	if (isset($_POST['Yes'])) {
		
		$Delete_customer = "delete from customers where customer_email='$c_email'";

		$run_delete_customer = mysqli_query($con, $delete_customer);

		if ($run_delete_customer) {
			
			session_destroy();

			echo "<script>alert('Sad to see you leave. Your account deleted sucessfully, Good Bye')</script>";

			echo "<script>window.open('../index.php','_self')</script>";
		}
	}

	if (isset($_POST['No'])) {
		
		echo "<script>window.open('my_account.php?my_orders','_self')</script>";
	}


 ?>