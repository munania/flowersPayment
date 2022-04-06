<?php

	if (!isset($_SESSION['admin_email'])) {
		
		echo "<script>window.open('login.php','_self')</script>";

	} else {
	
 ?>

<div class="row"> <!-- row Begin -->

 	<div class="col-lg-12"> <!-- col-lg-12 Begin -->

 		<ol class="breadcrumb"> <!-- breadcrumb Begin -->

 			<li> <!-- l1 Begin -->
 				
 				<i class="fa fa-tachometer-alt"></i> Dashboard / Insert Slide

 			</li> <!-- li Begin -->

 		</ol> <!-- Breadcrumb End-->

 	</div> <!-- col-lg-12 End -->

 </div> <!-- row End -->


<div class="row"> <!-- row Begin -->

 	<div class="col-lg-12"> <!-- col-lg-12 Begin -->

 		<div class="panel panel-default"> <!-- panel panel-default Begin -->

 			<div class="panel-heading"> <!-- col-lg-12 Begin -->

 				<h3 class="panel-title"> <!-- panel-title Begin -->

 					<i class="fa fa-pencil fa-fw"></i> Insert Slide

 				</h3> <!-- panel-title End -->

 			</div> <!-- col-lg-12 End -->

 			<div class="panel-body"> <!-- panel-body Begin-->

 				<form action="" class="form-horizontal" method="post" enctype="multipart/form-data"> <!-- form-horizontal Begin -->

 					<div class="form-group"> <!-- form-group Begin -->

 						<label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->

 							Slide Name
 							
 						</label> <!-- control-label col-md-3 End -->

 						<div class="col-md-6"> <!-- col-md-6Begin -->

 							<input name="slide_name" type="text" class="form-control">

 						</div> <!-- col-md-6 End -->

 					</div> <!-- form-group End -->

                    <div class="form-group"> <!-- form-group Begin -->

                        <label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->

                            Slide Url
                            
                        </label> <!-- control-label col-md-3 End -->

                        <div class="col-md-6"> <!-- col-md-6Begin -->

                            <input name="slide_url" type="text" class="form-control">

                        </div> <!-- col-md-6 End -->

                    </div> <!-- form-group End -->

 					<div class="form-group"> <!-- form-group Begin -->

 						<label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->

                                Slide Image                                      
 							
 						</label> <!-- control-label col-md-3 End -->

 						<div class="col-md-6"> <!-- col-md-6Begin -->

 							<input type="file" name="slide_image" class="form-control"> 

 						</div> <!-- col-md-6 End -->

 					</div> <!-- form-group End -->

 					<div class="form-group"> <!-- form-group Begin -->

 						<label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->
 							
 						</label> <!-- control-label col-md-3 End -->

 						<div class="col-md-6"> <!-- col-md-6Begin -->

 							<input type="submit" name="submit" value="Submit Now" class="btn btn-primary form-control">

 						</div> <!-- col-md-6 End -->

 					</div> <!-- form-group End -->

 				</form> <!-- form-horizontal End -->

 			</div> <!-- col-lg-12 End --> 

 		</div> <!-- panel panel-default -->

 	</div> <!-- col-lg-12 End -->

 </div> <!-- row End -->


 <?php 

 	if (isset($_POST['submit'])) {
 		
        $slide_name = $_POST['slide_name'];
        
        $slide_url = $_POST['slide_url'];

        $slide_image = $_FILES['slide_image']['name'];

        $temp_name = $_FILES['slide_image']['tmp_name'];

        $view_slides = "select * from slider";

        $view_run_slide = mysqli_query($con,$view_slides);

        $count = mysqli_num_rows($view_run_slide);

        if ($count<4) {
            
            move_uploaded_file($temp_name, "slides_images/$slide_image");

            $insert_slide = "insert into slider (slide_name, slide_image, slide_url) values ('$slide_name','$slide_image', '$slide_url')";

            $run_slide = mysqli_query($con, $insert_slide);

            echo "<script> alert('New Slide image inserted Sucessfully')</script>";

            echo "<script>window.open('index.php?view_slides', '_self')</script>";

        } else{

            echo "<script> alert('You have already inserted 4 slides')</script>";
        }
 		
 	}

  ?>

 <?php 

 	}

  ?>