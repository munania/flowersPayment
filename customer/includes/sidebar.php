<div class="panel panel-default sidebar-menu"> <!--panel panel-default sidebar-menu Begin -->
	
	<div class="panel-heading"> <!--panel-heading Begin -->


		<?php 

			$customer_session = $_SESSION['customer_email'];

			$get_customer = "select * from customers where customer_email='$customer_session'";

			$run_customer = mysqli_query($con, $get_customer);

			$row_customer = mysqli_fetch_array($run_customer);

			$customer_image = $row_customer['customer_image'];

			$customer_name = $row_customer['customer_name'];

			if (!isset($_SESSION['customer_email'])) {
				

			} else {

				echo "

					<center>			
						<img src='customer_images/$customer_image' class='img-responsive'>

					</center>

					<br/>

					<h3 class='panel-title' align='center'>
						
						Name: $customer_name

					</h3>


				";

			}

		 ?>

		

	</div> <!--panel-heading End -->

	<div class="panel-body"> <!--	Panel-body Begin -->
		
		<nav class="nav-pills nav-stacked nav"> <!-- nav-pills nav-stacked nav Begin -->
			
			<li class="<?php if(isset($_GET['my_orders'])){ echo "active"; } ?>">
				
				<a href="my_account.php?my_orders">
					
					<i class="fa fa-list"></i> My Orders

				</a>

			</li>

			<li class="<?php if(isset($_GET['edit_account'])){ echo "active"; } ?>">
				
				<a href="my_account.php?edit_account">
					
					<i class="fas fa-pencil"></i> Edit Account

				</a>

			</li>

			<li class="<?php if(isset($_GET['change_pass'])){ echo "active"; } ?>">
				
				<a href="my_account.php?change_pass">
					
					<i class="fas fa-user"></i> Change Password

				</a>

			</li>

			<li class="<?php if(isset($_GET['delete_account'])){ echo "active"; } ?>">
				
				<a href="my_account.php?delete_account">
					
					<i class="fas fa-trash"></i> Delete Account

				</a>

			</li>

			<li>
				
				<a href="logout.php">
					
					<i class="fas fa-sign-out-alt"></i> Log Out
				</a>

			</li>

		</nav> <!--	nav-pills nav-stacked nav End -->

	</div> <!--	panel-body End -->

</div> <!--panel panel-default sidebar-menu -->