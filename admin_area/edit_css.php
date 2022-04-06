<?php

	if (!isset($_SESSION['admin_email'])) {
		
		echo "<script>window.open('login.php','_self')</script>";

	} else {
	
 ?>

 <?php 

 	$file = "../styles/style.css";

 	if (file_exists($file)) {
 		
 		$data = file_get_contents($file);

 	}


  ?>

 <div class="row"> <!--row 1 Begin -->

 	<div class="col-lg-12"> <!--col-lg-12 Begin -->

 		<ol class="breadcrumb"> <!--breadcrumb Begin -->

 			<l1 class="active"> <!--active Begin -->

 				<i class="fa fa-tachometer-alt"></i> Dashboard / CSS Editor

 			</l1> <!--actve End -->

 		</ol> <!--breadcrumb End -->

 	</div> <!--col-lg-12 End -->

 </div> <!--row 1 End -->

 <div class="row"> <!--row 2 Begin -->

 	<div class="col-lg-12"> <!--col-lg-12 Begin -->

 		<div class="panel panel-default"> <!--panel panel-default Begin -->

 			<div class="panel-heading"> <!--panel-heading Begin -->

 				<h3 class="panel-title"> <!--panel-titleBegin -->

 					<i class="fa fa-file-code"></i> Edit CSS				

 				</h3> <!--panel-title End--> 				

 			</div> <!--penel-heading End-->

 			<div class="panel-body"> <!--panel-body Begin -->

 				<form action="" class="form-horizontal" method="post"> <!--form-horizontal Begin -->

 					<div class="form-group"> <!--form-group Begin -->

 						<div class="col-lg-12"> <!--col-lg-12 Begin -->

 							<textarea name="newdata" id="" cols="30" rows="25" class="form-control"><?php echo $data; ?></textarea>	

 						</div> <!--col-lg-12 End -->						

 					</div> <!--form-group End -->

 					<div class="form-group"> <!--form-group Begin -->

 						<label for="" class="control-label col-md-3"></label>

 						<div class="col-md-6"> <!--col-md-6 Begin -->

 							<input type="submit" name="update" value="Update CSS" class="form-control btn btn-primary">

 						</div> <!--col-md-6 End --> 						

 					</div> <!--form-group End -->

 				</form> <!--form-horizontal End -->

 			</div> <!--panel-body End -->

 		</div> <!--panel panel-default End -->

 	</div> <!--col-lg-12 End -->

</div> <!--row 2 End -->

<?php 
	
	if (isset($_POST['update'])) {
		
		$newdata = $_POST['newdata'];

		$handle = fopen($file, "w");

		fwrite($handle, $newdata);

		fclose($handle);

		echo "<script> alert('Your css has been updated Sucessfully')</script>";

		echo "<script>window.open('index.php?edit_css', '_self')</script>";


	}

 ?>


 <?php 

 	}

  ?>