<center> <!--center Begin -->

	<h1> My Orders </h1>

	<p class="lead"> Your orders in one place</p>

	<p class="text-muted">
		
		If you have any questions, feel free to <a style="color: #61C278;" href="../contact.php">Contact Us </a> Our customer Service works <strong>24/7</strong> 

	</p>

</center> <!--center End -->


<hr>

<div class="table-responsive"> <!--table-responsive Begin -->
	
	<table class="table table-bordered table-hover"> <!--table table-bordered table-hover Begin -->

		<thead> <!--thead Begin -->

			<tr> <!--tr Begin -->

				<th> ON: </th>
				<th> Due Amount: </th>
				<th> Invoice No: </th>
				<th> Qty: </th>
				<th> Order Date: </th>
				<th> Paid /Unpaid: </th>
				<th> Status: </th>

			</tr> <!--tr End -->

		</thead> <!--thead End -->

		<tbody> <!--tbody Begin -->

			<?php 

				$customer_session = $_SESSION['customer_email'];

				$get_customer = "select * from customers where customer_email='$customer_session'";

				$run_customer = mysqli_query($con, $get_customer);

				$row_customer = mysqli_fetch_array($run_customer);

				$customer_id = $row_customer['customer_id'];

				$get_orders = "select * from customer_orders where customer_id='$customer_id'";

				$run_orders = mysqli_query($con, $get_orders);

				$i = 0;

				while ($row_orders = mysqli_fetch_array($run_orders)) {

					$order_id = $row_orders['order_id'];

					$due_amount = $row_orders['due_amount'];

					$invoice_no = $row_orders['invoice_no'];

					$qty = $row_orders['qty'];

					$order_date =substr($row_orders['order_date'], 0,11); 

					$order_id = $row_orders['order_id'];

					$order_status = $row_orders['order_status'];

					$i++;

					if ($order_status == 'Pending') {

						$order_status = "Unpaid";

					} else {

						$order_status = "Paid";
					}					
				


				?>

				<tr> <!--tr Begin -->

					<th> # <?php echo $i ?> </th>

					<td> KES <?php echo $due_amount ?> </td>
					<td> <?php echo $invoice_no ?> </td>
					<td> <?php echo $qty ?> </td>
					<td> <?php echo $order_date ?> </td>
					<td> <?php echo $order_status ?> </td>
					<td>
						
						<a target="_blank" class="btn cart btn-sm"> <?php 

							if($order_status == "Paid"){
								$shipping = "Shipping";
							} else {
								$shipping = "Processing";
							}
						
						echo($shipping) ?> </a>

					</td>

				</tr> <!--tr End -->

			<?php 

				}

			 ?>		

		</tbody> <!--tbody End -->

	</table> <!--table table-bordered table-hoverEnd -->

</div> <!--table-responsive End -->