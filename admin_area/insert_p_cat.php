<?php

	if (!isset($_SESSION['admin_email'])) {
		
		echo "<script>window.open('login.php','_self')</script>";

	} else {
	
 ?>

<div class="row"> <!-- row Begin -->

 	<div class="col-lg-12"> <!-- col-lg-12 Begin -->

 		<ol class="breadcrumb"> <!-- breadcrumb Begin -->

 			<li> <!-- l1 Begin -->
 				
 				<i class="fa fa-tachometer-alt"></i> Dashboard / Insert Product Category

 			</li> <!-- li Begin -->

 		</ol> <!-- Breadcrumb End-->

 	</div> <!-- col-lg-12 End -->

 </div> <!-- row End -->


<div class="row"> <!-- row Begin -->

 	<div class="col-lg-12"> <!-- col-lg-12 Begin -->

 		<div class="panel panel-default"> <!-- panel panel-default Begin -->

 			<div class="panel-heading"> <!-- col-lg-12 Begin -->

 				<h3 class="panel-title"> <!-- panel-title Begin -->

 					<i class="fa fa-money-bill fa-fw"></i> Insert Product Category

 				</h3> <!-- panel-title End -->

 			</div> <!-- col-lg-12 End -->

 			<div class="panel-body"> <!-- panel-body Begin-->

 				<form action="" class="form-horizontal" method="post" enctype="multipart/form-data"> <!-- form-horizontal Begin -->

 					<div class="form-group"> <!-- form-group Begin -->

 						<label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->

 							Product Category Title
 							
 						</label> <!-- control-label col-md-3 End -->

 						<div class="col-md-6"> <!-- col-md-6Begin -->

 							<input name="p_category_title" type="text" class="form-control">

 						</div> <!-- col-md-6 End -->

 					</div> <!-- form-group End -->

 					<div class="form-group"> <!-- form-group Begin -->

                        <label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->

                            Choose As Top Product Category
                            
                        </label> <!-- control-label col-md-3 End -->

                        <div class="col-md-6"> <!-- col-md-6Begin -->

                            <input name="p_category_top" type="radio" value="yes">

                            <label> Yes </label>

                            <input name="p_category_top" type="radio" value="no">

                            <label> No </label>

                        </div> <!-- col-md-6 End -->

                    </div> <!-- form-group End -->

                    <div class="form-group"> <!-- form-group Begin -->

 						<label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->

                                Product Category Image                                      
 							
 						</label> <!-- control-label col-md-3 End -->

 						<div class="col-md-6"> <!-- col-md-6Begin -->

 							<input type="file" name="p_category_image" class="form-control"> 

 						</div> <!-- col-md-6 End -->

 					</div> <!-- form-group End -->

 					<div class="form-group"> <!-- form-group Begin -->

 						<label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->
 							
 						</label> <!-- control-label col-md-3 End -->

 						<div class="col-md-6"> <!-- col-md-6Begin -->

 							<input value="Submit Product Category" name="submit" type="submit" class="form-control btn btn-primary">

 						</div> <!-- col-md-6 End -->

 					</div> <!-- form-group End -->

 				</form> <!-- form-horizontal End -->

 			</div> <!-- col-lg-12 End --> 

 		</div> <!-- panel panel-default -->

 	</div> <!-- col-lg-12 End -->

 </div> <!-- row End -->


 <?php 

 	if (isset($_POST['submit'])) {
 		
 		$p_cat_title = $_POST['p_category_title'];
 		
 		$p_cat_top = $_POST['p_category_top'];
 		
 		$p_cat_image = $_FILES['p_category_image']['name'];

 		$temp_name = $_FILES['p_category_image']['tmp_name'];

 		move_uploaded_file($temp_name,"other_images/$p_cat_image");

 		$insert_p_cat = "insert into product_categories (p_cat_title, p_cat_top, p_cat_image) values ('$p_cat_title', '$p_cat_top', '$p_cat_image')";

 		$run_p_cat = mysqli_query($con, $insert_p_cat);

 		if ($run_p_cat) {
 			
 			echo "<script> alert('Product Category Inserted Sucessfully')</script>";

			echo "<script>window.open('index.php?view_p_cats', '_self')</script>";

 		}
 	}




  ?>














 <?php 

 	}

  ?>