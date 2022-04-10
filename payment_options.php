<div class="box"> <!-- box Begin -->

	<?php 

		$session_email = $_SESSION['customer_email'];

		$select_customer = "select * from customers where customer_email='$session_email'";

		$run_customer = mysqli_query($con, $select_customer);

		$row_customer = mysqli_fetch_array($run_customer);

		$customer_id = $row_customer['customer_id'];

		

	 ?>
	
	<h1 class="text-center"> Payment Options for you </h1>

	<!-- <p class="lead text-center"> p Begin -->
		
		<!-- <a href="order.php?c_id= php goes here"">M-pesa Payment</a> -->
		<!-- echo $customer_id -->

	<!-- </p> p End -->

	<center> <!-- center Begin -->

		<script src="https://checkout.flutterwave.com/v3.js"></script>

		
 		<button class="btn navbar-btn" type="button" onclick="makePayment()">Pay Using Card Now</button>
		 

	</center> <!-- center end -->

</div> <!-- box End -->