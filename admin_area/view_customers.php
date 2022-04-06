<?php

	if (!isset($_SESSION['admin_email'])) {
		
		echo "<script>window.open('login.php','_self')</script>";

	} else {
	
 ?>

 <div class="row"> <!--row 1 Begin -->

 	<div class="col-lg-12"> <!--col-lg-12 Begin -->

 		<ol class="breadcrumb"> <!--breadcrumb Begin -->

 			<l1 class="active"> <!--active Begin -->

 				<i class="fa fa-tachometer-alt"></i> Dashboard / View Customers

 			</l1> <!--actve End -->

 		</ol> <!--breadcrumb End -->

 	</div> <!--col-lg-12 End -->

 </div> <!--row 1 End -->

 <div class="row"> <!--row 2 Begin -->

 	<div class="col-lg-12"> <!--col-lg-12 Begin -->

 		<div class="panel panel-default"> <!--panel panel-default Begin -->

 			<div class="panel-heading"> <!--panel-heading Begin -->

 				<h3 class="panel-title"> <!--panel-titleBegin -->

 					<i class="fa fa-users"></i> view Customers				

 				</h3> <!--panel-title End--> 				

 			</div> <!--penel-heading End-->

 			<div class="panel-body"> <!--panel-body Begin -->

 				<div class="table-responsive"> <!--table-responsive Begin-->

 					<table class="table table-striped table-bordered table-hover"> <!-- table table-striped table-bordered table-hover Begin -->

 						<thead> <!--thead Begin--> 

 							<tr> <!--tr Begin--> 

 								<th> No: </th>
 								<th> Name: </th>
 								<th> Image: </th>
 								<th> E-mail: </th>
 								<th> Country: </th>
 								<th> City: </th>
 								<th> Address: </th>
 								<th> Contact: </th>
 								<th> Delete: </th>

 							</tr> <!--tr End--> 

 						</thead> <!--thead End-->

 						<tbody> <!--tbody Begin-->

 							<?php

 								$i = 0; 

 								$get_c = "select * from customers";

 								$run_c = mysqli_query($con, $get_c);

 								while ($row_c=mysqli_fetch_array($run_c)) {
 									
 									$c_id = $row_c['customer_id'];
 									
 									$c_name = $row_c['customer_name'];
 									
 									$c_email = $row_c['customer_email'];
 									
 									$c_country = $row_c['customer_country'];
                                    
                                    $c_city = $row_c['customer_city'];
                                    
                                    $c_contact = $row_c['customer_contact'];
                                    
                                    $c_address = $row_c['customer_address'];
                                    
                                    $c_img = $row_c['customer_image'];   
 									
 									$i++;

 							 ?>

 							 <tr> <!--tr Begin-->
 							 	
 							 	<td> <?php echo $i; ?> </td>
 							 	<td> <?php echo $c_name; ?> </td>
 							 	<td>  <img src="../customer/customer_images/<?php echo $c_img; ?>" width="60" height="60"> </td>
 							 	<td> <?php echo $c_email; ?> </td>
 							 	<td> <?php echo $c_country; ?></td>
 							 	<td> <?php echo $c_city; ?> </td>
 							 	<td> <?php echo $c_address; ?> </td>
 							 	<td> <?php echo $c_contact; ?></td>
 							 	<td> 
 							 		<a href="index.php?delete_customer=<?php echo $c_id; ?>">
 							 		
 							 			<i class="fa fa-trash-alt"></i> Delete

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