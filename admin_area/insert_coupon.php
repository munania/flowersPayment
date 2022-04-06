<?php

	if (!isset($_SESSION['admin_email'])) {
		
		echo "<script>window.open('login.php','_self')</script>";

	} else {
	
 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Insert Coupon</title>

</head>
<body>

	<div class="row"> <!-- row Begin -->
		
		<div class="col-lg-12"> <!-- col-lg-12 Begin -->
			
			<div class="breadcrumb"> <!-- breadcrumb Begin -->
				
				<li class="active"> <!-- active Begin -->
					
					<i class="fa fa-tachometer-alt"></i> Dashboard / Insert Coupon

				</li> <!-- active End -->

			</div> <!-- Breadcrumb end -->

		</div> <!-- col-lg-12 End -->

	</div> <!-- row end -->

	<div class="row"> <!-- row Begin -->
		
		<div class="col-lg-12"> <!-- col-lg-12 Begin -->
			
			<div class="panel panel-default"> <!-- panel panel-default Begin -->
				
				<div class="panel-heading"> <!-- panel-heading Begin -->
					
					<h4 class="panel-title"> <!-- panel-title Begin -->
						
						<i class="fas fa-money-bill fa-fw"></i> Insert Coupons

					</h4> <!-- panel-title End -->

				</div> <!-- panel-heading end -->

							<div class="panel-body"> <!-- panel-body Begin -->
				
				<form method="post" class="form-horizontal"> <!-- form-horizontal Begin -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Coupon Title</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input name="coupon_title" type="text" class="form-control" required></input>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Coupon Price</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input name="coupon_price" type="text" class="form-control" required></input>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Coupon Code</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input name="coupon_code" type="text" class="form-control" required></input>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Coupon Limit</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input type="number" name="coupon_limit" class="form-control" value="1"></input>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"> Select Product</label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<select name="product_id" class="form-control" required>
								
								<option selected disabled>Select Product For Coupon</option>

								<?php 


									$get_p = "select * from products";

									$run_p = mysqli_query($con,$get_p);

									while($row_p = mysqli_fetch_array($run_p)){

										$p_id = $row_p['product_id'];

										$p_title = $row_p['product_title'];

										echo "<option value='$p_id'> $p_title </option>";

									}


								 ?>


							</select>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

					<div class="form-group"> <!-- form-group Begin -->
					
						<label class="col-md-3 control-label"></label>

						<div class="col-md-6"> <!-- col-md-6 Begin -->
							
							<input name="submit" value="Create Coupon" type="submit" class="btn btn-primary form-control"></input>

						</div> <!-- col-md-6 End -->

					</div> <!-- form-group End -->

				</form> <!-- form-horizontal End -->

			</div> <!-- panel-body End -->

			</div> <!-- panel panel-default end -->

		</div> <!-- col-lg-12 End -->

	</div> <!-- row end -->

	<!-- <script src="https://cdn.tiny.cloud/1/8j5cggbk9xum5l5hrwytwcf6twr1p3du35gfmlabpw534e3t/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
  	<!-- <script>tinymce.init({selector:'textarea'});</script> -->

</body>
</html>


<?php 
	
	if (isset($_POST['submit'])) {
		
		$coupon_title = $_POST['coupon_title'];
		$coupon_price = $_POST['coupon_price'];
		$coupon_code = $_POST['coupon_code'];
		$coupon_limit = $_POST['coupon_limit'];
		$coupon_pro_id = $_POST['product_id'];

		$coupon_used = 0;

		$get_coupons = "select * from coupons where product_id='$coupon_pro_id' or coupon_code='$coupon_code' ";

		$run_coupons = mysqli_query($con,$get_coupons);

		$check_coupons = mysqli_num_rows($run_coupons);

		if($check_coupons == 1){

			echo "<script>alert('Coupon Code or Product Already Added Choose another Coupon code or Product')</script>";

		}
			else{

				$insert_coupon = "insert into coupons (product_id,coupon_title,coupon_price,coupon_code,coupon_limit,coupon_used) values ('$coupon_pro_id','$coupon_title','$coupon_price','$coupon_code','$coupon_limit','$coupon_used')";

				$run_coupon = mysqli_query($con,$insert_coupon);

				if($run_coupon){

					echo "<script>alert('New Coupon Has Been Inserted')</script>";

					echo "<script>window.open('index.php?view_coupons','_self')</script>";

				}


		}

	}


 ?>

 <?php 

 	}

  ?>