<div class="box"> <!--box Begin -->
	
	<div class="box-header"> <!--box-header Begin -->

		<center> <!--centerBegin -->

			<h1> Login </h1>

			<!--<p class="lead"> Already have an account? </p>-->

			<!--<p class="text-muted"> Be art. </p>		-->

		</center> <!--center End -->
		
	</div> <!--box-header End -->

	<form method="post" action="checkout.php"> <!--formBegin -->
		
		<div class="form-group"> <!--form-group Begin -->

			<label> Email </label>

			<input type="text" name="c_email" class="form-control" required>			

		</div> <!--form-group End -->

		<div class="form-group"> <!--form-group Begin -->

			<label> Password </label>

			<input type="password" name="c_pass" class="form-control" required>			

		</div> <!--form-group End -->

		<div class="text-center"> <!--text-control Begin -->
			
			<button name="login" value="login" class="btn cart">
				
				<i class="fa fa-sign-in"></i> Login

			</button>

		</div> <!--text-control End-->

	</form> <!--form end -->

	<center> <!--centerBegin -->

			<a href="customer_register.php">
				
				<h3> Dont Have an account? Register Here </h3>
			</a>	

	</center> <!--center End -->

</div> <!-- box End-->

<?php 
	
	if (isset($_POST['login'])) {
		
		$customer_email = mysqli_real_escape_string($con,$_POST['c_email']);

		$customer_pass = mysqli_real_escape_string($con,$_POST['c_pass']);

		$hashed_password = crypt($customer_pass, '$6$rounds=5000$anexamplestringforsalt$');

		$select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$hashed_password' ";

		$run_customer = mysqli_query($con, $select_customer);

		$get_ip = getRealIpUser();

		$check_customer = mysqli_num_rows($run_customer);

		$select_cart = "select * from cart where ip_add='$get_ip' ";

		$run_cart = mysqli_query($con, $select_cart);

		$check_cart = mysqli_num_rows($run_cart);

		if ($check_customer==0) {
			
			echo "<script> alert('Your email or password is wrong') </script>";

			exit();
		}

		if ($check_customer==1 AND $check_cart==0) {

			$_SESSION['customer_email'] = $customer_email;
			
			echo "<script> alert('You are Logged in') </script>";

			echo "<script> window.open('customer/my_account.php?my_orders','_self') </script>";

		} else {

			$_SESSION['customer_email'] = $customer_email;
			
			echo "<script> alert('You are Logged in') </script>";

			echo "<script> window.open('checkout.php','_self') </script>";

		}


	}







 ?>