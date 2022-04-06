<?php

	if (!isset($_SESSION['admin_email'])) {
		
		echo "<script>window.open('login.php','_self')</script>";

	} else {
	
 ?>

 <div class="row"> <!--row 1 Begin -->

 	<div class="col-lg-12"> <!--col-lg-12 Begin -->

 		<ol class="breadcrumb"> <!--breadcrumb Begin -->

 			<l1 class="active"> <!--active Begin -->

 				<i class="fa fa-tachometer-alt"></i> Dashboard / View Coupons

 			</l1> <!--actve End -->

 		</ol> <!--breadcrumb End -->

 	</div> <!--col-lg-12 End -->

 </div> <!--row 1 End -->

 <div class="row"> <!--row 2 Begin -->

 	<div class="col-lg-12"> <!--col-lg-12 Begin -->

 		<div class="panel panel-default"> <!--panel panel-default Begin -->

 			<div class="panel-heading"> <!--panel-heading Begin -->

 				<h3 class="panel-title"> <!--panel-titleBegin -->

 					<i class="fa fa-tags"></i> View Coupons				

 				</h3> <!--panel-title End--> 				

 			</div> <!--penel-heading End-->

 			<div class="panel-body"> <!--panel-body Begin -->

 				<div class="table-responsive"> <!--table-responsive Begin-->

 					<table class="table table-striped table-bordered table-hover"> <!-- table table-striped table-bordered table-hover Begin -->

 						<thead> <!--thead Begin--> 

 							<tr> <!--tr Begin--> 

 								<th> Coupon ID: </th>
 								<th> Coupon Title: </th>
 								<th> Product Title: </th>
 								<th> Coupon Price: </th>
 								<th> Coupons Code: </th>
 								<th> Coupons Limit: </th>
 								<th> Coupons Used: </th>
 								<th> Coupons Delete: </th>
 								<th> Coupons Edit: </th>

 							</tr> <!--tr End--> 

 						</thead> <!--thead End-->

 						<tbody> <!--tbody Begin-->

 							<?php

								$i = 0;

								$get_coupons = "select * from coupons";

								$run_coupons = mysqli_query($con,$get_coupons);

								while($row_coupons = mysqli_fetch_array($run_coupons)){

									$coupon_id = $row_coupons['coupon_id'];

									$product_id = $row_coupons['product_id'];

									$coupon_title = $row_coupons['coupon_title'];

									$coupon_price = $row_coupons['coupon_price'];

									$coupon_code = $row_coupons['coupon_code'];

									$coupon_limit = $row_coupons['coupon_limit'];

									$coupon_used = $row_coupons['coupon_used'];


									$get_products = "select * from products where product_id='$product_id'";

									$run_products = mysqli_query($con,$get_products);

									$row_products = mysqli_fetch_array($run_products);

									$product_title = $row_products['product_title'];

									$i++;

							?>

 							 <tr> <!--tr Begin-->
 							 	
 							 	<td><?php echo $i; ?></td>

								<td><?php echo $coupon_title; ?></td>

								<td><?php echo $product_title; ?></td>

								<td><?php echo "$$coupon_price"; ?></td>

								<td><?php echo $coupon_code; ?></td>

								<td><?php echo $coupon_limit; ?></td>

								<td><?php echo $coupon_used; ?></td>

								<td> 
 							 		<a href="index.php?edit_coupon=<?php echo $coupon_id; ?>">
 							 		
 							 			<i class="fa fa-pencil"></i> Edit

 							 		</a>

 							 	</td>
								
 							 	<td> 
 							 		<a href="index.php?delete_coupon=<?php echo $coupon_id; ?>">
 							 		
 							 			<i class="fa fa-trash-alt"></i> Delete

 							 		</a> 

 							 	</td> 							 	

 							 </tr> <!--tr End-->

 							<?php } ?>

 						</tbody> <!--tbody End-->
 						

 					</table> <!--table table-striped table-bordered table-hover End -->

 				</div> <!--table-responsive End -->

 			</div> <!--panel-body End -->

 		</div> <!--panel panel-default End -->

 	</div> <!--col-lg-12 End -->

 </div> <!--row 2 End -->





 <?php 

 	}

  ?>