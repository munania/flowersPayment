<?php

	if (!isset($_SESSION['admin_email'])) {
		
		echo "<script>window.open('login.php','_self')</script>";

	} else {
	
 ?>

<div class="row"> <!-- row Begin -->

 	<div class="col-lg-12"> <!-- col-lg-12 Begin -->

 		<ol class="breadcrumb"> <!-- breadcrumb Begin -->

 			<li> <!-- l1 Begin -->
 				
 				<i class="fa fa-tachometer-alt"></i> Dashboard / Insert Boxes

 			</li> <!-- li Begin -->

 		</ol> <!-- Breadcrumb End-->

 	</div> <!-- col-lg-12 End -->

 </div> <!-- row End -->


<div class="row"> <!-- row Begin -->

 	<div class="col-lg-12"> <!-- col-lg-12 Begin -->

 		<div class="panel panel-default"> <!-- panel panel-default Begin -->

 			<div class="panel-heading"> <!-- col-lg-12 Begin -->

 				<h3 class="panel-title"> <!-- panel-title Begin -->

 					<i class="fa fa-th-large fa-fw"></i> Insert Boxes

 				</h3> <!-- panel-title End -->

 			</div> <!-- col-lg-12 End -->

 			<div class="panel-body"> <!-- panel-body Begin-->

 				<form action="" class="form-horizontal" method="post" enctype="multipart/form-data"> <!-- form-horizontal Begin -->

 					<div class="form-group"> <!-- form-group Begin -->

 						<label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->

 							Box Title
 							
 						</label> <!-- control-label col-md-3 End -->

 						<div class="col-md-6"> <!-- col-md-6Begin -->

 							<input name="box_title" type="text" class="form-control">

 						</div> <!-- col-md-6 End -->

 					</div> <!-- form-group End -->

                    <div class="form-group"> <!-- form-group Begin -->

                        <label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->

                            Boxes Description
                            
                        </label> <!-- control-label col-md-3 End -->

                        <div class="col-md-6"> <!-- col-md-6Begin -->

                            <textarea name="box_desc" type="text" class="form-control" rows="10" cols="30"></textarea>

                        </div> <!-- col-md-6 End -->

                    </div> <!-- form-group End -->

 					<div class="form-group"> <!-- form-group Begin -->

 						<label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->
 							
 						</label> <!-- control-label col-md-3 End -->

 						<div class="col-md-6"> <!-- col-md-6Begin -->

 							<input type="submit" name="submit" value="Insert Box" class="btn btn-primary form-control">

 						</div> <!-- col-md-6 End -->

 					</div> <!-- form-group End -->

 				</form> <!-- form-horizontal End -->

 			</div> <!-- col-lg-12 End --> 

 		</div> <!-- panel panel-default -->

 	</div> <!-- col-lg-12 End -->

 </div> <!-- row End -->


 <?php 

 	if (isset($_POST['submit'])) {
 		
        $box_title = $_POST['box_title'];
        
        $box_desc = $_POST['box_desc'];

        $insert_box = "insert into boxes_section (box_title, box_desc) values ('$box_title', '$box_desc')";

        $run_box = mysqli_query($con, $insert_box);

        echo "<script> alert('New box inserted Sucessfully')</script>";

        echo "<script>window.open('index.php?view_boxes', '_self')</script>";
 		
 	}

  ?>

 <?php 

 	}

  ?>