<?php 
	
	session_start();
	include("includes/db.php");

	if (!isset($_SESSION['admin_email'])) {
		
		echo "<script>window.open('login.php','_self')</script>";

	} else {

		$admin_session = $_SESSION['admin_email'];

		$get_admin = "select * from admins where admin_email='$admin_session'";

		$run_admin = mysqli_query($con, $get_admin);

		$row_admin = mysqli_fetch_array($run_admin);

		$admin_id = $row_admin['admin_id'];

		$admin_name = $row_admin['admin_name'];


		$admin_email = $row_admin['admin_email'];

		$admin_image = $row_admin['admin_image'];

		$admin_country = $row_admin['admin_country'];

		$admin_about = $row_admin['admin_about'];

		$admin_contact = $row_admin['admin_contact'];

		$admin_job = $row_admin['admin_job'];


		$get_products = "select * from products";

		$run_products = mysqli_query($con, $get_products);

		$count_products = mysqli_num_rows($run_products);

		$get_customers = "select * from customers";

		$run_customers = mysqli_query($con, $get_customers);

		$count_customers = mysqli_num_rows($run_customers);

		$get_p_categories = "select * from product_categories";

		$run_p_categories = mysqli_query($con, $get_p_categories);

		$count_p_categories = mysqli_num_rows($run_p_categories);

		$get_pending_orders = "select * from pending_orders";

		$run_pending_orders = mysqli_query($con, $get_pending_orders);

		$count_pending_orders = mysqli_num_rows($run_pending_orders);


	
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

</head>

<body>

	<div id="wrapper"> <!--wrapper begin -->

		<?php include("includes/sidebar.php"); ?>



		<div id="page-wrapper"><!--page-wrapper begin -->

			<div class="container-fluid"><!--container-fluid begin -->

				<?php

					if (isset($_GET['dashboard'])) {

						include("dashboard.php");
					}

					if (isset($_GET['insert_product'])) {
						
						include("insert_product.php");
					}

					if (isset($_GET['view_products'])) {
						
						include("view_products.php");
					}

					if (isset($_GET['delete_product'])) {
						
						include("delete_product.php");
					}

					if (isset($_GET['edit_product'])) {
						
						include("edit_product.php");
					}

					if (isset($_GET['insert_manufacturer'])) {
						
						include("insert_manufacturer.php");
					}

					if (isset($_GET['view_manufacturer'])) {
						
						include("view_manufacturers.php");
					}

					if (isset($_GET['delete_manufacturer'])) {
						
						include("delete_manufacturer.php");
					}

					if (isset($_GET['edit_manufacturer'])) {
						
						include("edit_manufacturer.php");
					}

					if (isset($_GET['insert_p_cat'])) {
						
						include("insert_p_cat.php");
					}

					if (isset($_GET['view_p_cats'])) {
						
						include("view_p_cats.php");
					}

					if (isset($_GET['delete_p_cat'])) {
						
						include("delete_p_cat.php");
					}

					if (isset($_GET['edit_p_cat'])) {
						
						include("edit_p_cat.php");
					}

					if (isset($_GET['insert_cat'])) {
						
						include("insert_cat.php");
					}

					if (isset($_GET['view_cats'])) {
						
						include("view_cats.php");
					}

					if (isset($_GET['edit_cat'])) {
						
						include("edit_cat.php");
					}

					if (isset($_GET['delete_cat'])) {
						
						include("delete_cat.php");
					}

					if (isset($_GET['insert_slide'])) {
						
						include("insert_slide.php");
					}

					if (isset($_GET['view_slides'])) {
						
						include("view_slides.php");
					}

					if (isset($_GET['delete_slide'])) {
						
						include("delete_slide.php");
					}

					if (isset($_GET['edit_slide'])) {
						
						include("edit_slide.php");
					}

					if (isset($_GET['insert_boxes'])) {
						
						include("insert_boxes.php");
					}

					if (isset($_GET['view_boxes'])) {
						
						include("view_boxes.php");
					}

					if (isset($_GET['delete_box'])) {
						
						include("delete_box.php");
					}

					if (isset($_GET['edit_box'])) {
						
						include("edit_box.php");
					}

					if (isset($_GET['insert_coupon'])) {
						
						include("insert_coupon.php");
					}

					if (isset($_GET['view_coupons'])) {
						
						include("view_coupons.php");
					}

					if (isset($_GET['delete_coupon'])) {
						
						include("delete_coupon.php");
					}

					if (isset($_GET['edit_coupon'])) {
						
						include("edit_coupon.php");
					}

					if (isset($_GET['insert_terms'])) {
						
						include("insert_terms.php");
					}

					if (isset($_GET['view_terms'])) {
						
						include("view_terms.php");
					}

					if (isset($_GET['delete_term'])) {
						
						include("delete_term.php");
					}

					if (isset($_GET['edit_term'])) {
						
						include("edit_term.php");
					}

					if (isset($_GET['view_customers'])) {
						
						include("view_customers.php");
					}

					if (isset($_GET['delete_customer'])) {
						
						include("delete_customer.php");
					}

					if (isset($_GET['view_orders'])) {
						
						include("view_orders.php");
					}

					if (isset($_GET['delete_order'])) {
						
						include("delete_order.php");
					}

					if (isset($_GET['view_payments'])) {
						
						include("view_payments.php");
					}

					if (isset($_GET['delete_payment'])) {
						
						include("delete_payment.php");
					}

					if (isset($_GET['edit_css'])) {
						
						include("edit_css.php");
					}

					if (isset($_GET['view_users'])) {
						
						include("view_users.php");
					}

					if (isset($_GET['delete_user'])) {
						
						include("delete_user.php");
					}

					if (isset($_GET['insert_user'])) {
						
						include("insert_user.php");
					}

					if (isset($_GET['user_profile'])) {
						
						include("user_profile.php");
					}


				?>

			</div><!--container-fluid end -->

		</div><!--page-wrapper end -->

	</div><!--wrapper end -->

<!-- JQUERY  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
</body>
</html>

<?php 
	
	}

 ?>