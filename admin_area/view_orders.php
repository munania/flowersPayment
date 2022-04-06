<?php

	if (!isset($_SESSION['admin_email'])) {
		
		echo "<script>window.open('login.php','_self')</script>";

	} else {
	
 ?>

 <div class="row"> <!--row 1 Begin -->

 	<div class="col-lg-12"> <!--col-lg-12 Begin -->

 		<ol class="breadcrumb"> <!--breadcrumb Begin -->

 			<l1 class="active"> <!--active Begin -->

 				<i class="fa fa-tachometer-alt"></i> Dashboard / View Orders

 			</l1> <!--actve End -->

 		</ol> <!--breadcrumb End -->

 	</div> <!--col-lg-12 End -->

 </div> <!--row 1 End -->

 <div class="row"> <!--row 2 Begin -->

 	<div class="col-lg-12"> <!--col-lg-12 Begin -->

 		<div class="panel panel-default"> <!--panel panel-default Begin -->

 			<div class="panel-heading"> <!--panel-heading Begin -->

 				<h3 class="panel-title"> <!--panel-titleBegin -->

 					<i class="fa fa-shopping-cart"></i> view Orders				

 				</h3> <!--panel-title End--> 				

 			</div> <!--penel-heading End-->

 			<div class="panel-body"> <!--panel-body Begin -->

 				<div class="table-responsive"> <!--table-responsive Begin-->

 					<table class="table table-striped table-bordered table-hover"> <!-- table table-striped table-bordered table-hover Begin -->

 						<thead> <!--thead Begin--> 

 							<tr> <!--tr Begin--> 

 								<th> Order No: </th>
 								<th> Customer Email: </th>
 								<th> Invoice No: </th>
 								<th> Product Name: </th>
 								<th> Product Qty: </th>
 								<th> Order Date: </th>
 								<th> Total Amount: </th>
 								<th> Status: </th>
 								<th> Delete: </th>

 							</tr> <!--tr End--> 

 						</thead> <!--thead End-->

 						<tbody> <!--tbody Begin-->

 							<?php

 								$i = 0; 

 								$get_orders = "select * from pending_orders";

 								$run_orders = mysqli_query($con, $get_orders);

 								while ($row_order=mysqli_fetch_array($run_orders)) {
 									
 									$order_id = $row_order['order_id'];
 									
 									$c_id = $row_order['customer_id'];
 									
 									$invoice_no = $row_order['invoice_number'];
 									
 									$product_id = $row_order['product_id'];
                                    
                                    $qty = $row_order['qty'];
                                    
                                    $order_status = $row_order['order_status'];

                                    $get_products = "select * from products where product_id='$product_id'";

                                    $run_products = mysqli_query($con, $get_products);

                                    $row_products = mysqli_fetch_array($run_products);

                                    $product_title = $row_products['product_title'];

                                    $get_customer = "select * from customers where customer_id='$c_id'";

                                    $run_customer = mysqli_query($con, $get_customer);

                                    $row_customer = mysqli_fetch_array($run_customer);

                                    $customer_email = $row_customer['customer_email'];

                                    $get_c_orders = "select * from customer_orders where order_id='$order_id'";

                                    $run_c_order = mysqli_query($con,$get_c_orders);

                                    $row_c_order = mysqli_fetch_array($run_c_order);

                                    $order_date = $row_c_order['order_date'];

                                    $order_amount = $row_c_order['due_amount'];

                                    $i++;

 							 ?>

 							 <tr> <!--tr Begin-->
 							 	
 							 	<td> <?php echo $i; ?> </td>
 							 	<td> <?php echo $customer_email; ?> </td>
 							 	<td> <?php echo $invoice_no; ?></td>
 							 	<td> <?php echo $product_title; ?> </td>
 							 	<td> <?php echo $qty; ?></td>
 							 	<td> <?php echo $order_date; ?> </td>
 							 	<td> <?php echo $order_amount; ?> </td>
 							 	<td> 
                                
                                    <?php 

                                        if ($order_status=='Pending') {
                                            
                                            echo $order_status = 'Pending';
                                        } else{

                                            echo $order_status = 'Complete';
                                        }


                                     ?>

                                </td>
 							 	<td> 
 							 		<a href="index.php?delete_order=<?php echo $order_id; ?>">
 							 		
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