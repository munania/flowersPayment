 <?php
	
	session_start();

	$active = 'Shopping Cart';  
	
	include("includes/db.php");
	include('functions/functions.php');

 ?>


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
						Cart
					</li>
				</ul> <!-- breadcrumb end-->				

			</div> <!--col-md-12 End -->


			<div id="cart" class="col-md-9"> <!--col-md-9 Begin-->

				<div class="box"> <!--box Begin -->
					
					<form action="cart.php" method="post" enctype="multipart/form-data"> <!--form Begin -->
						
						<h1>Shopping Cart</h1>

						<?php 

							$ip_add = getRealIpUser();

							$select_cart = "select * from cart where ip_add='$ip_add'";

							$run_cart = mysqli_query($con, $select_cart);

							$count = mysqli_num_rows($run_cart);

						 ?>

						<p class="text-muted">You Currently have <?php echo $count; ?> item(s) in your cart</p>

						<div class="table-responsive"> <!--table-responsive Begin -->

							<table class="table"> <!--table Begin -->

								<thead> <!--thead Begin -->
									
									<tr> <!--tr Begin -->

										<th colspan="2">Product</th>
										<th>Quantity</th>
										<th>Unit Price</th>
										<th colspan="2">Delete</th>
										<th colspan="3">Sub-Total</th>

									</tr> <!--tr End -->

								</thead> <!--thead End -->

								<?php 

									$total = 0;

									while ($row_cart=mysqli_fetch_array($run_cart)) {

										$pro_id = $row_cart['p_id'];

										$pro_qty = $row_cart['qty'];

										$pro_sale = $row_cart['p_price'];

										$get_products = "select * from products where product_id='$pro_id'";

										$run_products = mysqli_query($con, $get_products);

										while ($row_products=mysqli_fetch_array($run_products)) {

											$product_title = $row_products['product_title'];

											$product_img1 = $row_products['product_img1'];

											$only_price = $row_products['product_price'];

											$sub_total = $pro_sale * $pro_qty;

											$_SESSION['pro_qty'] = $pro_qty;

											$total += $sub_total;

								?>

								<tbody> <!--tbody Begin -->
									
									<tr> <!--tr Begin -->

										<td>
											
											<img class="img-responsive" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Product 1">

										</td>

										<td>

											<a href="details.php?pro_id=<?php echo $pro_id; ?>"> <?php echo $product_title; ?></a>

										</td>

										<td>
											
											<input type="text" name="quantity" data-product_id="<?php echo $pro_id; ?>" value="<?php echo $_SESSION['pro_qty']; ?>" class="quantity form-control">

										</td>

										<td>
											
											<?php echo $pro_sale; ?>

										</td>

										<td>
											
											<input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">

										</td>

										<td colspan="3">
											
											<?php echo $sub_total; ?>

										</td>


									</tr> <!--tr End -->

									<?php

										}

										}

									 ?>

								</tbody> <!--tbody End -->

								<tfoot> <!--tfoot Begin -->
									
									<tr> <!--tr Begin -->
										
										<th colspan="6">Total</th>
										<th colspan="2"> KES <?php echo $total ?></th>

									</tr> <!--tr End -->

								</tfoot> <!--tfoot End -->

							</table> <!--Table End -->

							<div class="form-inline pull-right"> <!--form-inline Begin -->
								
								<div class="form-group"> <!--form-group Begin -->

									<label> Coupon Code: </label>

									<input type="text" name="code" class="form-control">

									<input type="submit" class="btn btn-primary" value="Use Coupon" name="apply_coupon">									


								</div> <!--form-group End -->
								
							</div> <!--form-inline End -->								

						</div> <!--table-responsive End -->

						<div class="box-footer"> <!--box-footer Begin -->
							
							<div class="pull-left"> <!--pull-left Begin-->
								
								<a href="index.php" class="btn btn-default"> <!--btn btn-default Begin -->
									
									<i class="fa fa-chevron-left"></i> Continue Shopping

								</a> <!--btn btn-default End -->

							</div> <!--pull-left End -->

							<div class="pull-right"> <!--pull-right Begin-->
								
								<button type="submit" name="update" value="Update Cart" class="btn btn-default"> <!--btn btn-default Begin -->

									<i class="fas fa-sync"></i> Update Cart

								</button> <!--btn btn-default End -->

								<a href="checkout.php" class="btn btn-primary">
									
									Proceed To Checkout <i class="fas fa-chevron-right"></i>

								</a>

							</div> <!--pull-right End -->

						</div> <!--box-footer End -->

					</form> <!--Form End -->

				</div> <!--box End -->

				<?php

					if(isset($_POST['apply_coupon'])){

						$code = $_POST['code'];

						if($code == ""){


						}
						
						else{

							$get_coupons = "select * from coupons where coupon_code='$code'";

							$run_coupons = mysqli_query($con,$get_coupons);

							$check_coupons = mysqli_num_rows($run_coupons);

							if($check_coupons == 1){

								$row_coupons = mysqli_fetch_array($run_coupons);

								$coupon_pro_id = $row_coupons['product_id'];

								$coupon_price = $row_coupons['coupon_price'];

								$coupon_limit = $row_coupons['coupon_limit'];

								$coupon_used = $row_coupons['coupon_used'];


								if($coupon_limit == $coupon_used){

								echo "<script>alert('Your Coupon Code Has Been Expired')</script>";

								}
								else{

									$get_cart = "select * from cart where p_id='$coupon_pro_id' AND ip_add='$ip_add'";

									$run_cart = mysqli_query($con,$get_cart);

									$check_cart = mysqli_num_rows($run_cart);


									if($check_cart == 1){

										$add_used = "update coupons set coupon_used=coupon_used+1 where coupon_code='$code'";

										$run_used = mysqli_query($con,$add_used);

										$update_cart = "update cart set p_price='$coupon_price' where p_id='$coupon_pro_id' AND ip_add='$ip_add'";

										$run_update_cart = mysqli_query($con,$update_cart);

										echo "<script>alert('Your Coupon Code Has Been Applied')</script>";

										echo "<script>window.open('cart.php','_self')</script>";

									}
									else{

										echo "<script>alert('Product Does Not Exist In Cart')</script>";

									}

								}

							}
							
							else{

							echo "<script> alert('Your Coupon Code Is Not Valid') </script>";

							}

						}


					}


				?>

				<?php 

					function update_cart(){

						global $con;

						if (isset($_POST['update'])) {
							
							foreach ($_POST['remove'] as $remove_id) {
								
								$delete_product = "delete from cart where p_id='$remove_id'";

								$run_delete = mysqli_query($con, $delete_product);

								if ($run_delete) {
								    
								    echo "<script>alert(' Item has been removed from the cart successfully')</script>";
									
									echo "<script> window.open('cart.php','_self') </script>";
								}
							}
						}
					}

					echo @$up_cart = update_cart();

				 ?>

		<div id="same-height-row"> <!--same-height-row Begin -->
			
			<div class="col-md-3 col-sm-6"> <!--col-md-3 col-sm-6 Begin -->
				
				<div class="box same-height headline"> <!--box same-height headline Begin -->
					
					<h3 class="text-center">Products You May Like</h3>

				</div> <!--same-height row End -->

			</div> <!--col-md-3 col-sm-6 End -->

			<?php 

				$get_products = "select * from products order by rand() LIMIT 0,3";

				$run_products = mysqli_query($con, $get_products);

				while ($row_products=mysqli_fetch_array($run_products)) {

					$pro_id = $row_products['product_id'];

					$pro_title = $row_products['product_title'];

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

								<a href='details.php?pro_id=$pro_id'>

									<img class='img-responsive' src='admin_area/product_images/$pro_img1'>

								</a>

								<div class='text'>

									<center>

										<p class='btn btn-primary'> $manufacturer_title </p>

									</center>

									<h3>

										<a href='details.php?pro_id=$pro_id'>

											$pro_title

										</a>

									</h3>

									<p class='price'>

										$pro_price &nbsp;$pro_sale_price

									</P>

									<p class='button'>

										<a class='btn btn-default' href='details.php?pro_id=$pro_id'>

											View Details

										</a>

										<a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

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

		</div> <!--col-md-9 End -->

		<div class="col-md-3"> <!--col-md-3 Begin -->
			
			<div id="order-summary" class="box"> <!--box Begin-->
				
				<div class="box-header"> <!--box-header Begin -->

					<h3>Order Summary</h3>

				</div> <!--box-header End -->

				<p class="text-muted"> <!--text-muted Begin -->
					
					Shipping and additional costs are calculated based on value you have entered

				</p> <!--text-muted end -->

				<div class="table-responsive"> <!--table-responsive Begin -->
					
					<table class="table"> <!--table Begin -->
						
						<tbody> <!--tbody Begin -->
							
							<tr> <!--tr Begin -->
								
								<td> Order Sub-Total </td>
								<td> <?php echo $total; ?> </td>

							</tr> <!--tr End -->

							<tr> <!--tr Begin -->
								
								<td> Shipping and Handling </td>
								<td> $0 </td>

							</tr> <!--tr End -->

							<tr> <!--tr Begin -->
								
								<td> Tax </td>
								<td> $0 </td>

							</tr> <!--tr End -->

							<tr class="total"> <!--tr Begin -->
								
								<td>Total</td>
								<td>KES <?php echo $total; ?></td>

							</tr> <!--tr End -->

						</tbody> <!--tbody End -->

					</table> <!--table End -->

				</div> <!--table-responsive End -->

			</div> <!--box End -->

		</div> <!--col-md-3 End -->



		</div> <!--container End -->
	</div> <!--content End -->





	<?php
		include("includes/footer.php");
	?>


<!-- JQUERY  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script>
	
	$(document).ready(function(data){

		$(document).on('keyup', '.quantity', function(){

			var id = $(this).data("product_id");
			var quantity = $(this).val();

			if (quantity !='') {

				$.ajax({

					url:"changes.php",
					method:"POST",
					data:{id:id, quantity:quantity},

					success:function(data){
						$("body").load('cart_body.php');
					}

				});

			}

		});
	});

</script>

</body>