<?php

	if (!isset($_SESSION['admin_email'])) {
		
		echo "<script>window.open('login.php','_self')</script>";

	} else {
	
 ?>

 <div class="row"> <!--row 1 Begin -->

 	<div class="col-lg-12"> <!--col-lg-12 Begin -->

 		<ol class="breadcrumb"> <!--breadcrumb Begin -->

 			<l1 class="active"> <!--active Begin -->

 				<i class="fa fa-tachometer-alt"></i> Dashboard / View Manufacturer

 			</l1> <!--actve End -->

 		</ol> <!--breadcrumb End -->

 	</div> <!--col-lg-12 End -->

 </div> <!--row 1 End -->

 <div class="row"> <!--row 2 Begin -->

 	<div class="col-lg-12"> <!--col-lg-12 Begin -->

 		<div class="panel panel-default"> <!--panel panel-default Begin -->

 			<div class="panel-heading"> <!--panel-heading Begin -->

 				<h3 class="panel-title"> <!--panel-titleBegin -->

 					<i class="fa fa-ribbon"></i> View Manufacturer				

 				</h3> <!--panel-title End--> 				

 			</div> <!--penel-heading End-->

 			<div class="panel-body"> <!--panel-body Begin -->

 				<div class="table-responsive"> <!--table-responsive Begin-->

 					<table class="table table-striped table-bordered table-hover"> <!-- table table-striped table-bordered table-hover Begin -->

 						<thead> <!--thead Begin--> 

 							<tr> <!--tr Begin--> 

 								<th> Manufacturer ID: </th>
 								<th> Manufacturer Title: </th>
 								<th> Manufacturer Image: </th>
 								<th> Manufacturer Delete: </th>
 								<th> Manufacturer Edit: </th>

 							</tr> <!--tr End--> 

 						</thead> <!--thead End-->

 						<tbody> <!--tbody Begin-->

 							<?php

 								$i = 0; 

 								$get_manufacturer = "select * from manufacturers";

 								$run_manufacturer = mysqli_query($con, $get_manufacturer);

 								while($row_manufacturer=mysqli_fetch_array($run_manufacturer)) {
 									
 									$manufacturer_id = $row_manufacturer['manufacturer_id'];
 									
 									$manufacturer_title = $row_manufacturer['manufacturer_title'];
 									
 									$manufacturer_image = $row_manufacturer['manufacturer_image'];
 									
 									$i++;

 							 ?>

 							 <tr> <!--tr Begin-->
 							 	
 							 	<td> <?php echo $i; ?> </td>
 							 	<td> <?php echo $manufacturer_title; ?> </td>
 							 	<td>  <img src="other_images/<?php echo $manufacturer_image; ?>" width="60" height="60"> </td>
 							 	<td> 
 							 		<a href="index.php?delete_manufacturer=<?php echo $manufacturer_id; ?>">
 							 		
 							 			<i class="fa fa-trash-alt"></i> Delete

 							 		</a> 
 							 	</td>
 							 	<td> 
 							 		<a href="index.php?edit_manufacturer=<?php echo $manufacturer_id; ?>">
 							 		
 							 			<i class="fa fa-pencil"></i> Edit

 							 		</a>

 							 	</td>

 							 </tr> <!--tr End-->

 							<?php } ?>

 						</tbody> <!--tbody End-->
 						

 					</table> <!--table table-striped table-bordered table-hover End -->

 				</div> <!--table-responsive End -->

 			</div> <!--panel-body End -->

 		</div> <!--panel panel-default End -->

 	</div> <!--col-lg-12 End -->

 </div> <!--row 2 End -->




















 <?php 

 	}

  ?>