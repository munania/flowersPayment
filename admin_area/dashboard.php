<?php

	if (!isset($_SESSION['admin_email'])) {
		
		echo "<script>window.open('login.php','_self')</script>";

	} else {
	
 ?>


<div class="row"> <!--row Begin -->

	<div class="col-lg-12"> <!--col-lg-12 Begin -->

		<h1 class="page-header"> Dashboard</h1>

		<ol class="breadcrumb"> <!--breadcrumb Begin -->

			<li class="active"> <!--active Begin -->

				<i class="fa fa-tachometer-alt"></i> Dashboard

			</li> <!--active End -->
		
		</ol> <!--breadcrumb end -->

	</div> <!--col-lg-12 end -->

</div> <!--row end -->

<div class="row"> <!--row Begin -->

	<div class="col-lg-3 col-md-6"> <!-- col-lg-3 colmd-6 Begin -->

		<div class="panel panel-primary"> <!--panel panel-primary Begin -->

			<div class="panel-heading"> <!--panel-heading Begin -->

				<div class="row"> <!-- row Begin-->

					<div class="col-xs-3"> <!--col-xs-3 Begin -->

						<i class="fa fa-list fa-5x"></i>

					</div> <!--col-xs-3 end -->

					<div class="col-xs-9 text-right"> <!--col-xs-9 text-right Begin -->

						<div class="huge"> <?php echo $count_products; ?> </div>

						<div> Products</div>						

					</div> <!--col-xs-9 text-right end -->

				</div> <!-- row end -->

			</div> <!-- panel-heading end -->

			<a href="index.php?view_products"> <!-- a Begin -->

				<div class="panel-footer"> <!-- panel-footer Begin -->

					<span class="pull-left"> <!-- pull-left Begin --> 
					
						View Details
					
					</span> <!-- pull-right End -->

					<span class="pull-right"> <!-- pull-right Begin -->

						<i class="fa fa-arrow-circle-right"></i>

					</span> <!-- pull-right End -->

					<span class="clearfix"></span>

				</div> <!--panel-footer end -->

			</a> <!--a end -->		

		</div> <!--panel panel-primary end -->

	</div> <!-- col-lg-3 col-md-6 end -->

	<div class="col-lg-3 col-md-6"> <!-- col-lg-3 colmd-6 Begin -->

		<div class="panel panel-green"> <!--panel panel-green Begin -->

			<div class="panel-heading"> <!--panel-heading Begin -->

				<div class="row"> <!-- row Begin-->

					<div class="col-xs-3"> <!--col-xs-3 Begin -->

						<i class="fa fa-users fa-5x"></i>

					</div> <!--col-xs-3 end -->

					<div class="col-xs-9 text-right"> <!--col-xs-9 text-right Begin -->

						<div class="huge"> <?php echo $count_customers; ?> </div>

						<div> Customers </div>						

					</div> <!--col-xs-9 text-right end -->

				</div> <!-- row end -->

			</div> <!-- panel-heading end -->

			<a href="index.php?view_customers"> <!-- a Begin -->

				<div class="panel-footer"> <!-- panel-footer Begin -->

					<span class="pull-left"> <!-- pull-left Begin --> 
					
						View Details
					
					</span> <!-- pull-right End -->

					<span class="pull-right"> <!-- pull-right Begin -->

						<i class="fa fa-arrow-circle-right"></i>

					</span> <!-- pull-right End -->

					<span class="clearfix"></span>

				</div> <!--panel-footer end -->

			</a> <!--a end -->		

		</div> <!--panel panel-green end -->

	</div> <!-- col-lg-3 col-md-6 end -->

	<div class="col-lg-3 col-md-6"> <!-- col-lg-3 colmd-6 Begin -->

		<div class="panel panel-orange"> <!--panel panel-orange Begin -->

			<div class="panel-heading"> <!--panel-heading Begin -->

				<div class="row"> <!-- row Begin-->

					<div class="col-xs-3"> <!--col-xs-3 Begin -->

						<i class="fa fa-tags fa-5x"></i>

					</div> <!--col-xs-3 end -->

					<div class="col-xs-9 text-right"> <!--col-xs-9 text-right Begin -->

						<div class="huge"> <?php echo $count_p_categories; ?> </div>

						<div>Flower Categories </div>					

					</div> <!--col-xs-9 text-right end -->

				</div> <!-- row end -->

			</div> <!-- panel-heading end -->

			<a href="index.php?view_cats"> <!-- a Begin -->

				<div class="panel-footer"> <!-- panel-footer Begin -->

					<span class="pull-left"> <!-- pull-left Begin --> 
					
						View Details
					
					</span> <!-- pull-right End -->

					<span class="pull-right"> <!-- pull-right Begin -->

						<i class="fa fa-arrow-circle-right"></i>

					</span> <!-- pull-right End -->

					<span class="clearfix"></span>

				</div> <!--panel-footer end -->

			</a> <!--a end -->		

		</div> <!--panel panel-orange end -->

	</div> <!-- col-lg-3 col-md-6 end -->

	<div class="col-lg-3 col-md-6"> <!-- col-lg-3 colmd-6 Begin -->

		<div class="panel panel-red"> <!--panel panel-red Begin -->

			<div class="panel-heading"> <!--panel-heading Begin -->

				<div class="row"> <!-- row Begin-->

					<div class="col-xs-3"> <!--col-xs-3 Begin -->

						<i class="fa fa-shopping-cart fa-5x"></i>

					</div> <!--col-xs-3 end -->

					<div class="col-xs-9 text-right"> <!--col-xs-9 text-right Begin -->

						<div class="huge"> <?php echo $count_pending_orders; ?> </div>

						<div> Orders </div>						

					</div> <!--col-xs-9 text-right end -->

				</div> <!-- row end -->

			</div> <!-- panel-heading end -->

			<a href="index.php?view_orders"> <!-- a Begin -->

				<div class="panel-footer"> <!-- panel-footer Begin -->

					<span class="pull-left"> <!-- pull-left Begin --> 
					
						View Details
					
					</span> <!-- pull-right End -->

					<span class="pull-right"> <!-- pull-right Begin -->

						<i class="fa fa-arrow-circle-right"></i>

					</span> <!-- pull-right End -->

					<span class="clearfix"></span>

				</div> <!--panel-footer end -->

			</a> <!--a end -->		

		</div> <!--panel panel-green end -->

	</div> <!-- col-lg-3 col-md-6 end -->

</div> <!--row end -->


<div class="row"> <!--row Begin -->
	<div class="col-lg-8"> <!--col=lg-8 Begin -->
		<div class="panel panel-primary"> <!--panel -panel-primary Begin -->
			<div class="panel-heading"> <!-- penel-heading Begin -->
				<h3 class="panel-title"> <!-- panel-title Begin -->

					<i class="fa fa-money-bill fa-fw"></i> New Orders		

				</h3> <!-- panel-title End -->

			</div> <!-- penel-heading End -->

			<div class="panel-body"> <!--panel-body Begin -->

				<div class="table-responsive"> <!--table-responsive Begin -->

					<table class="table table-hover table-striped table-bordered"> <!--table table-hover table-sriped table-bordered Begin -->

						<thead> <!--thead Begin -->

							<tr> <!--tr Begin --> 

								<th> Order Number: </th>
								<th> Customer Email: </th>
								<th> Invoice Number: </th>
								<th> Product Id: </th>
								<th> Product Qty: </th>
								<th> Status: </th>

							</tr> <!--tr End -->


						</thead> <!--thead End -->

						<tbody> <!--tbody Begin -->

							<?php  

								$i = 0;

								$get_order = "select * from pending_orders order by 1 DESC LIMIT 0,4";

								$run_order = mysqli_query($con, $get_order);

								while ($row_order=mysqli_fetch_array($run_order)) {

									$order_id = $row_order['order_id'];

									$c_id = $row_order['customer_id'];

									$invoice_no = $row_order['invoice_number'];

									$product_id = $row_order['product_id'];

									$qty = $row_order['qty'];

									$order_status = $row_order['order_status'];

									$i++;

							?>

							<tr> <!--tr Begin -->
								
								<td> <?php echo$order_id; ?> </td>
								<td> 

									<?php

										$get_customer = "select * from customers where customer_id='$c_id'";

										$run_customer = mysqli_query($con, $get_customer);

										$row_customer = mysqli_fetch_array($run_customer);

										$customer_email = $row_customer['customer_email'];

										echo $customer_email;

									?>
										
								</td>
								<td> <?php echo$invoice_no; ?> </td>
								<td> <?php echo$product_id; ?> </td>
								<td> <?php echo$qty; ?> </td>
								<td> 

									<?php

										if ($order_status=="Pending") {
											
											echo $order_status = "Pending";

										}else{

											echo $order_status="Complete";

										}

									?>
										
								</td>

							</tr> <!--tr End -->

							<?php 

								}

							 ?>
													
						</tbody> <!--tbody End -->						

					</table> <!--table table-hover table-sriped table-bordered Begin -->

				</div> <!--table-responsive Begin -->

				<div class="text-right"> <!--text-right Begin -->
					
					<a href="index.php?view_orders"> <!--a Begin -->

						View All Orders <i class="fa fa-arrow-circle-right"></i>						

					</a> <!--a End -->

				</div> <!--text-right End -->

			</div> <!--panel-body Begin -->

		</div> <!--panel -panel-primary End -->
	
	</div> <!--col-lg-8 End -->

	<div class="col-md-4"> <!--col-md-4 Begin -->

		<div class="panel"> <!--Panel Begin -->

			<div class="panel-body"> <!--Panel-body Begin -->

				<div class="mb-md thumb-info"> <!--mb-md thumb-info Begin --> 

					<img src="admin_images/<?php echo$admin_image; ?>" alt="<?php echo $admin_name; ?>" class="rounded img-responsive">

					<div class="thumb-info-title"> <!--thumb-info-title Begin -->
						
						<span class="thumb-info-inner"> <!--thumb-info-inner Begin -->

							<?php echo $admin_name; ?>					

						</span> <!--thumb-info-inner End -->

						<span class="thumb-info-type"> <!--thumb-info-inner Begin -->

							<?php echo $admin_job; ?>							

						</span> <!--thumb-info-inner End -->

					</div> <!--thumb-info-title End -->

				</div> <!--mb-md thumb-info End -->

				<div class="mb-md"> <!--mb-md Begin -->

					<div class="widget-content-expanded"> <!--widget-content-expanded Begin -->

						<i class="fa fa-user"></i> <span> Email: </span> <?php echo $admin_email; ?>	 <br/>
						<i class="fa fa-flag"></i> <span> Country: </span> <?php echo $admin_country; ?>	<br/>
						<i class="fa fa-envelope"></i> <span> Contact: </span> <?php echo $admin_contact; ?>	 <br/>

					</div> <!--widget-content-expanded End -->

					<hr class="dotted short">

					<h5 class="text-muted"> About Me </h5>

					<p> <!--p Begin-->
						
						This apllication is created by DM. If you are willing to contact me, please click the this link <br/>

						<a href="#"> Dm </a> <br/>

						<?php echo $admin_about; ?>	

					</p> <!--p End-->

				</div> <!--mb-md End-->

			</div> <!--Panel-body end -->

		</div> <!--Panel end -->

	</div> <!-- col-md-4 End -->

</div> <!--row End -->

<?php 
	
	}

 ?>