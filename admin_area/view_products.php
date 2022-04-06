<?php

	if (!isset($_SESSION['admin_email'])) {
		
		echo "<script>window.open('login.php','_self')</script>";

	} else {
	
 ?>

 <div class="row"> <!--row 1 Begin -->

 	<div class="col-lg-12"> <!--col-lg-12 Begin -->

 		<ol class="breadcrumb"> <!--breadcrumb Begin -->

 			<l1 class="active"> <!--active Begin -->

 				<i class="fa fa-tachometer-alt"></i> Dashboard / View Products

 			</l1> <!--actve End -->

 		</ol> <!--breadcrumb End -->

 	</div> <!--col-lg-12 End -->

 </div> <!--row 1 End -->

 <div class="row"> <!--row 2 Begin -->

 	<div class="col-lg-12"> <!--col-lg-12 Begin -->

 		<div class="panel panel-default"> <!--panel panel-default Begin -->

 			<div class="panel-heading"> <!--panel-heading Begin -->

 				<h3 class="panel-title"> <!--panel-titleBegin -->

 					<i class="fa fa-tags"></i> View Products				

 				</h3> <!--panel-title End--> 				

 			</div> <!--penel-heading End-->

 			<div class="panel-body"> <!--panel-body Begin -->

 				<div class="table-responsive"> <!--table-responsive Begin-->

 					<table class="table table-striped table-bordered table-hover"> <!-- table table-striped table-bordered table-hover Begin -->

 						<thead> <!--thead Begin--> 

 							<tr> <!--tr Begin--> 

 								<th> Product ID: </th>
 								<th> Product Title: </th>
 								<th> Product Image: </th>
 								<th> Product Price: </th>
 								<th> Product Sold: </th>
 								<th> Product Keywords: </th>
 								<th> Product Date: </th>
 								<th> Product Delete: </th>
 								<th> Product Edit: </th>

 							</tr> <!--tr End--> 

 						</thead> <!--thead End-->

 						<tbody> <!--tbody Begin-->

 							<?php

 								$i = 0; 

 								$get_pro = "select * from products";

 								$run_pro = mysqli_query($con, $get_pro);

 								while ($row_pro=mysqli_fetch_array($run_pro)) {
 									
 									$pro_id = $row_pro['product_id'];
 									
 									$pro_title = $row_pro['product_title'];
 									
 									$pro_img1 = $row_pro['product_img1'];
 									
 									$pro_price = $row_pro['product_price'];
 									
 									$pro_keywords = $row_pro['product_keywords'];
 									
 									$pro_date = $row_pro['date'];
 									
 									$i++;

 							 ?>

 							 <tr> <!--tr Begin-->
 							 	
 							 	<td> <?php echo $i; ?> </td>
 							 	<td> <?php echo $pro_title; ?> </td>
 							 	<td>  <img src="product_images/<?php echo $pro_img1; ?>" width="60" height="60"> </td>
 							 	<td> KES <?php echo $pro_price; ?> </td>
 							 	<td>
 							 		<?php

 							 			$get_sold = "select *from pending_orders where product_id='$pro_id'";

 							 			$run_sold = mysqli_query($con, $get_sold);

 							 			$count = mysqli_num_rows($run_sold);

 							 			echo $count;

 							 		?>

 							 	</td>
 							 	<td> <?php echo $pro_keywords; ?> </td>
 							 	<td> <?php echo $pro_date; ?> </td>
 							 	<td> 
 							 		<a href="index.php?delete_product=<?php echo $pro_id; ?>">
 							 		
 							 			<i class="fa fa-trash-alt"></i> Delete

 							 		</a> 
 							 	</td>
 							 	<td> 
 							 		<a href="index.php?edit_product=<?php echo $pro_id; ?>">
 							 		
 							 			<i class="fa fa-pencil"></i> Edit

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