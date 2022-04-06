<?php
	
	session_start();  
	
	include("includes/db.php");
	include('functions/functions.php');

 ?>

 <?php 

 	if (isset($_GET['pro_id'])) {
 		
 		$product_id = $_GET['pro_id'];

 		$get_product = "select * from products where product_id='$product_id'";

 		$run_product = mysqli_query($con, $get_product);

 		$row_product = mysqli_fetch_array($run_product);

 		$p_cat_id = $row_product['p_cat_id'];

 		$pro_title = $row_product['product_title'];

 		$pro_price = $row_product['product_price'];

 		$pro_desc = $row_product['product_desc'];

 		$pro_img1 = $row_product['product_img1'];

 		$pro_img2 = $row_product['product_img2'];

 		$pro_img3 = $row_product['product_img3'];
 		

 		$get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

 		$run_p_cat = mysqli_query($con, $get_p_cat);

 		$row_p_cat = mysqli_fetch_array($run_p_cat);

 		$p_cat_title = $row_p_cat['p_cat_title'];

 	}

  ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>keskiltd</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- <link rel="stylesheet" href="styles/bootstrap-337.min.css"> -->
	<!-- <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"> -->

	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

	<link rel="stylesheet" href="styles/style.css">
	

</head>
<body>
	<div id="top"> <!--Top Begin -->

		<div class="container"> <!--Container Begin -->

			<div class="col-md-6 offer"><!--col-md-6 offer Begin -->

				<a href="#" class="btn btn-success btn-sm">
					
					<?php 

						if (!isset($_SESSION['customer_email'])) {
							
							echo "Welcome: Guest";

						} else {

							echo "Welcome: " . $_SESSION['customer_email'] . "";
						}

					 ?>
					 
				</a>
				<a href="checkout.php"> <?php items(); ?> Items in your Cart | Total Price is <?php total_price(); ?> </a>	
				
			</div><!--col-md-6 offer End -->

			<div class="col-md-6"><!--col-md-6  Begin -->

				<ul class="menu"><!--menu Begin -->

					<li>
						<a href="../customer_register.php">Register</a>
					</li>
					<li>
						<a href="my_account.php">My Account</a>
					</li>
					<li>
						<a href="../cart.php">Go To Cart</a>
					</li>
					<li>
						<a href="../checkout.php">
							
							<?php 

								if (!isset($_SESSION['customer_email'])) {
									
									echo " <a href='../checkout.php'> Login </a> ";

								} else {

									echo " <a href='logout.php'> Log Out </a> ";
								}

							?>
							
						</a>
					</li>
					
				</ul><!--menu End -->
				
			</div><!--col-md-6  End -->

			
		</div> <!--Container End -->
		
	</div> <!--Top End -->

	<div id="navbar" class="navbar navbar-default"> <!--navbar navbar-default Begin -->

		<div class="container"> <!--container Begin -->

			<div class="navbar-header"> <!--navbar-header Begin -->

				<a href="index.php" class="navbar-brand home"> <!--navbar-brand home Begin -->

				<img src="images/ecom-store-logo.png" alt="Flowers Logo" class="hidden-xs">
				<img src="images/ecom-store-logo-mobile.png"  alt="Flowers Logo" class="visible-xs">				

				</a> <!--navbar-brand home End -->

				<button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
					<span class="sr-only">Toggle Navigation</span>
					<f class="fa fa-align-justify"></f>

				</button>

				<button class="navbar-toggle" data-toggle="collapse" data-target="#search">
					<span class="sr-only">Toggle Search</span>
					<f class="fa fa-search"></f>

				</button>


		</div> <!--navbar-header End -->


		<div class="navbar-collapse collapse" id="navigation"><!--"navbar-collapse collapse Begin -->

			<div class="padding-nav"> <!--padding-nav Begin -->

				<ul class="nav navbar-nav left"> <!--nav navbar-nav left Begin -->
					<li class="<?php if($active=='Home') echo "active" ; ?>">
						<a href="../index.php">Home</a>
					</li>
					<li class="<?php if($active=='Shop') echo "active" ; ?>">
						<a href="../shop.php">Shop</a>
					</li>
					<li class="<?php if($active=='My Account') echo "active" ; ?>">
						<a href="my_account.php">My Account</a>
					</li>
					<li class="<?php if($active=='Shopping Cart') echo "active" ; ?>">
						<a href="../cart.php">Shopping Cart</a>
					</li>
					<li class="<?php if($active=='Contact Us') echo "active" ; ?>">
						<a href="../contact.php">Contact Us</a>
					</li>

					
				</ul> <!--nav navbar-nav left End -->
				
			</div> <!--padding-nav End -->

			<a href="../cart.php" class="btn navbar-btn btn-primary right"> <!--btn navbar-btn btn-primary right Begin -->

				<i class="fa fa-shopping-cart"></i>

				<span> <?php items(); ?> Items in your cart</span>

			</a> <!--btn navbar-btn btn-primary right End -->

			<div class="navbar-collapse collapse right"> <!--"navbar-collapse collapse right Brgin -->
				<button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"> <!--btn btn-primary navbar-btn Begin -->

					<span class="sr-only">Toggle Search</span>

					<i class="fa fa-search"></i>
					
				</button><!--btn btn-primary navbar-btn End -->
				
			</div> <!--navbar-collapse collapse right End -->

			<div class="collapse clearfix" id="search"> <!--collapse clearfix Begin -->

				<form method="get" action="results.php" class="navbar-form"> <!--navbar-form Begin -->
					<div class="input-group"> <!--input-group Begin -->

						<input type="text" class="form-control" placeholder="Search" name="user_query" required>

						<span class="input-group-btn"> <!--input-group-btn Begin -->

						<button type="submit" name="search" value="Search" class="btn btn-primary"> <!--btn btn-primary Begin -->

							<i class="fa fa-search"></i>
							
						</button> <!--btn btn-primary End -->

						</span> <!--input-group-btn End -->
						
					</div> <!--input-group End -->
					
				</form> <!--navbar-form End -->
				
			</div> <!--collapse clearfix End -->
			
		</div><!--"navbar-collapse collapse End -->

			
		</div> <!--container End -->
		
	</div> <!--navbar navbar-default End -->