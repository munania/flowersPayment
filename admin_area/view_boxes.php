<?php

	if (!isset($_SESSION['admin_email'])) {
		
		echo "<script>window.open('login.php','_self')</script>";

	} else {
	
 ?>

<div class="row"> <!-- row Begin -->

 	<div class="col-lg-12"> <!-- col-lg-12 Begin -->

 		<ol class="breadcrumb"> <!-- breadcrumb Begin -->

 			<li> <!-- l1 Begin -->
 				
 				<i class="fa fa-tachometer-alt"></i> Dashboard / View Boxes

 			</li> <!-- li Begin -->

 		</ol> <!-- Breadcrumb End-->

 	</div> <!-- col-lg-12 End -->

 </div> <!-- row End -->

<div class="row"> <!-- row Begin -->

 	<div class="col-lg-12"> <!-- col-lg-12 Begin -->

 		<div class="panel panel-default"> <!-- panel panel-default Begin -->

 			<div class="panel-heading"> <!-- col-lg-12 Begin -->

 				<h3 class="panel-title"> <!-- panel-title Begin -->

 					<i class="fa fa-th-large fa-fw"></i> View Boxes

 				</h3> <!-- panel-title End -->

 			</div> <!-- col-lg-12 End -->

 			<div class="panel-body"> <!-- panel-body Begin-->

 				<?php 

 					$get_boxes = "select * from boxes_section";

 					$run_boxes = mysqli_query($con, $get_boxes);

 					while ($row_boxes_section=mysqli_fetch_array($run_boxes)) {
 						
 						$box_id = $row_boxes_section['box_id'];

 						$box_title = $row_boxes_section['box_title'];

 						$box_desc = $row_boxes_section['box_desc'];

 				 ?>

 				<div class="col-lg-4 col-md-4"> <!-- col-lg-3 col-md-3  Begin --> 

 				 	<div class="panel panel-primary"> <!--panel panel-primary  Begin -->

 				 		<div class="panel-heading"> <!-- panel-heading Begin -->

 				 			<div class="panel-title" align="center"> <!-- panel-title Begin -->
 				 				
 				 				<?php echo $box_title; ?>

 				 			</div> <!-- panel-title End -->

 				 		</div> <!-- panel-heading End-->

 				 		<div class="panel-body"> <!-- panel-body Begin-->

 				 			<?php echo $box_desc; ?>

 				 		</div> <!-- panel-body End-->

 				 		<div class="panel-footer"> <!-- panel-footer Begin-->

 				 			<center> <!-- center Begin-->

 				 				<a href="index.php?delete_box=<?php echo $box_id; ?>" class="pull-right"> <!-- pull-right Begin-->
 				 					
 				 					<i class="fa fa-trash-alt"></i> Delete

 				 				</a> <!-- pull-right End-->

 				 				<a href="index.php?edit_box=<?php echo $box_id; ?>" class="pull-left"> <!-- pull-left Begin-->
 				 					
 				 					<i class="fa fa-pencil"></i> Edit

 				 				</a> <!-- pull-left End-->

 				 				<div class="clearfix"></div>

 				 			</center> <!-- center end-->			 			

 				 		</div> <!-- panel-footer End-->

 				 	</div> <!-- panel panel-primary End -->

 				</div> <!-- col-lg-3 col-md-3  End -->

 				 <?php 

 				 	}

 				  ?>

 			</div> <!-- col-lg-12 End --> 

 		</div> <!-- panel panel-default -->

 	</div> <!-- col-lg-12 End -->

 </div> <!-- row End -->

 <?php 

 	}

  ?>