<?php 
	
	$active = 'My Account';
	include("includes/header.php");

 ?>



	<div id="content"> <!--content Begin -->
		
		<div class="container"> <!--container Begin -->
			
			<div class="col-md-12"> <!--col-md-12 Begin -->


				<ul class="breadcrumb"> <!--breadcrumb Begin -->
					<li>
						<a href="index.php">Home</a>
					</li>
					<li>
						Register
					</li>
				</ul> <!-- breadcrumb end-->				

			</div> <!--col-md-12 End -->

			<div class="col-md-12"> <!--col-md-12 Begin -->

				<div class="box"> <!--box Begin -->
					
					<div class="box-header"> <!--box-header Begin -->
						
						<center> <!--center Begin -->
							
							<h1>Register a new account</h1>

						</center> <!--center End -->

						<form action="customer_register.php" method="post" enctype="multipart/form-data"> <!--form Begin -->
							
							<div class="form-group"> <!--form-group Begin -->
								
								<label>Your Name</label>

								<input type="text" class="form-control" name="c_name" autocomplete="off" required>

							</div> <!--form-group End -->

							<div class="form-group"> <!--form-group Begin -->
								
								<label>Your Email</label>

								<input type="text" class="form-control" name="c_email" required>

							</div> <!--form-group End -->

							<div class="form-group"> <!--form-group Begin -->
								
								<label>Your Password</label>

								<input type="password" class="form-control" name="c_pass" required>

							</div> <!--form-group End -->

							<div class="form-group"> <!--form-group Begin -->
								
								<label>Confirm Your Password</label>

								<input type="password" class="form-control" name="confirm_pass" required>

							</div> <!--form-group End -->

							<div class="form-group"> <!--form-group Begin -->
								
								<label>Your Country</label>

								<input type="text" class="form-control" name="c_country" required>

							</div> <!--form-group End -->

							<div class="form-group"> <!--form-group Begin -->
								
								<label>Your City</label>

								<input type="text" class="form-control" name="c_city" required>

							</div> <!--form-group End -->

							<div class="form-group"> <!--form-group Begin -->
								
								<label>Your Contact</label>

								<input type="text" class="form-control" name="c_contact" autocomplete="off"  required>

							</div> <!--form-group End -->

							<div class="form-group"> <!--form-group Begin -->
								
								<label>Your Address</label>

								<input type="text" class="form-control" name="c_address" autocomplete="off" required>

							</div> <!--form-group End -->

							<div class="form-group"> <!--form-group Begin -->
								
								<label>Your Profile Picture</label>

								<input type="file" class="form-control form-height-custom" name="c_image" required>

							</div> <!--form-group End -->

							<div class="text-center"> <!--text-center Begin -->

								<button  type="submit" name="register" class="btn cart"> <!--btn btn-primary Begin -->
									
									<i class="fas fa-user-md"></i> Register Now

								</button> <!--btn btn-primary End -->

							</div> <!--text-center End -->

						</form> <!--form End-->

					</div> <!--box-header end -->

				</div> <!--box End -->
					

			</div> <!--col-md-12 End -->

			</div> <!--container End -->
	</div> <!--content End -->





	<?php
		include("includes/footer.php");
	?>


<!-- JQUERY  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<!-- <script src="js/jquery-331.min.js"></script> -->
<!-- <script src="js.bootstrap-337.min.js"></script> -->


</body>
</html>


<?php 	

	if (isset($_POST['register'])) {

		$c_name = mysqli_real_escape_string($con,$_POST['c_name']);

		$c_email = mysqli_real_escape_string($con,$_POST['c_email']);

		$c_pass = mysqli_real_escape_string($con,$_POST['c_pass']);
				
		$confirm_pass = mysqli_real_escape_string($con,$_POST['confirm_pass']);

		$c_country = mysqli_real_escape_string($con,$_POST['c_country']);

		$c_city = mysqli_real_escape_string($con,$_POST['c_city']);

		$c_contact = mysqli_real_escape_string($con,$_POST['c_contact']);

		$c_address = mysqli_real_escape_string($con,$_POST['c_address']);

		$c_image= $_FILES['c_image']['name'];

		$c_image_temp = $_FILES['c_image']['tmp_name'];

		$c_ip = getRealIpUser();


		$query ="select * from customers where customer_email='$c_email'";

		$run_query = mysqli_query($con, $query);

		if (mysqli_num_rows($run_query) != 0) {

			echo "<script>alert('User Already Exists!')</script>";
		
		} else {		
		
			if ($c_pass != $confirm_pass) {
				
				echo "<script>alert('Passwords do not match!')</script>";

			} else {

				// Using crypt and SHA 512

				$hashed_password = crypt($c_pass, '$6$rounds=5000$anexamplestringforsalt$');

				move_uploaded_file($c_image_temp, "customer/customer_images/$c_image");

				$insert_customer = "insert into customers (customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image, customer_ip) values ('$c_name', '$c_email', '$hashed_password', '$c_country', '$c_city', '$c_contact', '$c_address', '$c_image', '$c_ip') ";

				$run_customer = mysqli_query($con, $insert_customer);

				$sel_cart = "select * from cart where ip_add='$c_ip'";

				$run_cart = mysqli_query($con, $sel_cart);

				$check_cart = mysqli_num_rows($run_cart);

				if ($check_cart>0) {

					//If registered with item in cart
					
					$_SESSION['customer_email'] = $c_email;

					echo "<script>alert('You have been registered Sucessfully')</script>";

					echo "<script>window.open('checkout.php', '_self')</script>";

				} else {

					//If registered without item in cart

					$_SESSION['customer_email'] = $c_email;

					echo "<script>alert('You have been registered Sucessfully')</script>";

					echo "<script>window.open('index.php', '_self')</script>";

				}
			}

		}

	}


 ?>