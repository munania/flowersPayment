<?php

	if (!isset($_SESSION['admin_email'])) {
		
		echo "<script>window.open('login.php','_self')</script>";

	} else {
	
 ?>

<div class="row"> <!-- row Begin -->

 	<div class="col-lg-12"> <!-- col-lg-12 Begin -->

 		<ol class="breadcrumb"> <!-- breadcrumb Begin -->

 			<li> <!-- l1 Begin -->
 				
 				<i class="fa fa-tachometer-alt"></i> Dashboard / Insert Manufacturer

 			</li> <!-- li Begin -->

 		</ol> <!-- Breadcrumb End-->

 	</div> <!-- col-lg-12 End -->

 </div> <!-- row End -->


<div class="row"> <!-- row Begin -->

 	<div class="col-lg-12"> <!-- col-lg-12 Begin -->

 		<div class="panel panel-default"> <!-- panel panel-default Begin -->

 			<div class="panel-heading"> <!-- col-lg-12 Begin -->

 				<h3 class="panel-title"> <!-- panel-title Begin -->

 					<i class="fa fa-ribbon fa-fw"></i> Insert Manufacturer

 				</h3> <!-- panel-title End -->

 			</div> <!-- col-lg-12 End -->

 			<div class="panel-body"> <!-- panel-body Begin-->

 				<form action="" class="form-horizontal" method="post" enctype="multipart/form-data"> <!-- form-horizontal Begin -->

 					<div class="form-group"> <!-- form-group Begin -->

 						<label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->

 							Manufacturer Name
 							
 						</label> <!-- control-label col-md-3 End -->

 						<div class="col-md-6"> <!-- col-md-6Begin -->

 							<input name="manufacturer_name" type="text" class="form-control">

 						</div> <!-- col-md-6 End -->

 					</div> <!-- form-group End -->

                    <div class="form-group"> <!-- form-group Begin -->

                        <label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->

                            Choose As Top Manufacturer
                            
                        </label> <!-- control-label col-md-3 End -->

                        <div class="col-md-6"> <!-- col-md-6Begin -->

                            <input name="manufacturer_top" type="radio" value="yes">

                            <label> Yes </label>

                            <input name="manufacturer_top" type="radio" value="no">

                            <label> No </label>

                        </div> <!-- col-md-6 End -->

                    </div> <!-- form-group End -->

 					<div class="form-group"> <!-- form-group Begin -->

 						<label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->

                                Manufacturer Image                                      
 							
 						</label> <!-- control-label col-md-3 End -->

 						<div class="col-md-6"> <!-- col-md-6Begin -->

 							<input type="file" name="manufacturer_image" class="form-control"> 

 						</div> <!-- col-md-6 End -->

 					</div> <!-- form-group End -->

 					<div class="form-group"> <!-- form-group Begin -->

 						<label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->
 							
 						</label> <!-- control-label col-md-3 End -->

 						<div class="col-md-6"> <!-- col-md-6Begin -->

 							<input type="submit" name="submit" value="Submit Manufacturer" class="btn btn-primary form-control">

 						</div> <!-- col-md-6 End -->

 					</div> <!-- form-group End -->

 				</form> <!-- form-horizontal End -->

 			</div> <!-- col-lg-12 End --> 

 		</div> <!-- panel panel-default -->

 	</div> <!-- col-lg-12 End -->

 </div> <!-- row End -->


 <?php 

 	if (isset($_POST['submit'])) {
 		
        $manufacturer_name = $_POST['manufacturer_name'];
        
        $manufacturer_top = $_POST['manufacturer_top'];

        $manufacturer_image = $_FILES['manufacturer_image']['name'];

        $temp_name = $_FILES['manufacturer_image']['tmp_name'];

            
        move_uploaded_file($temp_name, "other_images/$manufacturer_image");

        $insert_manufacturer = "insert into manufacturers (manufacturer_title, manufacturer_top, manufacturer_image) values ('$manufacturer_name','$manufacturer_top', '$manufacturer_image')";

        $run_manufacturer = mysqli_query($con, $insert_manufacturer);

        echo "<script> alert('Manufacturer inserted Sucessfully')</script>";

        echo "<script>window.open('index.php?view_manufacturers', '_self')</script>";
 		
 	}

  ?>

 <?php 

 	}

  ?>