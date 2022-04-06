<?php

	if (!isset($_SESSION['admin_email'])) {
		
		echo "<script>window.open('login.php','_self')</script>";

	} else {
	
 ?>

<div class="row"> <!-- row Begin -->

 	<div class="col-lg-12"> <!-- col-lg-12 Begin -->

 		<ol class="breadcrumb"> <!-- breadcrumb Begin -->

 			<li> <!-- l1 Begin -->
 				
 				<i class="fa fa-tachometer-alt"></i> Dashboard / View Categories

 			</li> <!-- li Begin -->

 		</ol> <!-- Breadcrumb End-->

 	</div> <!-- col-lg-12 End -->

 </div> <!-- row End -->

<div class="row"> <!-- row Begin -->

 	<div class="col-lg-12"> <!-- col-lg-12 Begin -->

 		<div class="panel panel-default"> <!-- panel panel-default Begin -->

 			<div class="panel-heading"> <!-- col-lg-12 Begin -->

 				<h3 class="panel-title"> <!-- panel-title Begin -->

 					<i class="fa fa-book fa-fw"></i> View Category

 				</h3> <!-- panel-title End -->

 			</div> <!-- col-lg-12 End -->

 			<div class="panel-body"> <!-- panel-body Begin-->

 				<div class="table-responsive"> <!-- table-responsive Begin -->

 					<table class="table table-hover table-striped table-bordered"> <!-- table table-hover table-striped table-bordered Begin-->

 						<thead> <!-- thead Begin -->

 							<tr> <!-- tr Begin -->

 								<th> Category ID </th>
 								<th> category Title </th>
 								<th> Top Category </th>
 								<th> Edit Category </th>
 								<th> Delete Category </th>

 							</tr> <!-- tr End -->

 						</thead> <!-- thead End -->

 						<tbody> <!-- tbody Begin -->

 							<?php 

 								$i = 0;

 								$get_cats = "select * from categories";

 								$run_cats = mysqli_query($con, $get_cats);

 								while($row_cats=mysqli_fetch_array($run_cats)){

 									$cat_id = $row_cats['cat_id'];

 									$cat_title = $row_cats['cat_title'];

 									$cat_top = $row_cats['cat_top'];

 									$i++;

 							 ?>

 							 <tr> <!-- tr 	Begin -->
 							 	
 							 	<td> <?php echo $cat_id; ?> </td>
 							 	<td> <?php echo $cat_title; ?> </td>
 							 	<td> <?php echo $cat_top; ?> </td>
 							 	<td>

 							 		<a href="index.php?edit_cat=<?php echo $cat_id; ?>">

 							 			<i class="i fa fa-pencil"></i> Edit

 							 		</a>

 							 	</td>

 							 	<td>
 							 	 
 							 		<a href="index.php?delete_cat=<?php echo $cat_id; ?>">

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