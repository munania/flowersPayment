 <?php
	
	session_start();

	$active = 'Shopping Cart';  
	
	include("includes/db.php");
	include('functions/functions.php');

 ?>

 <?php 
 		
 		$product_id = $_GET['pro_id'];

 		$get_product = "select * from products where product_url='$product_id'";

 		$run_product = mysqli_query($con, $get_product);

 		$row_product = mysqli_fetch_array($run_product);

 		$check_product = mysqli_num_rows($run_product);

 		if ($check_product == 0) {

 			echo "<script>window.open('index.php', '_self')</script>";
 			
 		} else {

 		$p_cat_id = $row_product['p_cat_id'];

 		$pro_title = $row_product['product_title'];

 		$pro_price = $row_product['product_price'];

		$pro_sale_price = $row_product['product_sale'];

 		$pro_desc = $row_product['product_desc'];

 		$pro_img1 = $row_product['product_img1'];

 		$pro_img2 = $row_product['product_img2'];

 		$pro_img3 = $row_product['product_img3'];

		$pro_label = $row_product['product_label'];

		$pro_features = $row_product['product_features'];

		$pro_video = $row_product['product_video'];

		if ($pro_label == "") {
				// code...
			}else{

				$product_label = "

					<a href='#' class='label $pro_label'>

						<div class='theLabel'> $pro_label </div>
						<div class='labelBackground'> </div>

					</a>

				";
			} 		

 		$get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

 		$run_p_cat = mysqli_query($con, $get_p_cat);

 		$row_p_cat = mysqli_fetch_array($run_p_cat);

 		$p_cat_title = $row_p_cat['p_cat_title'];

?>


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="cache-control" content="max-age=0" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
	<meta http-equiv="pragma" content="no-cache" />

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Flowers</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

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
						<a href="customer_register.php">Register</a>
					</li>
					<li>
						<a href="customer/my_account.php">My Account</a>
					</li>
					<li>
						<a href="cart.php">Go To Cart</a>
					</li>
					<li>
						<a href="checkout.php">
							
							<?php 

								if (!isset($_SESSION['customer_email'])) {
									
									echo " <a href='checkout.php'> Login </a> ";

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
						<a href="index.php">Home</a>
					</li>
					<li class="<?php if($active=='Shop') echo "active" ; ?>">
						<a href="shop.php">Shop</a>
					</li>
					<li class="<?php if($active=='My Account') echo "active" ; ?>">
						<?php 

							if (isset($_SESSION['customer_email'])) {
								
								echo "<a href='checkout.php'> My Account</a>";

							} else {

								echo "<a href='customer/my_account.php?my_orders'> My Account</a>";

							}

						 ?>					

					</li>
					
					<li class="<?php if($active=='Shopping Cart') echo "active" ; ?>">
						<a href="cart.php">Shopping Cart</a>
					</li>
					<li class="<?php if($active=='Contact Us') echo "active" ; ?>">
						<a href="contact.php">Contact Us</a>
					</li>

					
				</ul> <!--nav navbar-nav left End -->
				
			</div> <!--padding-nav End -->

			<a href="cart.php" class="btn navbar-btn btn-primary right"> <!--btn navbar-btn btn-primary right Begin -->

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


	<div id="content"> <!--content Begin -->
		
		<div class="container"> <!--container Begin -->
			
			<div class="col-md-12"> <!--col-md-12 Begin -->


				<ul class="breadcrumb"> <!--breadcrumb Begin -->
					<li>
						<a href="index.php">Home</a>
					</li>
					<li>
						Shop
					</li>

					<li>
						<a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"> <?php echo $p_cat_title; ?> </a>
					</li>

					<li>
						<?php echo $pro_title; ?>
					</li>

				</ul> <!-- breadcrumb end-->				

			</div> <!--col-md-12 End -->

		<div class="col-md-12"> <!--col-md-12 Begin -->
		
			<div id="productMain" class="row"> <!--row Begin -->
				
				<div class="col-sm-6"> <!--col-md-6 Begin -->
					
					<div id="mainImage"> <!--mainImage Begin -->
						
						<div id="myCarousel" class="carousel slide" data-ride="carousel"> <!--carousel slide Begin -->
							
							<ol class="carousel-indicators"> <!--carousel-indicators Begin -->
								
								<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
								<li data-target="#myCarousel" data-slide-to="1"></li>
								<li data-target="#myCarousel" data-slide-to="2"></li>

							</ol> <!--carousel-indicators End -->

							<div class="carousel-inner">
								
								<div class="item active">
									
									<center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product 1"></center>

								</div>

								<div class="item">
									
									<center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Product 1"></center>

								</div>

								<div class="item">
									
									<center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Product 1"></center>

								</div>

							</div>

							<a href="#myCarousel" class="left carousel-control" data-slide="prev"> <!--right carousel-control Begin -->
								
								<span class="glyphicon glyphicon-chevron-left"></span>
								<span class="sr-only"Previous></span>

							</a> <!--right carousel-control End -->

							<a href="#myCarousel" class="right carousel-control" data-slide="next"> <!--right carousel-control Begin -->
								
								<span class="glyphicon glyphicon-chevron-right"></span>
								<span class="sr-only"Next></span>

							</a> <!--right carousel-control End -->

						</div> <!--carousel slide End -->

					</div> <!--mainImage End -->

					<?php 
						echo $product_label;
					 ?>

				</div> <!--col-sm-6 End -->


				<div class="col-sm-6"> <!--col-sm-6 Begin -->

					<div class="box"> <!--box Begin -->

						<h1 class="text-center"> <?php echo $pro_title; ?> </h1>

						<!--  -->

						<form class="form-horizontal" method="post"> <!--form-horizontal Begin -->

							<div class="form-group"> <!--form-group Begin -->
								
								<label for="" class="col-md-5 control-label">Quantity</label>

								<div class="col-md-7"> <!--col-md-7 Begin -->

									<input min=1 value="1" type="number" name="product_qty" class="form-control">

								</div> <!--col-md-7 End -->

							</div> <!--form-group End -->

							<?php 

								if ($pro_label == 'sale') {

									echo "

										<p class='price'>
					
											PRICE: <del> KES $pro_price </del><br/>

											SALE: KES $pro_sale_price

										</p>

									";

								} else {

									echo "

										<p class='price'>
					
											PRICE: KES $pro_price

										</p>

									";

								}


							 ?>

							<p class="text-center buttons">
								
								<button type="submit" name="add_cart" class="btn btn-primary i fa fa-shopping-cart"> Add to cart</button> 

							</p>

						</form> <!--form-horizontal End -->

						<?php

								if (isset($_POST['add_cart'])) {
									
									$ip_add = getRealIpUser();

									$pro_id = $row_product['product_id'];

									$p_id = $pro_id;

									$pro_url = $row_product['product_url'];

									$product_qty = $_POST['product_qty'];

									$check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";

									$run_check = mysqli_query($con, $check_product);

									if (mysqli_num_rows($run_check)>0) {
										
										echo "<script>alert('This product is already added to cart')</script>";

										echo "<script>window.open('$pro_url','_self')</script>";


									}else {

										$get_price = "select * from products where product_id='$p_id'";

										$run_price = mysqli_query($con, $get_price);

										$row_price = mysqli_fetch_array($run_price);

										$pro_price = $row_price['product_price'];

										$pro_sale = $row_price['product_sale'];

										$pro_label = $row_price['product_label'];

										if ($pro_label == "sale") {
											
											$product_price = $pro_sale;

										} else{

											$product_price = $pro_price;
										}

										$query = "insert into cart (p_id, ip_add, qty, p_price) values ('$p_id', '$ip_add', '$product_qty', '$product_price')";

										$run_query = mysqli_query($con, $query);
										
										echo "<script>alert($product_qty + ' Item(s) have been added to the cart')</script>";

										echo "<script>window.open('$pro_url','_self')</script>";
									}


								}

							// END add_cart Function

						 ?>

					</div> <!--box End -->

					<div class="row" id="thumbs"> <!--row Begin -->

						<div class="col-xs-4"> <!--col-xs-4 Begin -->
							
							<a data-target="#myCarousel" data-slide-to="0" href="#" class="thumb"> <!--thumb Begin -->
								
								<img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product 1" class="img-responsive">

							</a> <!--thumb end -->

						</div> <!--col-xs-4 end-->

						<div class="col-xs-4"> <!--col-xs-4 Begin -->
							
							<a data-target="#myCarousel" data-slide-to="1" href="#" class="thumb"> <!--thumb Begin -->
								
								<img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Product 2" class="img-responsive">

							</a> <!--thumb end -->

						</div> <!--col-xs-4 end-->

						<div class="col-xs-4"> <!--col-xs-4 Begin -->
							
							<a data-target="#myCarousel" data-slide-to="2" href="#" class="thumb"> <!--thumb Begin -->
								
								<img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Product 3" class="img-responsive">

							</a> <!--thumb end -->

						</div> <!--col-xs-4  end-->


					</div> <!--row Begin -->

				</div> <!--col-sm-6 End -->


			</div> <!--row End -->

		<div class="box" id="details"> <!--box end -->

			<!--Tabs Button Begin -->

			<a data-toggle="tab" href="#descriptions" class="btn btn-primary tab">
				
				Product Description


			</a>

			<a data-toggle="tab" href="#features" class="btn btn-primary tab">
				
				Product Features


			</a>


			<a data-toggle="tab" href="#video" class="btn btn-primary tab">
				
				Product Video


			</a>

			<!--Tabs Button end -->

			<hr style="margin-top: 25px;">

			<!--Tabs Contents Begin -->	

				<div class="tab-content">

					<div class="tab-pane fade in active" id="descriptions"> <!--Tabs Pane Start -->
						
						<p class="product_descriptions">
							
							<?php 

								echo $pro_desc;

							 ?>

						</p>

					</div> <!--Tabs Pane End -->

					<div class="tab-pane fade in" id="features"> <!--Tabs Pane Start -->
						
						<p class="product_features">
							
							<?php echo $pro_features; ?>

						</p>

					</div> <!--Tabs Pane End -->

					<div class="tab-pane fade in" id="video"> <!--Tabs Pane Start -->
						
						<p class="product_video">
							
							<?php echo $pro_video; ?>

						</p>

					</div> <!--Tabs Pane End -->

				</div>

			<!--Tabs Contents Begin -->	




			

		</div> <!--box End -->

		<div id="same-height-row"> <!--same-height-row Begin -->
			
			<div class="col-md-3 col-md-6"> <!--col-md-3 col-md-6 Begin -->
				
				<div class="box same-height headline"> <!--box same-height headline Begin -->
					
					<h3 class="text-center">Products You May Like</h3>

				</div> <!--same-height row End -->

			</div> <!--col-md-3 col-md-6 End -->

			<?php 

				$get_products = "select * from products order by rand() LIMIT 0,3";

				$run_products = mysqli_query($con, $get_products);

				while ($row_products=mysqli_fetch_array($run_products)) {

			$pro_id = $row_products['product_id'];

			$pro_title = $row_products['product_title'];

			$pro_url = $row_products['product_url'];
			
			$pro_sale_price = $row_products['product_sale'];

			$pro_price = $row_products['product_price'];

			$pro_img1 = $row_products['product_img1'];

			$pro_label = $row_products['product_label'];

			$manufacturer_id = $row_products['manufacturer_id'];

			$get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

			$run_manufacturer = mysqli_query($db, $get_manufacturer);

			$row_manufacturer = mysqli_fetch_array($run_manufacturer);

			$manufacturer_title = $row_manufacturer['manufacturer_title'];

			if ($pro_label == 'sale') {
				
				$pro_price = "<del> KES $pro_price </del>";

				$pro_sale_price = "/ KES $pro_sale_price";

			} else {

				$pro_price = " KES $pro_price ";

				$pro_sale_price = "";

			}

			if ($pro_label == "") {
				// code...
			}else{

				$product_label = "

					<a href='#' class='label $pro_label'>

						<div class='theLabel'> $pro_label </div>
						<div class='labelBackground'> </div>

					</a>

				";
			}

			echo "

				<div class='col-md-3 col-sm-6 center-responsive'>

					<div class='product'>

						<a href='$pro_url'>

							<img class='img-responsive' src='admin_area/product_images/$pro_img1'>

						</a>

						<div class='text'>

							<center>

								<p class='btn btn-primary'> $manufacturer_title </p>

							</center>

							<h3>

								<a href='$pro_url'>

									$pro_title

								</a>

							</h3>

							<p class='price'>

								$pro_price &nbsp;$pro_sale_price

							</P>

							<p class='button'>

								<a class='btn btn-default' href='$pro_url'>

									View Details

								</a>

								<a class='btn btn-primary' href='$pro_url'>

									<i class='fa fa-shopping-cart'></i> Add to cart

								</a>

							</P>

						</div>

						$product_label

					</div>

				</div>

			";

		}


			 ?>

		</div> <!--same-height-row End -->

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
	
	}

 ?>