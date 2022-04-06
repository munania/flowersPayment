 <?php
	
	session_start();  
	
	include("includes/db.php");

	include('functions/functions.php');

 ?>

<?php

	$ip_add = getRealIpUser();

	if (isset($_POST['id'])) {
		
		$id = $_POST['id'];

		$qty = $_POST['quantity'];

		echo "<script> alert('Order Deleted Sucessfully')</script>";

		$get_qty = "update cart set qty='$qty' where p_id='$id' and ip_add='$ip_add' ";



		$run_qty = mysqli_query($con, $get_qty);

	}

 ?>