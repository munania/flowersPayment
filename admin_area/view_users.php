<?php

	if (!isset($_SESSION['admin_email'])) {
		
		echo "<script>window.open('login.php','_self')</script>";

	} else {
	
 ?>

 <div class="row"> <!--row 1 Begin -->

 	<div class="col-lg-12"> <!--col-lg-12 Begin -->

 		<ol class="breadcrumb"> <!--breadcrumb Begin -->

 			<l1 class="active"> <!--active Begin -->

 				<i class="fa fa-tachometer-alt"></i> Dashboard / View Users

 			</l1> <!--actve End -->

 		</ol> <!--breadcrumb End -->

 	</div> <!--col-lg-12 End -->

 </div> <!--row 1 End -->

 <div class="row"> <!--row 2 Begin -->

 	<div class="col-lg-12"> <!--col-lg-12 Begin -->

 		<div class="panel panel-default"> <!--panel panel-default Begin -->

 			<div class="panel-heading"> <!--panel-heading Begin -->

 				<h3 class="panel-title"> <!--panel-titleBegin -->

 					<i class="fa fa-users"></i> View Users				

 				</h3> <!--panel-title End--> 				

 			</div> <!--penel-heading End-->

 			<div class="panel-body"> <!--panel-body Begin -->

 				<div class="table-responsive"> <!--table-responsive Begin-->

 					<table class="table table-striped table-bordered table-hover"> <!-- table table-striped table-bordered table-hover Begin -->

 						<thead> <!--thead Begin--> 

 							<tr> <!--tr Begin--> 

 								<th> No: </th>
 								<th> User Name: </th>
 								<th> User Image: </th>
 								<th> User E-mail: </th>
 								<th> User Country: </th>
 								<th> User Job: </th>
 								<th> User Contact: </th>
 								<th> Edit: </th>
 								<th> Delete: </th>

 							</tr> <!--tr End--> 

 						</thead> <!--thead End-->

 						<tbody> <!--tbody Begin-->

 							<?php

 								$i = 0; 

 								$get_users = "select * from admins";

 								$run_users = mysqli_query($con, $get_users);

 								while ($row_users=mysqli_fetch_array($run_users)) {
 									
 									$user_id = $row_users['admin_id'];
 									
 									$user_name = $row_users['admin_name'];
 									
 									$user_email = $row_users['admin_email'];
 									
 									$user_country = $row_users['admin_country'];
                                    
                                    $user_job = $row_users['admin_job'];
                                    
                                    $user_contact = $row_users['admin_contact'];
                                    
                                    $user_img = $row_users['admin_image'];   
 									
 									$i++;

 							 ?>

 							 <tr> <!--tr Begin-->
 							 	
 							 	<td> <?php echo $i; ?> </td>
 							 	<td> <?php echo $user_name; ?> </td>
 							 	<td>  <img src="../admin_area/admin_images/<?php echo $user_img; ?>" width="60" height="60"> </td>
 							 	<td> <?php echo $user_email; ?> </td>
 							 	<td> <?php echo $user_country; ?></td>
 							 	<td> <?php echo $user_job; ?> </td>
 							 	<td> <?php echo $user_contact; ?> </td>
 							 	<td> 
 							 		<a href="index.php?user_profile=<?php echo $user_id; ?>">
 							 		
 							 			<i class="fa fa-pencil"></i> Edit

 							 		</a>

 							 	</td>

 							 	<td> 
 							 		<a href="index.php?delete_user=<?php echo $user_id; ?>">
 							 		
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