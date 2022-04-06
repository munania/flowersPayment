<?php

	if (!isset($_SESSION['admin_email'])) {
		
		echo "<script>window.open('login.php','_self')</script>";

	} else {
	
 ?>

<div class="row"> <!-- row Begin -->

 	<div class="col-lg-12"> <!-- col-lg-12 Begin -->

 		<ol class="breadcrumb"> <!-- breadcrumb Begin -->

 			<li> <!-- l1 Begin -->
 				
 				<i class="fa fa-tachometer-alt"></i> Dashboard / View Product Categories

 			</li> <!-- li Begin -->

 		</ol> <!-- Breadcrumb End-->

 	</div> <!-- col-lg-12 End -->

 </div> <!-- row End -->

<div class="row"> <!-- row Begin -->

 	<div class="col-lg-12"> <!-- col-lg-12 Begin -->

 		<div class="panel panel-default"> <!-- panel panel-default Begin -->

 			<div class="panel-heading"> <!-- col-lg-12 Begin -->

 				<h3 class="panel-title"> <!-- panel-title Begin -->

 					<i class="fa fa-tags fa-fw"></i> View Product Category

 				</h3> <!-- panel-title End -->

 			</div> <!-- col-lg-12 End -->

 			<div class="panel-body"> <!-- panel-body Begin-->

 				<div class="table-responsive"> <!-- table-responsive Begin -->

 					<table class="table table-hover table-striped table-bordered"> <!-- table table-hover table-striped table-bordered Begin-->

 						<thead> <!-- thead Begin -->

 							<tr> <!-- tr Begin -->

 								<th> Product Category ID </th>
 								<th> Product category Title </th>
 								<th> Top Product Category </th>
 								<th> Edit Product Category </th>
 								<th> Delete Product Category </th>

 							</tr> <!-- tr End -->

 						</thead> <!-- thead End -->

 						<tbody> <!-- tbody Begin -->

 							<?php 

 								$i = 0;

 								$get_p_cats = "select * from product_categories";

 								$run_p_cats = mysqli_query($con, $get_p_cats);

 								while($row_p_cats=mysqli_fetch_array($run_p_cats)){

 									$p_cat_id = $row_p_cats['p_cat_id'];

 									$p_cat_title = $row_p_cats['p_cat_title'];

 									$p_cat_top = $row_p_cats['p_cat_top'];

 									$i++;

 							 ?>

 							 <tr> <!-- tr 	Begin -->
 							 	
 							 	<td> <?php echo $p_cat_id; ?> </td>
 							 	<td> <?php echo $p_cat_title; ?> </td>
 							 	<td> <?php echo $p_cat_top; ?> </td>
 							 	<td>

 							 		<a href="index.php?edit_p_cat=<?php echo $p_cat_id; ?>">

 							 			<i class="i fa fa-pencil"></i> Edit

 							 		</a>

 							 	</td>

 							 	<td>
 							 	 
 							 		<a href="index.php?delete_p_cat=<?php echo $p_cat_id; ?>">

 							 			<i class="i fa fa-trash-alt"></i> Delete

 							 		</a>

 							 	</td>

 							 </tr> <!-- tr End -->

 							 <?php 

 							 	}

 							  ?>

 						</tbody> <!-- tbody End -->

 					</table> <!-- table table-hover table-striped table-bordered End-->

 				</div> <!-- table-responsive- End -->

 			</div> <!-- col-lg-12 End --> 

 		</div> <!-- panel panel-default -->

 	</div> <!-- col-lg-12 End -->

 </div> <!-- row End -->

 <?php 

 	}

  ?>