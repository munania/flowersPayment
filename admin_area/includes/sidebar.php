<?php

	if (!isset($_SESSION['admin_email'])) {
		
		echo "<script>window.open('login.php','_self')</script>";

	} else {
	
 ?>


<nav class="navbar navbar-inverse navbar-fixed-top"> <!--navbar navbar-inverse navbar-fixed-top Begin -->

	<div class="navbar-header"> <!--navbar-header Begin -->

		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-exl-collapse"> <!--navbar-toggle Begin -->
			
			<span class="sr-only"> Toggle Navigation </span>

			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>

		</button> <!--navbar-toggle End -->

		<a href="index.php?dashboard" class="navbar-brand">Admin Area</a>
		

	</div> <!--navbar-header End -->

	<ul class="nav navbar-right top-nav"> <!--nav navbar-right top-nav Begin -->

		<li class="dropdown"> <!--dropdown Begin -->

			<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <!--dropdown-toggle Begin -->
				
				<i class="fa fa-user"></i> <?php echo $admin_name; ?> <b class="caret"></b>

			</a> <!--dropdown-toggle End -->

			<ul class="dropdown-menu"> <!--dropdown-menu Begin -->

				<li> <!--li Begin -->
					
					<a href="index.php?user_profile"> <!--a Begin -->
						
						<i class="fa fa-fw fa-user"></i> Profile

					</a> <!--a End -->

				</li> <!--li End -->

				<li> <!--li Begin -->
					
					<a href="index.php?view_products"> <!--a Begin -->
						
						<i class="fa fa-fw fa-envelope"></i> Products

						<span class="badge"> <?php echo $count_products; ?> </span>

					</a> <!--a End -->

				</li> <!--li End -->

				<li> <!--li Begin -->
					
					<a href="index.php?view_customers"> <!--a Begin -->
						
						<i class="fa fa-fw fa-users"></i> Customers

						<span class="badge"> <?php echo $count_customers; ?> </span>

					</a> <!--a End -->

				</li> <!--li End -->

				<li> <!--li Begin -->
					
					<a href="index.php?view_cats"> <!--a Begin -->
						
						<i class="fa fa-fw fa-cog"></i> Categories

						<span class="badge"> <?php echo $count_p_categories; ?> </span>

					</a> <!--a End -->

				</li> <!--li End -->

				<li class="divider"></li>

				<li> <!--li Begin -->
					
					<a href="logout.php"> <!--a Begin -->
						
						<i class="fa fa-fw fa-power-off"></i> Logout

					</a> <!--a End -->

				</li> <!--li End -->				

			</ul> <!--dropdown-menu End -->		

		</li> <!--dropdown End -->	


	</ul> <!--nav navbar-right top-nav End -->

	<div class="collapse navbar-collapse navbar-exl-collapse"> <!--collapse navbar-collapse navbar-exl-collapse Begin-->

		<ul class="nav navbar-nav side-nav"> <!--nav navbar-nav side-nav Begin -->

			<li> <!--Li begin-->

				<a href="index.php?dashboard"> <!--a Begin -->
						
					<i class="fa fa-fw fa-tachometer-alt"></i> Dashboard

				</a> <!--a End -->		

			</li> <!--Li end-->

			<li> <!--Li begin-->

				<a href="#" data-toggle="collapse" data-target="#products"> <!--a Begin -->
						
					<i class="fa fa-fw fa-envelope"></i> Products
					<i class="fa fa-fw fa-caret-down"></i>

				</a> <!--a End -->

				<ul id="products" class="collapse"> <!--collapse Begin-->
					
					<li> <!--Li Begin-->
					
						<a href="index.php?insert_product">Insert Product</a>

					</li> <!--Li end-->

					<li> <!--Li Begin-->

						<a href="index.php?view_products">View Products</a>

					</li> <!--Li end-->

				</ul> <!--collapse end-->		

			</li> <!--Li end-->

			<li> <!--Li begin-->

				<a href="#" data-toggle="collapse" data-target="#manufacturer"> <!--a Begin -->
						
					<i class="fa fa-fw fa-ribbon"></i> Manufacturer
					<i class="fa fa-fw fa-caret-down"></i>

				</a> <!--a End -->

				<ul id="manufacturer" class="collapse"> <!--collapse Begin-->
					
					<li> <!--Li Begin-->
					
						<a href="index.php?insert_manufacturer">Insert Manufacturer</a>

					</li> <!--Li end-->

					<li> <!--Li Begin-->

						<a href="index.php?view_manufacturer">View Manufacturer</a>

					</li> <!--Li end-->

				</ul> <!--collapse end-->		

			</li> <!--Li end-->

			<li> <!--Li begin-->

				<a href="#" data-toggle="collapse" data-target="#p_cat"> <!--a Begin -->
						
					<i class="fa fa-fw fa-tag"></i> Product Categories
					<i class="fa fa-fw fa-caret-down"></i>

				</a> <!--a End -->

				<ul id="p_cat" class="collapse"> <!--collapse Begin-->
					
					<li> <!--Li Begin-->
					
						<a href="index.php?insert_p_cat">Insert Product Category</a>

					</li> <!--Li end-->

					<li> <!--Li Begin-->

						<a href="index.php?view_p_cats">View Products Category</a>

					</li> <!--Li end-->

				</ul> <!--collapse end-->		

			</li> <!--Li end-->

			<li> <!--Li begin-->

				<a href="#" data-toggle="collapse" data-target="#cat"> <!--a Begin -->
						
					<i class="fa fa-fw fa-book"></i> Categories
					<i class="fa fa-fw fa-caret-down"></i>

				</a> <!--a End -->

				<ul id="cat" class="collapse"> <!--collapse Begin-->
					
					<li> <!--Li Begin-->
					
						<a href="index.php?insert_cat">Insert Category</a>

					</li> <!--Li end-->

					<li> <!--Li Begin-->

						<a href="index.php?view_cats">View Category</a>

					</li> <!--Li end-->

				</ul> <!--collapse end-->		

			</li> <!--Li end-->

			<li> <!--Li begin-->

				<a href="#" data-toggle="collapse" data-target="#slides"> <!--a Begin -->
						
					<i class="fa fa-fw fa-cog"></i> Slides
					<i class="fa fa-fw fa-caret-down"></i>

				</a> <!--a End -->

				<ul id="slides" class="collapse"> <!--collapse Begin-->
					
					<li> <!--Li Begin-->
					
						<a href="index.php?insert_slide">Insert Slides</a>

					</li> <!--Li end-->

					<li> <!--Li Begin-->

						<a href="index.php?view_slides">View Slides</a>

					</li> <!--Li end-->

				</ul> <!--collapse end-->		

			</li> <!--Li end-->

			<li> <!--Li begin-->

				<a href="#" data-toggle="collapse" data-target="#boxes"> <!--a Begin -->
						
					<i class="fa fa-fw fa-th-large"></i> Boxes
					<i class="fa fa-fw fa-caret-down"></i>

				</a> <!--a End -->

				<ul id="boxes" class="collapse"> <!--collapse Begin-->
					
					<li> <!--Li Begin-->
					
						<a href="index.php?insert_boxes">Insert Box</a>

					</li> <!--Li end-->

					<li> <!--Li Begin-->

						<a href="index.php?view_boxes">View Box</a>

					</li> <!--Li end-->

				</ul> <!--collapse end-->		

			</li> <!--Li end-->

			<li> <!--Li begin-->

				<a href="#" data-toggle="collapse" data-target="#coupon"> <!--a Begin -->
						
					<i class="fa fa-fw fa-table"></i> Coupons
					<i class="fa fa-fw fa-caret-down"></i>

				</a> <!--a End -->

				<ul id="coupon" class="collapse"> <!--collapse Begin-->
					
					<li> <!--Li Begin-->
					
						<a href="index.php?insert_coupon">Insert Coupon</a>

					</li> <!--Li end-->

					<li> <!--Li Begin-->

						<a href="index.php?view_coupons">View Coupons</a>

					</li> <!--Li end-->

				</ul> <!--collapse end-->		

			</li> <!--Li end-->

			<li> <!--Li begin-->

				<a href="#" data-toggle="collapse" data-target="#terms"> <!--a Begin -->
						
					<i class="fa fa-fw fa-table"></i> Terms
					<i class="fa fa-fw fa-caret-down"></i>

				</a> <!--a End -->

				<ul id="terms" class="collapse"> <!--collapse Begin-->
					
					<li> <!--Li Begin-->
					
						<a href="index.php?insert_terms">Insert Terms</a>

					</li> <!--Li end-->

					<li> <!--Li Begin-->

						<a href="index.php?view_terms">View Terms</a>

					</li> <!--Li end-->

				</ul> <!--collapse end-->		

			</li> <!--Li end-->

			<li> <!--Li Begin-->

				<a href="index.php?view_customers"> <!--a Begin-->
				
				<i class="fa fa-fw fa-users"></i> View Customers
				
				</a> <!--a end-->

			</li> <!--Li end-->

			<li> <!--Li Begin-->

				<a href="index.php?view_orders"> <!--a Begin-->
				
				<i class="fa fa-fw fa-shopping-cart"></i> View Orders
				
				</a> <!--a end-->

			</li> <!--Li end-->

			<li> <!--Li Begin-->

				<a href="index.php?view_payments"> <!--a Begin-->
				
				<i class="fa fa-fw fa-money-bill"></i> View Payments
				
				</a> <!--a end-->

			</li> <!--Li end-->

			<li> <!--Li Begin-->

				<a href="index.php?edit_css"> <!--a Begin-->
				
				<i class="fa fa-fw fa-file-code"></i> CSS Editor
				
				</a> <!--a end-->

			</li> <!--Li end-->

			<li> <!--Li begin-->

				<a href="#" data-toggle="collapse" data-target="#users"> <!--a Begin -->
						
					<i class="fa fa-fw fa-users"></i> Users
					<i class="fa fa-fw fa-caret-down"></i>

				</a> <!--a End -->

				<ul id="users" class="collapse"> <!--collapse Begin-->
					
					<li> <!--Li Begin-->
					
						<a href="index.php?insert_user">Insert User</a>

					</li> <!--Li end-->

					<li> <!--Li Begin-->

						<a href="index.php?view_users">View Users</a>

					</li> <!--Li end-->

					<li> <!--Li Begin-->

						<a href="index.php?user_profile <?php echo $admin_id; ?>">Edit User Profile</a>

					</li> <!--Li end-->

				</ul> <!--collapse end-->		

			</li> <!--Li end-->

			<li> <!--Li Begin-->

				<a href="logout.php"> <!--a Begin-->
				
				<i class="fa fa-fw fa-power-off"></i> Log Out
				
				</a> <!--a end-->

			</li> <!--Li end-->

		</ul> <!--nav navbar-nav side-nav End -->

	</div> <!--collapse navbar-collapse navbar-exl-collapse End -->

</nav> <!--navbar navbar-inverse navbar-fixed-top End -->

<?php 
	
	}

 ?>