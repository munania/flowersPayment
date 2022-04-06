<?php

	if (!isset($_SESSION['admin_email'])) {
		
		echo "<script>window.open('login.php','_self')</script>";

	} else {
	
 ?>

 <?php 

 	if (isset($_GET['edit_box'])) {
 		
 		$edit_box_id = $_GET['edit_box'];

 		$edit_box_query = "select * from boxes_section where box_id='$edit_box_id' ";

 		$run_edit_box = mysqli_query($con, $edit_box_query);

 		$row_edit_box = mysqli_fetch_array($run_edit_box);

 		$box_id = $row_edit_box['box_id'];

 		$box_title = $row_edit_box['box_title'];

 		$box_desc = $row_edit_box['box_desc'];

 	}

  ?>

<div class="row"> <!-- row Begin -->

 	<div class="col-lg-12"> <!-- col-lg-12 Begin -->

 		<ol class="breadcrumb"> <!-- breadcrumb Begin -->

 			<li> <!-- l1 Begin -->
 				
 				<i class="fa fa-tachometer-alt"></i> Dashboard / Edit Box

 			</li> <!-- li Begin -->

 		</ol> <!-- Breadcrumb End-->

 	</div> <!-- col-lg-12 End -->

 </div> <!-- row End -->


<div class="row"> <!-- row Begin -->

 	<div class="col-lg-12"> <!-- col-lg-12 Begin -->

 		<div class="panel panel-default"> <!-- panel panel-default Begin -->

 			<div class="panel-heading"> <!-- col-lg-12 Begin -->

 				<h3 class="panel-title"> <!-- panel-title Begin -->

 					<i class="fa fa-th-large fa-fw"></i> Edit Box

 				</h3> <!-- panel-title End -->

 			</div> <!-- col-lg-12 End -->

 			<div class="panel-body"> <!-- panel-body Begin-->

 				<form action="" class="form-horizontal" method="post"> <!-- form-horizontal Begin -->

 					<div class="form-group"> <!-- form-group Begin -->

 						<label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->

 							Box Title
 							
 						</label> <!-- control-label col-md-3 End -->

 						<div class="col-md-6"> <!-- col-md-6Begin -->

 							<input value="<?php echo $box_title; ?>" name="box_title" type="text" class="form-control">

 						</div> <!-- col-md-6 End -->

 					</div> <!-- form-group End -->

 					<div class="form-group"> <!-- form-group Begin -->

 						<label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->

 							Box Description
 							
 						</label> <!-- control-label col-md-3 End -->

 						<div class="col-md-6"> <!-- col-md-6Begin -->

 							<textarea type="text" name="box_desc"cols="30" rows="10" class="form-control"><?php echo $box_desc; ?> 
 							</textarea>

 						</div> <!-- col-md-6 End -->

 					</div> <!-- form-group End -->

 					<div class="form-group"> <!-- form-group Begin -->

 						<label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->
 							
 						</label> <!-- control-label col-md-3 End -->

 						<div class="col-md-6"> <!-- col-md-6Begin -->

 							<input value="Update Box" name="update_box" type="submit" class="form-control btn btn-primary">

 						</div> <!-- col-md-6 End -->

 					</div> <!-- form-group End -->

 				</form> <!-- form-horizontal End -->

 			</div> <!-- col-lg-12 End --> 

 		</div> <!-- panel panel-default -->

 	</div> <!-- col-lg-12 End -->

 </div> <!-- row End -->


 <?php 

 	if (isset($_POST['update_box'])) {
 		
 		$box_title = $_POST['box_title'];

 		$box_desc = $_POST['box_desc'];

 		$update_box = "update boxes_section set box_title='$box_title', box_desc='$box_desc' where box_id='$box_id'";

 		$run_box = mysqli_query($con, $update_box);

 		if ($run_box) {
 			
 			echo "<script> alert('Box Updated Sucessfully')</script>";

			echo "<script>window.open('index.php?view_boxes', '_self')</script>";

 		}
 	}

  ?>

 <?php 

 	}

  ?>