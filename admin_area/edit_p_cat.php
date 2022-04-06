<?php

	if (!isset($_SESSION['admin_email'])) {
		
		echo "<script>window.open('login.php','_self')</script>";

	} else {
	
 ?>

 <?php 

 	if (isset($_GET['edit_p_cat'])) {
 		
 		$edit_p_cat_id = $_GET['edit_p_cat'];

 		$edit_p_cat_query = "select * from product_categories where p_cat_id='$edit_p_cat_id'";

 		$run_edit = mysqli_query($con, $edit_p_cat_query);

 		$row_edit = mysqli_fetch_array($run_edit);

 		$p_cat_id = $row_edit['p_cat_id'];

 		$p_cat_title = $row_edit['p_cat_title'];

        $p_cat_top = $row_edit['p_cat_top'];

        $p_cat_image = $row_edit['p_cat_image'];

 	}

  ?>

<div class="row"> <!-- row Begin -->

 	<div class="col-lg-12"> <!-- col-lg-12 Begin -->

 		<ol class="breadcrumb"> <!-- breadcrumb Begin -->

 			<li> <!-- l1 Begin -->
 				
 				<i class="fa fa-tachometer-alt"></i> Dashboard / Edit Product Category

 			</li> <!-- li Begin -->

 		</ol> <!-- Breadcrumb End-->

 	</div> <!-- col-lg-12 End -->

 </div> <!-- row End -->


<div class="row"> <!-- row Begin -->

 	<div class="col-lg-12"> <!-- col-lg-12 Begin -->

 		<div class="panel panel-default"> <!-- panel panel-default Begin -->

 			<div class="panel-heading"> <!-- col-lg-12 Begin -->

 				<h3 class="panel-title"> <!-- panel-title Begin -->

 					<i class="fa fa-pencil fa-fw"></i> Edit Product Category

 				</h3> <!-- panel-title End -->

 			</div> <!-- col-lg-12 End -->

 			<div class="panel-body"> <!-- panel-body Begin-->

 				<form action="" class="form-horizontal" method="post" enctype="multipart/form-data"> <!-- form-horizontal Begin -->

 					<div class="form-group"> <!-- form-group Begin -->

 						<label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->

 							Product Category Title
 							
 						</label> <!-- control-label col-md-3 End -->

 						<div class="col-md-6"> <!-- col-md-6Begin -->

 							<input value="<?php echo $p_cat_title; ?>" name="p_cat_title" type="text" class="form-control">

 						</div> <!-- col-md-6 End -->

 					</div> <!-- form-group End -->

                    <div class="form-group"> <!-- form-group Begin -->

                        <label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->

                            Choose As Top Product Category
                            
                        </label> <!-- control-label col-md-3 End -->

                        <div class="col-md-6"> <!-- col-md-6Begin -->

                            <input name="p_category_top" type="radio" value="yes" 

                                   <?php 

                                          if ($p_cat_top=='no') {}else{echo "checked='checked'";}

                                    ?>

                            >

                                   

                            <label> Yes </label>

                            <input name="p_category_top" type="radio" value="no"

                                   <?php 

                                          if ($p_cat_top=='no'){echo "checked='checked'";}

                                    ?>

                            >

                            <label> No </label>

                        </div> <!-- col-md-6 End -->

                    </div> <!-- form-group End -->

                    <div class="form-group"> <!-- form-group Begin -->

                        <label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->

                                Product Category Image                                      
                            
                        </label> <!-- control-label col-md-3 End -->

                        <div class="col-md-6"> <!-- col-md-6Begin -->

                            <input type="file" name="p_category_image" class="form-control">

                            <img src="other_images/<?php echo $p_cat_image; ?>" alt="<?php echo $p_cat_title; ?>" width="70" height="70">  

                        </div> <!-- col-md-6 End -->

                    </div> <!-- form-group End -->

 					<div class="form-group"> <!-- form-group Begin -->

 						<label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->
 							
 						</label> <!-- control-label col-md-3 End -->

 						<div class="col-md-6"> <!-- col-md-6Begin -->

 							<input value="Update Product Category" name="update" type="submit" class="form-control btn btn-primary">

 						</div> <!-- col-md-6 End -->

 					</div> <!-- form-group End -->

 				</form> <!-- form-horizontal End -->

 			</div> <!-- col-lg-12 End --> 

 		</div> <!-- panel panel-default -->

 	</div> <!-- col-lg-12 End -->

 </div> <!-- row End -->


 <?php 

 	if (isset($_POST['update'])) {
 		
 		$p_cat_title = $_POST['p_cat_title'];
        
        $p_cat_top = $_POST['p_category_top'];

        if (is_uploaded_file($_FILES['p_category_image']['tmp_name'])) {

            $p_cat_image = $_FILES['p_category_image']['name'];

            $temp_image = $_FILES['p_category_image']['tmp_name'];


            $update_p_cat = "update product_categories set p_cat_title='$p_cat_title', p_cat_top='$p_cat_top', p_cat_image='$p_cat_image' where p_cat_id='$p_cat_id'";

            $run_p_cat = mysqli_query($con, $update_p_cat);

            if ($run_p_cat) {
                
                echo "<script> alert('Product Category Updated Sucessfully')</script>";

                echo "<script>window.open('index.php?view_p_cats', '_self')</script>";

            }


            
        } else {

            $update_p_cat = "update product_categories set p_cat_title='$p_cat_title', p_cat_top='$p_cat_top' where p_cat_id='$p_cat_id'";

            $run_p_cat = mysqli_query($con, $update_p_cat);

            if ($run_p_cat) {
                
                echo "<script> alert('Product Category Updated Sucessfully')</script>";

                echo "<script>window.open('index.php?view_p_cats', '_self')</script>";

            }

        }
 	}

  ?>

 <?php 

 	}

  ?>